@extends('layouts.app')

@section('content')
<div class="container">

    <h1 style="margin-bottom:20px;">Ajouter un article</h1>

    <form method="POST" action="{{ route('articles.store') }}">
        @csrf

        {{-- Titre --}}
        <div style="margin-bottom:15px;">
            <label style="display:block; font-weight:bold;">Titre</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;"
                   required>
        </div>

        {{-- Slug --}}
        <div style="margin-bottom:15px;">
            <label style="display:block; font-weight:bold;">Slug</label>
            <input type="text" name="slug" value="{{ old('slug') }}"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">
        </div>

        {{-- Excrept --}}
        <div style="margin-bottom:15px;">
            <label style="display:block; font-weight:bold;">Excrept</label>
            <textarea name="excrept" rows="3"
                      style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">{{ old('excrept') }}</textarea>
        </div>

        {{-- Contenu --}}
        <div style="margin-bottom:15px;">
            <label style="display:block; font-weight:bold;">Contenu</label>
            <textarea name="content" rows="5"
                      style="width:100%; padding:8px; border:1px solid #ccc; border-radius:5px;">{{ old('content') }}</textarea>
        </div>

        {{-- Status (RADIO BUTTONS) --}}
        <div style="margin-bottom:15px;">
            <label style="display:block; font-weight:bold;">Statut</label>

            <label>
                <input type="radio" name="status" value="publié" {{ old('status') === 'publié' ? 'checked' : '' }}>
                Publié
            </label>

            <label style="margin-left:15px;">
                <input type="radio" name="status" value="brouillon" {{ old('status', 'brouillon') === 'brouillon' ? 'checked' : '' }}>
                Brouillon
            </label>
        </div>

        {{-- Catégories (CHECKBOX depuis la BD) --}}
        <div style="margin-bottom:20px;">
            <label style="display:block; font-weight:bold; margin-bottom:5px;">
                Catégories
            </label>

            @foreach($categories as $cat)
                <label style="display:block;">
                    <input type="checkbox" name="categories[]" value="{{ $cat->id }}" 
                           {{ (is_array(old('categories')) && in_array($cat->id, old('categories'))) ? 'checked' : '' }}>
                    {{ $cat->name }}
                </label>
            @endforeach
        </div>

        {{-- Bouton --}}
        <button type="submit"
                style="background-color:green; color:white;
                       padding:8px 20px; border:none; border-radius:5px;
                       cursor:pointer;">
            Enregistrer
        </button>

    </form>

</div>
@endsection
