<x-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/contentresep.css') }}">
    @endpush 
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
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
                            <p>Recipe by {{ $recipe->user->username }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
</x-layout>