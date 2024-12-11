<?php

namespace App\Models;

use App\Models\Step;
use App\Models\User;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Recipe extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'image_url',
        'porsi',
        'waktu',       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->hasMany(Like::class);
    }

    public function like()
    {
        return $this->belongsToMany(User::class, 'like')->withTimestamps();
    }

    public function images()
    {
        return $this->hasOne(Image::class);
    }
}
