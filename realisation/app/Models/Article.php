<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'contenu',
        'image',
        'status',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
