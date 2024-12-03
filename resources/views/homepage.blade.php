<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DishCover Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Quick inline styles for demonstration */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }
        .logo {
            font-size: 1.5em;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .main {
            padding: 20px;
        }
        .recipes {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .recipe-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .recipe-card img {
            width: 100%;
            height: auto;
            height: 200px;             
            object-fit: cover;       
            object-position: center;   
            border-bottom: 1px solid #ddd;
        }
        .recipe-info {
            padding: 10px;
        }
        .recipe-info h3 {
            margin: 0;
        }
        .tags {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">DishCover</div>
        <nav class="nav-links">
            <a href="#">History</a>
            <a href="#">Like</a>
            <a href="#">Upload</a>
        </nav>
        <div class="profile">
            <a href="#">Profile</a>
        </div>
    </header>
    <main class="main">
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
    </main>
</body>
</html>
