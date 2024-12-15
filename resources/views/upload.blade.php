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
                <form action="/upload" method="POST" id="upload-form" class="upload">
                    @csrf
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Unggah foto masakanmu</label>
                        <input type="file" class="form-control" id="imageUpload" accept="image/*">
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Judul</label>
                            <input type="text" class="form-control" placeholder="..." aria-label="First name">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Waktu
                                <img src="{{ asset('icons/waktu-h.svg') }}" alt="waktu">
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">Minutes</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleFormControlTextarea1" class="form-label">Porsi
                                <img src="{{ asset('icons/porsi-h.svg') }}" alt="porsi">
                            </label>
                            <input type="text" class="form-control" placeholder="..." aria-label="Last name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control"  placeholder="..." id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="with-info mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Bahan-bahan
                            <p class="input-info">
                                *Gunakan semicolon (;) untuk memisahkan bahan-bahan anda! 
                            </p>
                        </label>
                        <textarea class="form-control"  placeholder="..." id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class=" with-info mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Langkah-langkah
                            <p class="input-info">
                                *Gunakan semicolon (;) untuk memisahkan Langkah-langkah anda! 
                            </p>
                        </label>
                        <textarea class="form-control"  placeholder="..." id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="submit-button">Upload</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
