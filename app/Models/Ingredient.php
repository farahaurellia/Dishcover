<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Ingredient extends Model
{
    protected $fillable = [
        'recipe_id',
        'nama_bahan',
        'jumlah',
        'satuan',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}