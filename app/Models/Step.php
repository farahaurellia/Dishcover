<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Step extends Model
{
    protected $fillable = [
        'recipe_id',
        'deskripsi_langkah',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
