<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie; 
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $search     = $request->search;
        $categoryId = $request->category;
        $status     = $request->status;

        $articles   = $this->articleService->getAll($search, $categoryId, $status);
        $categories = Categorie::all(); 
        return view('articles.index', compact('articles', 'categories'));
    }

    
    public function create()
    {
        $categories = Categorie::all(); 
        return view('articles.create', compact('categories'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'titre'      => 'required|string|max:255',
            'slug'       => 'required|unique:articles,slug',
            'extrait'    => 'required',
            'contenu'    => 'required',
            'status'     => 'required',
            'categories' => 'nullable|array',
            'image'      => 'nullable|string|max:2048',
        ]);

        $this->articleService->create($request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article ajouté avec succès.');
    }

   
    public function edit(Article $article)
    {
        $categories = Categorie::all(); 
        return view('articles.edit', compact('article', 'categories'));
    }

   
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titre'      => 'required|string|max:255',
            'slug'       => 'required|unique:articles,slug,' . $article->id,
            'extrait'    => 'required',
            'contenu'    => 'required',
            'status'     => 'required',
            'categories' => 'nullable|array',
            'image'      => 'nullable|string|max:2048',
        ]);

        $this->articleService->update($article, $request->all());

        return redirect()->route('articles.index')
            ->with('success', 'Article modifié avec succès.');
    }

    public function destroy(Article $article)
    {
        $this->articleService->delete($article);

        return redirect()->route('articles.index')
            ->with('success', 'Article supprimé avec succès.');
    }
}
