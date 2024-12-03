<?php

namespace App\Models;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    protected $fillable = [
        'recipe_id',
        'user_id',
        'isi_komentar',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
