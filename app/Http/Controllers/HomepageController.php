<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;


class HomepageController extends Controller
{
    public function homepage()
    {
        $recipes = Recipe::all();

        return view('homepage', compact('recipes'));
    }

}
