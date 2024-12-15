<x-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    @endpush 
    <div class="search-page">
    <div class="title">
        <a href="/" class="back-btn">
            <svg width="20" height="40" viewBox="0 0 20 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.57167 20.0001L17.3567 31.7851L15 34.1417L2.03667 21.1784C1.72422 20.8659 1.54869 20.442 1.54869 20.0001C1.54869 19.5581 1.72422 19.1343 2.03667 18.8217L15 5.8584L17.3567 8.21506L5.57167 20.0001Z" fill="black"/>
            </svg>
        </a>  
        <div class="title-text">
            <p> Hasil untuk <span>{{$query}}</span></p>
        </div>  
    </div>
    <div class="recipes">
        @forelse ($recipes as $recipe)
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
            @empty 
                <p>No recipes found.</p>
            @endforelse
    </div>
    </div>
</x-layout>