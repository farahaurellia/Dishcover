<x-layout>
    @push('styles')
            <link rel="stylesheet" href="{{ asset('css/myrecipe.css') }}">
    @endpush 
    @if (Auth::check())
        @if ($recipes->isEmpty())
        <div class="container">
            <div class="content">
                <div class="title">
                    <div class=" recipe-icon">
                        <img src="{{ asset('icons/myrecipe-p.svg') }}" alt="recipe">
                    </div>
                    <h1 class="title-text">Resep Anda</h1>
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
                <h1 class="title-text">Resep Anda</h1>
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
    @else 
    <div class="container Recipe">
            <div class="content">
                <div class="title Recipe">
                    <div class=" recipe-icon">
                        <div class=" recipe-icon">
                            <img src="{{ asset('icons/myrecipe-p.svg') }}" alt="recipe">
                        </div>
                        <h1 class="title-text">Resep Anda</h1>
                </div>
                <div class="message Recipe">
                    <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                        Anda harus masuk terlebih dahulu
                    </h2>
                    <p class="message-subtext" style="font-size: 16px; color: #333;">
                        Masuk untuk menyimpan resep yang anda sukai.
                    </p>
                </div>
                <button class="btn Recipe" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <svg width="30" height="20" viewBox="0 0 48 39" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <rect x="0.77002" y="0.243164" width="46.9265" height="38.6937" fill="url(#pattern0_628_2250)"/>
                        <defs>
                        <pattern id="pattern0_628_2250" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_628_2250" transform="matrix(0.00916176 0 0 0.0111111 0.0877207 0)"/>
                        </pattern>
                        <image id="image0_628_2250" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD2ElEQVR4nO2cS4tcRRSAS0fFZKGgRgXxEaJbcSGiqCCiQRcufSS6EFQCycK/kKUoGMUHEnTl4w8I2biS+CLGB5qY0JnuU7dxCBg1ESE6fY5+Ut6BGTHG9EzfW3dunQ/OpruhOR+ni+pT51YIjuM4juM4juM4zvTA+EYj7lLie0b8UpGflDipQ36sX0vvyU6otqziK8oFuMCIjxvxEyMyXcjHhmwH5nLn0WkUeUCRwfSC/xlKPKqMtubOp3PAwkZF3lyr4H8Ll70w3pA7v04A81ca8sWsJa9YTj6HwaZQumQlHm1O8vJSUqxsWNjYbCWfqbLl4lAa2sCafA6V/UYoCWW0tW3Jy7LlwVDKPllnsIVbQ1UfKWKfbcQncklesV4/FvqOET/tgOiPQgG9C3KHIn9C3Bz6ihF35Za8HKMdoa9o3YWjI1X9TugrRvwqt+DlkIOhr2jdQ+6A5L+3eT+EvqLExQ6J/j30FeuA4JUR+op1QK6LxkXPDPU1uh3Udx3tYL6Pbgclvtud7Z28HfqKITtzCy6i1wHVltQ560b3Tm4IfcZWNYE065D9oe8Ysj2/6OqR0HeAuTZmOc6ybBwu4swwoVT35xMd7w0locjeDJJfD6UB4w1peqhF0Z8VOamUSPNwLc3eHYGFK0LJwGCTIQeareRCBxzPtIykubgm1uRil4uzoVT3pZ/52gXL4eJ2F9MCzBmyLU0TTfN3vf6s7DdGjwLn585jXQFxc2r+pBmMNEud+tnp8KAOOZFGBur3Rjt637twHMdxHMdxHMcpBhheOkHuMOIzirxkxH2pA1ffWBCPK/G3pTi+1BdJDx/tU+IeIz49QW6HwSW58+gcIFenA1slvqXIcHadO5mvn86VbTC8KpTIInKLIs8bcqjppv+KhtM3ijy3yPDm0GdgeJ1RPZuu52lD7v+3UWU3zN8U+sKE6i5D3u/ChNJ/VPoHSvUQcF5Yb8Chi4z4lCHf5pZp5x5fG/IkHLwwrAdSdShyrAPiWGWVD4zq4c5W+IThbelUJLcom118OKG6NXTsWojdilgH5DDj6v5DkZezLyfp+Ki+ay6/FGs05EC6MCCLZEXuUeKp/BJiS9UdT06o7m5VcvrC9Dc4d/LWumw5PSHe2Ypk+P7y+gQ6f+KWR/YJGF/WuGglvpg7Wcsv+4UWROe7eMo6Ekr8rg3Rp3MnatlFy68tiI4xd6KWX/R8C6LlldyJWnbRcU/jomF8jSI/Fyz5FBy7NrT1sI8SfylQ8snWx4HTpKcSX0u7EEW0v3JFl3J8FUbXtyrZcRzHcRzHcRzHcRwndJO/AJEQlrpXBjiOAAAAAElFTkSuQmCC"/>
                        </defs>
                    </svg>
                    Masuk/Daftar
                </button>
            </div>
        </div>
    @endif
    
    
    </x-layout>