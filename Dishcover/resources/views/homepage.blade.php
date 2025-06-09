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
                    <img src="{{ asset('images/carousel1.png') }}" alt="carousel">                
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel2.png') }}" alt="carousel">                
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel3.png') }}" class="d-block" alt="...">
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

            <div class="recommendations">
                <div class="section-title">
                    <p> Mungkin anda suka </p>
                </div>
                <div class="recipes">
                    @foreach ($recommendations as $recommendation)
                    <a href="{{ route('show', $recommendation->id) }}" class="recipe-card-link">
                        <div class="recipe-card">
                            <div class="image-wrapper">                        
                                <img src="{{ asset($recommendation->image_url) }}" alt="Recipe Image">
                            </div>                          
                            <div class="recipe-info">
                                <div class="tags">
                                    <span class="porsi">
                                        <img src="{{ asset('icons/porsi.svg') }}" alt="porsi">                    
                                        {{ $recommendation->porsi }}
                                    </span>
                                    <span class="waktu">
                                        <img src="{{ asset('icons/waktu.svg') }}" alt="waktu">                                                        
                                        {{ $recommendation->waktu }} minutes
                                    </span>
                                </div>
                                <h5>{{ $recommendation->judul}}</h5>
                                <p>{{ $recommendation->deskripsi }}</p>
                                <p>Recipe by <span style="color: #E35778"> {{ $recommendation->user->username }} </span></p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="latest">
                <div class="section-title">
                    <p> Terbaru </p>
                </div>
                <div class="recipes">
                    @foreach ($latestRecipe as $latest)
                    <a href="{{ route('show', $latest->id) }}" class="recipe-card-link">
                        <div class="recipe-card">
                            <div class="image-wrapper">                        
                                <img src="{{ asset($latest->image_url) }}" alt="Recipe Image">
                            </div>                          
                            <div class="recipe-info">
                                <div class="tags">
                                    <span class="porsi">
                                        <img src="{{ asset('icons/porsi.svg') }}" alt="porsi">                    
                                        {{ $latest->porsi }}
                                    </span>
                                    <span class="waktu">
                                        <img src="{{ asset('icons/waktu.svg') }}" alt="waktu">                                                        
                                        {{ $latest->waktu }} minutes
                                    </span>
                                </div>
                                <h5>{{ $latest->judul}}</h5>
                                <p>{{ $latest->deskripsi }}</p>
                                <p>Recipe by <span style="color: #E35778"> {{ $latest->user->username }} </span></p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>


            <div class="reseplain">
                <div class="section-title">
                    <p> Resep lainnya </p>
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
            </div>

            <div class="footer">
                <div class="container">
                    <div class="container-top">
                    <div class="signup">
                        <h5 class="brand">
                        <span class="logo">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </span>
                        <span class="name">DishCover</span>
                        </h5>
                        <p>Stay in the loop and sign up:</p>
                        <form class="email-form">
                        <input type="email" placeholder="Enter your email" required />
                        <button type="submit">&#8594;</button>
                        </form>
                    </div>

                    <div class="links">
                        <div>
                        <span class="name">Company</span>
                        <a href="/">Home</a>
                        </div>
                        <div>
                        <span class="name">Documentation</span>
                        <a href="#">Contact</a>
                        </div>
                        <div>
                        <span class="name">Social</span>
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                        </div>
                    </div>
                    </div>

                    <div class="container-bottom">
                    <hr />
                    <div class="bottom-content">
                        <p>Made with <span class="heart">&hearts;</span> by DishCover Team</p>
                        <p>Terms & Condition</p>
                    </div>
                    </div>

                </div>
            </div>
        </div>
</x-layout>