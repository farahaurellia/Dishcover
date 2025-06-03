<x-layout>
    @push('styles')
            <link rel="stylesheet" href="{{ asset('css/myrecipe.css') }}">
    @endpush 
        @if ($recipes->isEmpty())
        <div class="container">
            <div class="content">
                <div class="title">
                    <div class=" recipe-icon">
                        <img src="{{ asset('icons/myrecipe-p.svg') }}" alt="recipe">
                    </div>
                    <h1 class="title-text">Resep Saya</h1>
                </div>
                <div class="message">
                <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                        Halaman masih kosong
                    </h2>
                    <p class="message-subtext" style="font-size: 16px; color: #333;">
                        Ayo unggah resepmu!
                    </p>
                </div>
            </div>
        </div>
        @else 
        <div class="title">
            <div class=" recipe-icon">
                <img src="{{ asset('icons/myrecipe-p.svg') }}" alt="recipe">
                <h1 class="title-text">Resep Saya</h1>
            </div>
        </div>
            <div class="recipes">
            @foreach ($recipes as $recipe)
            <a href="{{ route('show', $recipe->id) }}" class="recipe-card-link">
                <div class="recipe-card">
                    <div class="image-wrapper">                        
                        <img src="{{ asset($recipe->image_url) }}" alt="Recipe Image">
                    </div>                          
                    <div class="recipe-info">
                        <div class="tags">
                            <span class="porsi">
                                <img src="{{ asset('icons/porsi.svg') }}" alt="porsi">                    
                                {{ $recipe->porsi }}
                            </span>
                            <span class="waktu">
                                <img src="{{ asset('icons/waktu.svg') }}" alt="waktu">                                                        
                                {{ $recipe->waktu }} minutes
                            </span>
                        </div>
                        <h5>{{ $recipe->judul}}</h5>
                        <p>{{ $recipe->deskripsi }}</p>
                        <p>Recipe by <span style="color: #E35778"> {{ $recipe->user->username }} </span></p>
                    </div>
                </div>
            </a>
            @endforeach
            </div>
        @endif
    </x-layout>