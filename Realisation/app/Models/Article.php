<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'slug',
        'extrait',
        'contenu',
        'image',
        'vues',
        'likes',
        'status',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'article_categorie');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function favoris()
    {
        return $this->hasMany(Favoris::class);
    }


}
