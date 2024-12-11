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
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://i.pinimg.com/736x/69/23/30/6923305f212ed3ebbd52bd5694c0c728.jpg" class="d-block" alt="...">
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
            <div class="recipes">
                @foreach ($recipes as $recipe)
                <a href="{{ route('show', $recipe->id) }}" class="recipe-card-link">
                    <div class="recipe-card">
                        <div class="image-wrapper">                        
                            <img src="{{ asset($recipe->image_url) }}" alt="Recipe Image">
                            <button class="like-button">
                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M0.0742188 0.0126953H16.1529V15.4746H0.0742188V0.0126953Z" fill="url(#pattern0_1006_100)"/>
                                    <defs>
                                    <pattern id="pattern0_1006_100" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_1006_100" transform="matrix(0.0106849 0 0 0.0111111 0.0191811 0)"/>
                                    </pattern>
                                    <image id="image0_1006_100" width="90" height="90" xlink:href="data:image/png;base64,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"/>
                                    </defs>
                                </svg>                                      
                            </button>
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
                            </div>
                            <h5>{{ $recipe->judul}}</h5>
                            <p>{{ $recipe->deskripsi }}</p>
                            <p>Recipe by {{ $recipe->user->username }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
</x-layout>