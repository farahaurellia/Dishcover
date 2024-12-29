<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-view">
        <div class="container-content">
        <div class="left-side">
             <a onclick="window.history.back();" class="back-btn">
                 <svg width="20" height="40" viewBox="0 0 20 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.57167 20.0001L17.3567 31.7851L15 34.1417L2.03667 21.1784C1.72422 20.8659 1.54869 20.442 1.54869 20.0001C1.54869 19.5581 1.72422 19.1343 2.03667 18.8217L15 5.8584L17.3567 8.21506L5.57167 20.0001Z" />
                 </svg>
            </a>
                <div class="left-section">
                    <div class="img-wrapper">
                        <img src="{{ asset($recipe->image_url) }}" alt="Recipe Image">
                    </div>
                    <div class="recipe-info">
                        <div class="tags">
                            <span class="porsi">
                                <img src="{{ asset('icons/porsi-w.svg') }}" alt="porsi">                            
                                {{ $recipe->porsi }}
                            </span>
                            <span class="waktu">
                                <img src="{{ asset('icons/waktu-w.svg') }}" alt="porsi">                                                       
                                {{ $recipe->waktu }} minutes
                            </span>
                            <button type="button" class="btn btn-comment" data-bs-toggle="modal" data-bs-target="#commentModal">
                                <svg width="25" height="25" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 7.001V13.001M7 10.001H13M10 19C11.78 19 13.5201 18.4722 15.0001 17.4832C16.4802 16.4943 17.6337 15.0887 18.3149 13.4442C18.9961 11.7996 19.1743 9.99002 18.8271 8.24419C18.4798 6.49836 17.6226 4.89472 16.364 3.63604C15.1053 2.37737 13.5016 1.5202 11.7558 1.17294C10.01 0.82567 8.20038 1.0039 6.55585 1.68509C4.91131 2.36628 3.50571 3.51983 2.51677 4.99987C1.52784 6.47991 1 8.21997 1 10C1 11.488 1.36 12.89 2 14.127L1 19L5.873 18C7.109 18.639 8.513 19 10 19Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            @csrf
                            <button class="like-button" id="likeButton">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.5 4C4.4625 4 2 6.4625 2 9.5C2 15 8.5 20 12 21.163C15.5 20 22 15 22 9.5C22 6.4625 19.5375 4 16.5 4C14.64 4 12.995 4.9235 12 6.337C11.4928 5.61469 10.819 5.0252 10.0357 4.61841C9.25238 4.21162 8.38263 3.9995 7.5 4Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <p>{{ $recipe->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class= "container-show">
                    <div class="judul">
                        <h4>{{ $recipe->judul}}</h4>
                        <h6>Recipe by <span style="color: pink"> {{ $recipe->user->username }} </span></h6>
                    </div>
                <p> Bahan-bahan: </p>
                <ul>
                    @foreach ($bahan as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                <p> Langkah-langkah: </p>
                <ol>
                    @foreach ($langkah as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel">Comments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="comments align-items-center mb-3">
        @foreach ($comments as $comment)
            <div class="d-flex">
                <div class="profile-image">
                    <img 
                        src="{{ $comment->profilepicture_url }}" 
                        alt="{{ $comment->username }}'s profile picture" 
                        class="rounded-circle" 
                        style="width: 50px; height: 50px; object-fit: cover;">
                </div>
                <div class="ms-3 mt-2">
                    <div class="username font-weight-bold">{{ $comment->username }}</div>
                    <div class="user-comment">{{ $comment->isi_komentar }}</div>
                </div>
            </div>
        @endforeach
    @if (Auth::check())
        <div class="modal-body">
            <form action="{{ route('addComment', $recipe->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="commentText" class="form-label" style="color: black;">Your Comment</label>
                    <textarea class="form-control" id="commentText" name="isi_komentar" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-submit" style="background-color: #405A3F; color: white; border: none; padding: 10px 15px; border-radius: 5px;">Submit</button>
            </form>
        </div>       
    @endif
    </div>
  </div>
</div>
<script>
    document.getElementById('likeButton').addEventListener('click', function() {
        // Toggle kelas 'liked' untuk mengubah warna
        this.classList.toggle('liked');

        // Anda bisa menambahkan aksi ke backend menggunakan fetch() jika diperlukan
        // Contoh:
        // fetch('/like', {
        //     method: 'POST',
        //     body: JSON.stringify({ itemId: 'item-id' }),
        //     headers: {
        //         'Content-Type': 'application/json',
        //     }
        // });
    });
</script>
</body>