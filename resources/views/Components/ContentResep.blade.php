<div class="recipes">
    @foreach ($recipes as $recipe)
        <div class="recipe-card">
            <img src="{{ asset($recipe->image_url) }}" alt="Recipe Image">
            <div class="recipe-info">
                <h3>{{ $recipe->judul}}</h3>
                <p>{{ $recipe->deskripsi }}</p>
                <div class="tags">
                    <span>{{ $recipe->porsi }} servings</span>
                    <span>{{ $recipe->waktu }} minutes</span>
                </div>
                <p>Recipe by {{ $recipe->user->username }}</p>
            </div>
        </div>
    @endforeach
</div>

