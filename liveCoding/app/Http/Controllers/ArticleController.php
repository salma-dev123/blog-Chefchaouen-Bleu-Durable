<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;


class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService){
        $this->articleService = $articleService;
    }

    public function index(Request $request){
        $categoryId = $request->query('category');
        $data=$this->articleService->getForIndex(perPage:10, categoryId:$categoryId);

        return view('articles.index', $data);
    }

    public function create()
    {
       $categories = Category::all(); 
       return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
  {
      $validated = $request->validate([
        'title' => 'required|string|max:180',
        'slug' => 'nullable|string|max:200|unique:articles,slug',
        'excrept' => 'nullable|string|max:500',
        'content' => 'nullable|string',
        'status' => 'required|in:publié,brouillon',
        'categories' => 'required|array',
      ]);

        $slug = $validated['slug'] ?? \Str::slug($validated['title']);

      $article = Article::create([
        'user_id' => auth()->id(),
        'title' => $validated['title'],
        'slug' => $slug,
        'excrept' => $validated['excrept'] ?? '',
        'content' => $validated['content'] ?? '',
        'status' => $validated['status'],
      ]);
       $article->categories()->sync($validated['categories']);

       return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    public function destroy(Article $article){
        $this->articleService->delete($article);
        return redirect()->route('articles.index')->with('success',' Article supprimé avec succés.');
    }
}
