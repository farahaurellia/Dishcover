<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-recipe">
        <div class="left-section">
            <a href="/" class="close-button">
                <img src="{{ asset('icons/back.svg') }}" alt="back">                         
            </a>          
            <div class="container-title">
                <img src="{{ asset('images/editresep.png') }}" alt="back">
            </div>
        </div>
        <div class="right-section">
            <form action="/edit/{{ $recipe->id }}" method="POST" id="upload-form" class="upload" enctype="multipart/form-data">
                @csrf
                <!-- Image Upload -->
                <div class="with-info mb-3">
                    <label for="imageUpload" class="form-label">
                        Unggah foto masakanmu
                        <p class="input-info">
                            *Kosongkan jika tidak ingin mengubah foto
                        </p>
                    </label>
                    <input type="file" name="image" class="form-control" id="imageUpload" accept="image/*">
                </div>

                <!-- Title, Time, and Portion -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="{{$recipe->judul}}"   maxlength="200">
                    </div>
                    <div class="col">
                        <label for="waktu" class="form-label">Waktu
                            <img src="{{ asset('icons/waktu-h.svg') }}" alt="waktu">
                        </label>
                        <div class="input-group">
                            <input type="number" name="waktu" class="form-control" id="waktu" value="{{$recipe->waktu}}"  >
                            <span class="input-group-text">Minutes</span>
                        </div>
                    </div>
                    <div class="col">
                        <label for="porsi" class="form-label">Porsi
                            <img src="{{ asset('icons/porsi-h.svg') }}" alt="porsi">
                        </label>
                        <input type="number" name="porsi" class="form-control" id="porsi" value="{{$recipe->porsi}}"  >
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3" maxlength="500">{{$recipe->deskripsi}}</textarea>
                </div>

                <!-- Ingredients -->
                <div class="with-info mb-3">
                    <label for="bahan" class="form-label">Bahan-bahan
                        <p class="input-info">
                            *Gunakan semicolon (;) untuk memisahkan bahan-bahan anda! 
                        </p>
                    </label>
                    <textarea name="bahan" class="form-control" id="bahan" rows="3"  >{{$ingredient->nama_bahan}}</textarea>
                </div>

                <!-- Steps -->
                <div class="with-info mb-3">
                    <label for="langkah" class="form-label">Langkah-langkah
                        <p class="input-info">
                            *Gunakan semicolon (;) untuk memisahkan langkah-langkah anda! 
                        </p>
                    </label>
                    <textarea name="langkah" class="form-control" id="langkah" rows="3"  >{{$steps->deskripsi_langkah}}</textarea>
                </div>
                
                <div class="edit-buttons">
                    <!-- Edit Button -->
                    <div class="submit-btn">
                        <form action="{{ route('editPage', $recipe->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="submit-button">Save
                            </button>
                        </form>
                    </div>
                
                    <!-- Delete Button -->
                    <div class="submit-btn">
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE') 
                            <button type="submit" class="delete-button btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>
