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
             <a onclick="window.location.href='{{ url('/') }}';" class="back-btn">
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
                            <div class="tags-left">
                                <span class="porsi">
                                    <img src="{{ asset('icons/porsi-w.svg') }}" alt="porsi">                            
                                    {{ $recipe->porsi }}
                                </span>
                                <span class="waktu">
                                    <img src="{{ asset('icons/waktu-w.svg') }}" alt="porsi">                                                       
                                    {{ $recipe->waktu }} minutes
                                </span>
                            </div>
                            <div class="tags-right">
                                @if (Auth::check())
                                    @if($myrecipe)
                                        <button class="edit-button" id="editButton">
                                            <a href="{{ route('editPage', $recipe->id)}}" >
                                                <img src="{{ asset('icons/edit.svg') }}" alt="edit" style="width: 33px; height: 33px">                                                       
                                            </a>
                                        </button>
                                    @endif
                                @endif
                                <button type="button" class="btn btn-comment" data-bs-toggle="modal" data-bs-target="#commentModal">
                                    <img src="{{ asset('icons/comment.svg') }}" alt="comment" style="width: 30px; height: 30px; margin-top: 2px">                                                       
                                </button>
                                @csrf
                                @if (Auth::check())
                                <div class="like-button">
                                    @if ($likeExists)
                                        <form action="{{ route('unlike') }}" method="POST" style="display: inline">
                                            @csrf
                                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                            <button type="submit" class="like-button">
                                                <img src="{{ asset('icons/liked.svg') }}" alt="Unlike" style="width: 30px; height: 30px;">
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('like') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                                            <button type="submit" class="like-button">
                                                <img src="{{ asset('icons/notliked.svg') }}" alt="Like" style="width: 30px; height: 30px;">
                                            </button>
                                        </form>
                                    @endif
                                </div>                           
                                @endif
                                <button class="download-button" id="downloadButton">
                                    <a href="{{ route('recipes.download', $recipe->id) }}" >
                                        <img src="{{ asset('icons/download.svg') }}" alt="download" style="width: 33px; height: 33px">                                                       
                                    </a>
                                </button>
                            </div>
                        </div>
                        <p>{{ $recipe->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="right-side">
                <div class= "container-show">
                    <div class="judul">
                        <h4>{{ $recipe->judul}}</h4>
                        <h6>Recipe by <span style="color: #E35778"> {{ $recipe->user->username }} </span></h6>
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
        @if ($comments->isEmpty())
            <div class="d-flex justify-content-center align-items-center" style="height: 70px;">
                <h5>No comments yet.</h5>
            </div>
        @else
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
        @endif 
    @if (Auth::check())
        <div class="modal-body">
            <form action="{{ route('addComment', $recipe->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="commentText" class="form-label" style="color: black;">Your Comment</label>
                    <textarea class="form-control" id="commentText" name="isi_komentar" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-submit" style="background-color: #8DD14F; color: white; border: none; padding: 10px 15px; border-radius: 5px;">Submit</button>
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