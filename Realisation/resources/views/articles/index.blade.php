@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Gestion des Articles</h1>

     @if(session('success'))
        <div style="padding:10px; background-color:#d4edda; color:#155724; margin-bottom:15px; border-radius:5px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Barre de recherche & filtres --}}
    <form id="filterForm" method="GET" action="{{ route('articles.index') }}" class="flex flex-wrap gap-4 mb-6 items-center">
        {{-- Recherche --}}
        <input id="searchInput" type="text"
               name="search"
               placeholder="Rechercher par titre..."
               value="{{ request('search') }}"
               class="border rounded px-4 py-2 w-64">

        {{-- Filtre catégorie --}}
        <select id="categorieFilter" name="category" class="border rounded px-4 py-2">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{ request('category') == $categorie->id ? 'selected' : '' }}>
                    {{ $categorie->nom }}
                </option>
            @endforeach
        </select>

        {{-- Filtre statut --}}
        <select id="statusFilter" name="status" class="border rounded px-4 py-2">
            <option value="">Tous les statuts</option>
            <option value="brouillon" {{ request('status') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
            <option value="publie" {{ request('status') == 'publie' ? 'selected' : '' }}>Publié</option>
        </select>

        <a href="{{ route('articles.create') }}"
           class="ml-auto bg-green-600 text-white px-6 py-2 rounded">
            Ajouter un nouvel article
        </a>
    </form>

    {{-- Tableau des articles --}}
    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Titre</th>
                    <th class="p-3">Auteur</th>
                    <th class="p-3">Catégories</th>
                    <th class="p-3">Statut</th>
                    <th class="p-3">Favoris</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr class="border-t">
                    <td class="p-3">{{ $article->titre }}</td>
                    <td class="p-3">{{ $article->user->name }}</td>
                    <td class="p-3">
                        @foreach($article->categories as $cat)
                            <span class="bg-gray-200 px-2 rounded text-sm">{{ $cat->nom }}</span>
                        @endforeach
                    </td>
                    <td class="p-3">
                        <span class="px-3 py-1 rounded text-white {{ $article->status == 'publie' ? 'bg-green-600' : 'bg-gray-500' }}">
                            {{ $article->status }}
                        </span>
                    </td>
                    <td class="p-3 text-center">{{ $article->favoris->count() }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('articles.edit', $article->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Modifier</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $articles->withQueryString()->links() }}
    </div>
</div>

{{-- 🔥 Script pour auto-submit formulaire quand on tape ou change filtre --}}
<script>
    const filterForm = document.getElementById('filterForm');
    const searchInput = document.getElementById('searchInput');
    const categorieFilter = document.getElementById('categorieFilter');
    const statusFilter = document.getElementById('statusFilter');

  
    searchInput.addEventListener('keyup', function() {
       
        clearTimeout(this.delay);
        this.delay = setTimeout(() => filterForm.submit(), 500);
    });

    categorieFilter.addEventListener('change', () => filterForm.submit());
    statusFilter.addEventListener('change', () => filterForm.submit());
</script>
@endsection
