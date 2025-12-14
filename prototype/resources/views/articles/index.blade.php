@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-6">Liste des Articles</h1>

    @can('create articles')
        <a href="{{ route('articles.create') }}"
           class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
           + Ajouter
        </a>
    @endcan

    {{-- Message succès --}}
    @if(session('success'))
        <div class="p-4 mb-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Filtre par catégorie --}}
    <form method="GET" action="{{ route('articles.index') }}" class="mb-6">
        <label for="category" class="font-semibold mr-2">Filtrer par catégorie :</label>
        <select name="category" id="category"
                onchange="this.form.submit()"
                class="px-3 py-2 border border-blue-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
            <option value="">Toutes</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $selectedCategory == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </form>

    {{-- Tableau des articles --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-blue-300 rounded-lg overflow-hidden">
            <thead class="bg-blue-100">
                <tr>
                    <th class="px-4 py-2 text-left font-medium">ID</th>
                    <th class="px-4 py-2 text-left font-medium">Titre</th>
                    <th class="px-4 py-2 text-left font-medium">Catégories</th>
                    <th class="px-4 py-2 text-left font-medium">Statut</th>
                    <th class="px-4 py-2 text-left font-medium">Date</th>
                    <th class="px-4 py-2 text-left font-medium">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="border-b border-blue-200 hover:bg-blue-50 transition">
                        <td class="px-4 py-2">{{ $article->id }}</td>
                        <td class="px-4 py-2">{{ $article->title }}</td>
                        <td class="px-4 py-2 space-x-1">
                            @foreach($article->categories as $cat)
                                <span class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-sm">
                                    {{ $cat->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-4 py-2">{{ $article->status }}</td>
                        <td class="px-4 py-2">{{ $article->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2">
                            @can('delete articles')
                                @if(auth()->user()->hasRole('admin') || $article->user_id == auth()->id())
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700 transition">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucun article trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $articles->appends(request()->query())->links() }}
    </div>

</div>
@endsection
