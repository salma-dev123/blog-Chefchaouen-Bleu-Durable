<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'article_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article()
    {
    return $this->belongsTo(Article::class);
    }
}
