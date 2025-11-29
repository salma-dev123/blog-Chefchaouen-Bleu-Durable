@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold mb-6">Créer un nouvel article</h2>
                
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre *</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('titre')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug *</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" data-initial-slug="{{ old('slug') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               required>
                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="extrait" class="block text-sm font-medium text-gray-700">Extrait *</label>
                        <textarea name="extrait" id="extrait" rows="3" 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                  required>{{ old('extrait') }}</textarea>
                        @error('extrait')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="contenu" class="block text-sm font-medium text-gray-700 mb-2">Contenu *</label>
                        
                        <!-- Éditeur Tiptap avec barre d'outils Preline -->
                        <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                          <div id="hs-editor-tiptap">
                            <div class="sticky top-0 bg-white flex align-middle gap-x-0.5 border-b border-gray-200 p-2">
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-bold="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M14 12a4 4 0 0 0 0-8H6v8"></path>
                                  <path d="M15 20a4 4 0 0 0 0-8H6v8Z"></path>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-italic="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <line x1="19" x2="10" y1="4" y2="4"></line>
                                  <line x1="14" x2="5" y1="20" y2="20"></line>
                                  <line x1="15" x2="9" y1="4" y2="20"></line>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-underline="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M6 4v6a6 6 0 0 0 12 0V4"></path>
                                  <line x1="4" x2="20" y1="20" y2="20"></line>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-strike="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M16 4H9a3 3 0 0 0-2.83 4"></path>
                                  <path d="M14 12a4 4 0 0 1 0 8H6"></path>
                                  <line x1="4" x2="20" y1="12" y2="12"></line>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-link="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                  <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-ol="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <line x1="10" x2="21" y1="6" y2="6"></line>
                                  <line x1="10" x2="21" y1="12" y2="12"></line>
                                  <line x1="10" x2="21" y1="18" y2="18"></line>
                                  <path d="M4 6h1v4"></path>
                                  <path d="M4 10h2"></path>
                                  <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-ul="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <line x1="8" x2="21" y1="6" y2="6"></line>
                                  <line x1="8" x2="21" y1="12" y2="12"></line>
                                  <line x1="8" x2="21" y1="18" y2="18"></line>
                                  <line x1="3" x2="3.01" y1="6" y2="6"></line>
                                  <line x1="3" x2="3.01" y1="12" y2="12"></line>
                                  <line x1="3" x2="3.01" y1="18" y2="18"></line>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-blockquote="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 6H3"></path>
                                  <path d="M21 12H8"></path>
                                  <path d="M21 18H8"></path>
                                  <path d="M3 12v6"></path>
                                </svg>
                              </button>
                              <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" type="button" data-hs-editor-code="">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="m18 16 4-4-4-4"></path>
                                  <path d="m6 8-4 4 4 4"></path>
                                  <path d="m14.5 4-5 16"></path>
                                </svg>
                              </button>
                            </div>

                            <div class="h-40 overflow-auto p-4 text-gray-800" data-hs-editor-field contenteditable="true">{!! old('contenu') !!}</div>
                            
                            <!-- Champ caché pour le formulaire -->
                            <textarea name="contenu" id="contenu" class="hidden">{{ old('contenu') }}</textarea>
                            
                            @error('contenu')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                          </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Statut *</label>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input id="status-published" name="status" type="radio" value="publie" 
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                           {{ old('status') == 'publie' ? 'checked' : '' }} required>
                                    <label for="status-published" class="ml-3 block text-sm font-medium text-gray-700">Publié</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="status-draft" name="status" type="radio" value="brouillon" 
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                           {{ old('status') == 'brouillon' ? 'checked' : '' }}>
                                    <label for="status-draft" class="ml-3 block text-sm font-medium text-gray-700">Brouillon</label>
                                </div>
                            </div>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catégories</label>
                            <div class="space-y-2 max-h-40 overflow-y-auto p-2 border rounded">
                                @foreach($categories as $category)
                                    <div class="flex items-center">
                                        <input id="category-{{ $category->id }}" name="categories[]" type="checkbox" 
                                               value="{{ $category->id }}" 
                                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                               {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                        <label for="category-{{ $category->id }}" class="ml-2 text-sm text-gray-700">
                                            {{ $category->nom }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('categories')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6">
                        <a href="{{ route('articles.index') }}" 
                           class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Annuler
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
