<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;

class ArticleService
{
   
    public function getAll($search = null, $categoryId = null, $status = null)
    {
        $query = Article::with(['categories', 'user', 'favoris']);

       
        if (!empty($search)) {
            $query->where('titre', 'like', '%' . $search . '%');
        }

       
        if (!empty($categoryId)) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        
        if (!empty($status)) {
            $query->where('status', $status);
        }

        
        return $query->latest()->paginate(5);
    }

   
    public function create($data)
    {
        // ✅ Récupérer l'utilisateur qui a le rôle "admin"
        $admin = User::whereHas('roles', function ($q) {
            $q->where('nom', 'admin');
        })->first();

        $article = Article::create([
            'titre'   => $data['titre'],
            'slug'    => $data['slug'],
            'extrait' => $data['extrait'], 
            'contenu' => $data['contenu'],
            'image'   => $data['image'] ?? null,
            'status'  => $data['status'],
            'user_id' => $admin->id, 
        ]);

        
        if (!empty($data['categories'])) {
            $article->categories()->sync($data['categories']);
        }

        return $article;
    }

   
    public function update(Article $article, $data)
    {
        $article->update([
            'titre'   => $data['titre'],
            'slug'    => $data['slug'],
            'extrait' => $data['extrait'], 
            'contenu' => $data['contenu'],
            'image'   => $data['image'] ?? $article->image,
            'status'  => $data['status'],
        ]);

       
        if (!empty($data['categories'])) {
            $article->categories()->sync($data['categories']);
        }

        return $article;
    }

    
    public function delete(Article $article)
    {
        return $article->delete();
    }
}
