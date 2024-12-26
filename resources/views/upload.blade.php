<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/upload.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-regist">
        <div class="left-section">
            <a href="/" class="close-button">
                <img src="{{ asset('icons/back.svg') }}" alt="back">                         
            </a>          
            <div class="container-title">
                <p>Unggah Resepmu!</p>
            </div>
        </div>
        <div class="right-section">
            <form action="/upload" method="POST" id="upload-form" class="upload" enctype="multipart/form-data">
                @csrf
                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Unggah foto masakanmu</label>
                    <input type="file" name="image" class="form-control" id="imageUpload" accept="image/*" required>
                </div>

                <!-- Title, Time, and Portion -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" placeholder="..." required maxlength="200">
                    </div>
                    <div class="col">
                        <label for="waktu" class="form-label">Waktu
                            <img src="{{ asset('icons/waktu-h.svg') }}" alt="waktu">
                        </label>
                        <div class="input-group">
                            <input type="number" name="waktu" class="form-control" id="waktu" placeholder="..." required>
                            <span class="input-group-text">Minutes</span>
                        </div>
                    </div>
                    <div class="col">
                        <label for="porsi" class="form-label">Porsi
                            <img src="{{ asset('icons/porsi-h.svg') }}" alt="porsi">
                        </label>
                        <input type="number" name="porsi" class="form-control" id="porsi" placeholder="..." required>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="..." rows="3" maxlength="500"></textarea>
                </div>

                <!-- Ingredients -->
                <div class="with-info mb-3">
                    <label for="bahan" class="form-label">Bahan-bahan
                        <p class="input-info">
                            *Gunakan semicolon (;) untuk memisahkan bahan-bahan anda! 
                        </p>
                    </label>
                    <textarea name="bahan" class="form-control" id="bahan" placeholder="..." rows="3" required></textarea>
                </div>

                <!-- Steps -->
                <div class="with-info mb-3">
                    <label for="langkah" class="form-label">Langkah-langkah
                        <p class="input-info">
                            *Gunakan semicolon (;) untuk memisahkan langkah-langkah anda! 
                        </p>
                    </label>
                    <textarea name="langkah" class="form-control" id="langkah" placeholder="..." rows="3" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="submit-btn">
                    <button type="submit" class="submit-button">Upload</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
