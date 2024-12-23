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
                                <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.25 9.9684H2.75C2.65883 9.9684 2.5714 10.0046 2.50693 10.0691C2.44247 10.1335 2.40625 10.221 2.40625 10.3122C2.40912 11.9195 2.86127 13.494 3.71165 14.8579C4.56203 16.2219 5.77678 17.321 7.21875 18.0311V18.5622C7.21875 18.8357 7.3274 19.098 7.5208 19.2914C7.71419 19.4848 7.9765 19.5934 8.25 19.5934H13.75C14.0235 19.5934 14.2858 19.4848 14.4792 19.2914C14.6726 19.098 14.7812 18.8357 14.7812 18.5622V18.0311C16.2232 17.321 17.438 16.2219 18.2883 14.8579C19.1387 13.494 19.5909 11.9195 19.5938 10.3122C19.5938 10.221 19.5575 10.1335 19.4931 10.0691C19.4286 10.0046 19.3412 9.9684 19.25 9.9684ZM14.294 17.5017C14.2342 17.5292 14.1835 17.5733 14.148 17.6287C14.1125 17.6842 14.0937 17.7487 14.0938 17.8145V18.5622C14.0938 18.6533 14.0575 18.7408 13.9931 18.8052C13.9286 18.8697 13.8412 18.9059 13.75 18.9059H8.25C8.15883 18.9059 8.0714 18.8697 8.00693 18.8052C7.94247 18.7408 7.90625 18.6533 7.90625 18.5622V17.8145C7.90634 17.7487 7.88751 17.6842 7.85202 17.6287C7.81652 17.5733 7.76584 17.5292 7.70602 17.5017C6.38448 16.8927 5.25591 15.9319 4.4438 14.7245C3.63168 13.5171 3.16731 12.1095 3.10148 10.6559H18.8985C18.8327 12.1095 18.3683 13.5171 17.5562 14.7245C16.7441 15.9319 15.6155 16.8927 14.294 17.5017ZM14.1694 4.94106C14.6472 4.34637 14.8569 3.83332 14.7563 3.49645C14.6704 3.19223 14.3352 3.07793 14.3318 3.07707C14.2448 3.04949 14.1724 2.9885 14.1304 2.90752C14.0884 2.82653 14.0804 2.73219 14.1079 2.64524C14.1355 2.55828 14.1965 2.48585 14.2775 2.44387C14.3585 2.40188 14.4528 2.39379 14.5398 2.42137C14.5673 2.42996 15.2135 2.63793 15.4129 3.2902C15.5891 3.8677 15.351 4.56809 14.7056 5.3716C14.2278 5.96543 14.0181 6.47848 14.1187 6.81535C14.2046 7.11957 14.5398 7.23387 14.5432 7.23473C14.6214 7.25972 14.688 7.31186 14.7311 7.38172C14.7742 7.45158 14.7909 7.53455 14.7781 7.61563C14.7653 7.69671 14.724 7.77054 14.6615 7.82378C14.599 7.87701 14.5196 7.90614 14.4375 7.9059C14.4028 7.9058 14.3684 7.90059 14.3352 7.89043C14.3077 7.88184 13.6615 7.67387 13.4621 7.0216C13.2859 6.44496 13.524 5.74371 14.1694 4.94106ZM10.7319 4.94106C11.2097 4.34637 11.4194 3.83332 11.3188 3.49645C11.2329 3.19223 10.8977 3.07793 10.8943 3.07707C10.8073 3.04949 10.7349 2.9885 10.6929 2.90752C10.6509 2.82653 10.6429 2.73219 10.6704 2.64524C10.698 2.55828 10.759 2.48585 10.84 2.44387C10.921 2.40188 11.0153 2.39379 11.1023 2.42137C11.1298 2.42996 11.776 2.63793 11.9754 3.2902C12.1516 3.8677 11.9135 4.56809 11.2681 5.3716C10.7903 5.96543 10.5806 6.47848 10.6812 6.81535C10.7671 7.11957 11.1023 7.23387 11.1057 7.23473C11.1839 7.25972 11.2505 7.31186 11.2936 7.38172C11.3367 7.45158 11.3534 7.53455 11.3406 7.61563C11.3278 7.69671 11.2865 7.77054 11.224 7.82378C11.1615 7.87701 11.0821 7.90614 11 7.9059C10.9653 7.9058 10.9309 7.90059 10.8977 7.89043C10.8702 7.88184 10.224 7.67387 10.0246 7.0216C9.84844 6.44496 10.0865 5.74371 10.7319 4.94106ZM7.29437 4.94106C7.77219 4.34637 7.98187 3.83332 7.88133 3.49645C7.79539 3.19223 7.46023 3.07793 7.4568 3.07707C7.41374 3.06342 7.3738 3.04141 7.33925 3.01232C7.3047 2.98323 7.27622 2.94762 7.25543 2.90752C7.23464 2.86742 7.22195 2.82362 7.21809 2.77862C7.21423 2.73361 7.21927 2.68829 7.23293 2.64524C7.24659 2.60218 7.26859 2.56224 7.29768 2.52769C7.32677 2.49314 7.36238 2.46465 7.40248 2.44387C7.44258 2.42308 7.48638 2.41039 7.53139 2.40653C7.57639 2.40267 7.62171 2.40771 7.66477 2.42137C7.69227 2.42996 8.33852 2.63793 8.53789 3.2902C8.71406 3.8677 8.47602 4.56809 7.83063 5.3716C7.35281 5.96543 7.14313 6.47848 7.24367 6.81535C7.32961 7.11957 7.66477 7.23387 7.6682 7.23473C7.74638 7.25972 7.81303 7.31186 7.85611 7.38172C7.89919 7.45158 7.91586 7.53455 7.90309 7.61563C7.89032 7.69671 7.84896 7.77054 7.7865 7.82378C7.72403 7.87701 7.64458 7.90614 7.5625 7.9059C7.52784 7.9058 7.49338 7.90059 7.46023 7.89043C7.43273 7.88184 6.78648 7.67387 6.58711 7.0216C6.41094 6.44496 6.64898 5.74371 7.29437 4.94106Z" fill="black"/>
                                </svg>                            
                                {{ $recipe->porsi }}
                            </span>
                            <span class="waktu">
                                <svg width="20" height="20" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 18.7913C15.3033 18.7913 18.7917 15.3029 18.7917 10.9997C18.7917 6.69646 15.3033 3.20801 11 3.20801C6.69682 3.20801 3.20837 6.69646 3.20837 10.9997C3.20837 15.3029 6.69682 18.7913 11 18.7913Z" stroke="black"/>
                                    <path d="M15.125 10.9993H11.2292C11.1684 10.9993 11.1101 10.9752 11.0671 10.9322C11.0241 10.8893 11 10.831 11 10.7702V7.79102" stroke="black" stroke-linecap="round"/>
                                </svg>                                                       
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
        <h5 class="modal-title" id="commentModalLabel">Add a Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="d-flex align-items-center">
        <div class="profile-image"></div>
            <div class="ms-3">
                <div class="username">UsernameUser</div>
                <div class="user-comment">"Isi komentar sebelumnya."</div>
            </div>
        </div>
      <div class="modal-body">
        <form action="/submit-comment" method="POST">
          @csrf
          <div class="mb-3">
            <label for="commentText" class="form-label"style="color: black;" >Your Comment</label>
            <textarea class="form-control" id="commentText" name="comment" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-submit" style="background-color: #405A3F; color: white; border: none; padding: 10px 15px; border-radius: 5px;">Submit</button>
        </form>
      </div>
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