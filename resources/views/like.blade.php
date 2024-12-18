<x-layout>
@push('styles')
        <link rel="stylesheet" href="{{ asset('css/like.css') }}">
@endpush 
@if (Auth::check())
    @if ($recipes->isEmpty())
    <div class="container">
        <div class="content">
            <div class="title">
                <div class="heart-icon">
                <svg width="40" height="40" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g filter="url(#filter0_d_935_37)">
                    <ellipse cx="35.0543" cy="31.5282" rx="31.0543" ry="31.5282" fill="white"/>
                    <rect x="14.8543" y="12.6016" width="40.9125" height="41.5453" fill="url(#pattern0_935_37)"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_935_37" x="0" y="0" width="70.1086" height="71.0566" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_935_37"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_935_37" result="shape"/>
                    </filter>
                    <pattern id="pattern0_935_37" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_935_37" transform="matrix(0.0111111 0 0 0.0109419 0 0.00761543)"/>
                    </pattern>
                    <image id="image0_935_37" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4klEQVR4nO2c32tcRRTHR6NRK+IvEBRE8MeDihZRQQRpRNRKg/rgPWeNgT4IxReRGrPnrEWuUlGoVkHxR0FEpWIerEqt/Qt8UaJSXEsrlOSes2mxtVbrz1TtlbmbSm21Zpu5d2Z35wNfyFNmvt+dOzt77swYE4lEIpFIJBKJRCKRSCQSmRdfL33wFEUaUuAnFOl9Ad6qwN8p8AEF+lWBdirSlwr8dob8sCR0latotda4WoDG7P9W4GbRlm0TabboA9JXtk9zfRuyfe26j7VVo2sEeJ0i7VPkvBMJ8jZFpqm70rM6bTcb4bMVuCFA2ztt14YvyK/avpvQUaDFArxZkA92bBSPCny/HW0zw+mi/2t31+jY6Yq8WpB+dNDuQQHe5PLpcsbU8vRUAX5OkH5fqFE90jiQZMi3/VfbUuOlitRy3q71AvRMMFOKJHypIH3h2qgeMcoUeE2epiceatf+rcjPunh6jv1B8+cZPnKJ15Cz2vh1AvxNmUb1cAG/J8nK04ovWaCJytpF3qtQv8FLyAJ8fTGPVmc2n3ukP7aqvl3enyV8rY/pYnfVZtWz7NObjfDFlYRsH1s7b/k2rd7Cpi12+io9aAVa69us+hbwmlJDtmvL4ledb6PoeVS3l36LywsaeLNvkxqIBHljeT+rS16zahepvbYvYVS3axf+DWpQopfKqMJ1XCDqA+1tJumgs6AVGjcHYCoPURk2bnIYtK3Z+jelAUqAU5dBf+DbkAYqAdrgLOjizUgApjREATedBV1Ur3wbwjAlwHscBk2zvg1puPotBo1dFrR9PAIYOXmopVOHI5onfRvScPWJs6AF6K0ADOUhSpDecBZ0K+Hlvg1pqEpo1FnQu0bHzhOgP72bwrBkM7HZGJcI0me+jWlwok+NaxSJ/RvjoCTQqDsPWpKV5wjwT77NaSASpJ9bd/O5zoMuwo7F//zvsIFfNmWR1epXxtdZXLzGmsL65aZMKt6KlYcpWm/KpoWrLrTzk3+z7Eu/7BxZdZGpAkF6KgDDuSetNlWx587xM9rHIrybzisV8Iz1bqqkhTzs3ThWrBotMz6wBZX+Gc30mvHFjoTOFOTMewhYrgRYj+fwklNa2LhFkP/o2ZDReqMhEwKC/JjvQLQ0EZtQyI05oTgc2WujGehD682ExNxhyh2+w1FXAp6yhTQTItNJ44qe2AwJ9IM94mxCRqB+exkHO7W6kXwgq9VvNd2AYON+74Hh8amV8AOmmxDgp7tvNNOTptuw39b2tgDv4eH8JEivmG5l7rz2O8GHDLQhT5IB081MrlhxsiB9FG7IvMn20fQCzSQdDPEHjR0A9goM00s0k3RQkN8NJ2TeGMxdHK7Jk2QgiH18QBP5kvQk08vkSTKgSK/7C5rW93zI/yhCAb1Y+XQBvO7wW2z6gryo+PEL1c3J9HxwlbgqUaSHytyp2t7wQ4/79hkEWmvc0778z/l8PCtII779BUUL6zcK0rfOQrYXBiaNJb59BVvPFqBpByO5FXw92TdZbfyCBW56n5y+79HzffvoCqbszZDIb3Y+XdDEfK7YjPzbimQeWxkOrSz6evm2ULRGyxT5+2PMx/sU63f47mdPoPeOX2bvmztqJANvLX1DeL8xM5wual/6SruLWySB1sb5OBKJRCKRSCQSiUQikUjEeOEvPaDMg21PNw0AAAAASUVORK5CYII="/>
                    </defs>
                </svg>
                </div>
                <h1 class="title-text">Like</h1>
            </div>
            <div class="message">
            <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                    Halaman masih kosong
                </h2>
                <p class="message-subtext" style="font-size: 16px; color: #333;">
                    Cari yuk! suka resep apa aja nih?
                </p>
            </div>
        </div>
    </div>
    @else 
    <div class="title">
        <div class="heart-icon">
            <svg width="40" height="40" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g filter="url(#filter0_d_935_37)">
                <ellipse cx="35.0543" cy="31.5282" rx="31.0543" ry="31.5282" fill="white"/>
                <rect x="14.8543" y="12.6016" width="40.9125" height="41.5453" fill="url(#pattern0_935_37)"/>
                </g>
                <defs>
                <filter id="filter0_d_935_37" x="0" y="0" width="70.1086" height="71.0566" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                <feOffset dy="4"/>
                <feGaussianBlur stdDeviation="2"/>
                <feComposite in2="hardAlpha" operator="out"/>
                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_935_37"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_935_37" result="shape"/>
                </filter>
                <pattern id="pattern0_935_37" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_935_37" transform="matrix(0.0111111 0 0 0.0109419 0 0.00761543)"/>
                </pattern>
                <image id="image0_935_37" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4klEQVR4nO2c32tcRRTHR6NRK+IvEBRE8MeDihZRQQRpRNRKg/rgPWeNgT4IxReRGrPnrEWuUlGoVkHxR0FEpWIerEqt/Qt8UaJSXEsrlOSes2mxtVbrz1TtlbmbSm21Zpu5d2Z35wNfyFNmvt+dOzt77swYE4lEIpFIJBKJRCKRSCQSmRdfL33wFEUaUuAnFOl9Ad6qwN8p8AEF+lWBdirSlwr8dob8sCR0latotda4WoDG7P9W4GbRlm0TabboA9JXtk9zfRuyfe26j7VVo2sEeJ0i7VPkvBMJ8jZFpqm70rM6bTcb4bMVuCFA2ztt14YvyK/avpvQUaDFArxZkA92bBSPCny/HW0zw+mi/2t31+jY6Yq8WpB+dNDuQQHe5PLpcsbU8vRUAX5OkH5fqFE90jiQZMi3/VfbUuOlitRy3q71AvRMMFOKJHypIH3h2qgeMcoUeE2epiceatf+rcjPunh6jv1B8+cZPnKJ15Cz2vh1AvxNmUb1cAG/J8nK04ovWaCJytpF3qtQv8FLyAJ8fTGPVmc2n3ukP7aqvl3enyV8rY/pYnfVZtWz7NObjfDFlYRsH1s7b/k2rd7Cpi12+io9aAVa69us+hbwmlJDtmvL4ledb6PoeVS3l36LywsaeLNvkxqIBHljeT+rS16zahepvbYvYVS3axf+DWpQopfKqMJ1XCDqA+1tJumgs6AVGjcHYCoPURk2bnIYtK3Z+jelAUqAU5dBf+DbkAYqAdrgLOjizUgApjREATedBV1Ur3wbwjAlwHscBk2zvg1puPotBo1dFrR9PAIYOXmopVOHI5onfRvScPWJs6AF6K0ADOUhSpDecBZ0K+Hlvg1pqEpo1FnQu0bHzhOgP72bwrBkM7HZGJcI0me+jWlwok+NaxSJ/RvjoCTQqDsPWpKV5wjwT77NaSASpJ9bd/O5zoMuwo7F//zvsIFfNmWR1epXxtdZXLzGmsL65aZMKt6KlYcpWm/KpoWrLrTzk3+z7Eu/7BxZdZGpAkF6KgDDuSetNlWx587xM9rHIrybzisV8Iz1bqqkhTzs3ThWrBotMz6wBZX+Gc30mvHFjoTOFOTMewhYrgRYj+fwklNa2LhFkP/o2ZDReqMhEwKC/JjvQLQ0EZtQyI05oTgc2WujGehD682ExNxhyh2+w1FXAp6yhTQTItNJ44qe2AwJ9IM94mxCRqB+exkHO7W6kXwgq9VvNd2AYON+74Hh8amV8AOmmxDgp7tvNNOTptuw39b2tgDv4eH8JEivmG5l7rz2O8GHDLQhT5IB081MrlhxsiB9FG7IvMn20fQCzSQdDPEHjR0A9goM00s0k3RQkN8NJ2TeGMxdHK7Jk2QgiH18QBP5kvQk08vkSTKgSK/7C5rW93zI/yhCAb1Y+XQBvO7wW2z6gryo+PEL1c3J9HxwlbgqUaSHytyp2t7wQ4/79hkEWmvc0778z/l8PCtII779BUUL6zcK0rfOQrYXBiaNJb59BVvPFqBpByO5FXw92TdZbfyCBW56n5y+79HzffvoCqbszZDIb3Y+XdDEfK7YjPzbimQeWxkOrSz6evm2ULRGyxT5+2PMx/sU63f47mdPoPeOX2bvmztqJANvLX1DeL8xM5wual/6SruLWySB1sb5OBKJRCKRSCQSiUQikUjEeOEvPaDMg21PNw0AAAAASUVORK5CYII="/>
                </defs>
            </svg>
            </div>
            <h1 class="title-text">Like</h1>
        </div>
        <div class="recipes">
        @foreach ($recipes as $recipe)
        <a href="{{ route('show', $recipe->id) }}" class="recipe-card-link">
            <div class="recipe-card">
                <div class="image-wrapper">                        
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
                    </div>
                    <h5>{{ $recipe->judul}}</h5>
                    <p>{{ $recipe->deskripsi }}</p>
                    <p>Recipe by {{ $recipe->user->username }}</p>
                </div>
            </div>
        </a>
        @endforeach
        </div>
    @endif
@else 
<div class="containerLike">
        <div class="content">
            <div class="titleLike">
                <div class="heart-icon">
                <svg width="40" height="40" viewBox="0 0 71 72" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g filter="url(#filter0_d_935_37)">
                    <ellipse cx="35.0543" cy="31.5282" rx="31.0543" ry="31.5282" fill="white"/>
                    <rect x="14.8543" y="12.6016" width="40.9125" height="41.5453" fill="url(#pattern0_935_37)"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_935_37" x="0" y="0" width="70.1086" height="71.0566" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_935_37"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_935_37" result="shape"/>
                    </filter>
                    <pattern id="pattern0_935_37" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_935_37" transform="matrix(0.0111111 0 0 0.0109419 0 0.00761543)"/>
                    </pattern>
                    <image id="image0_935_37" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4klEQVR4nO2c32tcRRTHR6NRK+IvEBRE8MeDihZRQQRpRNRKg/rgPWeNgT4IxReRGrPnrEWuUlGoVkHxR0FEpWIerEqt/Qt8UaJSXEsrlOSes2mxtVbrz1TtlbmbSm21Zpu5d2Z35wNfyFNmvt+dOzt77swYE4lEIpFIJBKJRCKRSCQSmRdfL33wFEUaUuAnFOl9Ad6qwN8p8AEF+lWBdirSlwr8dob8sCR0latotda4WoDG7P9W4GbRlm0TabboA9JXtk9zfRuyfe26j7VVo2sEeJ0i7VPkvBMJ8jZFpqm70rM6bTcb4bMVuCFA2ztt14YvyK/avpvQUaDFArxZkA92bBSPCny/HW0zw+mi/2t31+jY6Yq8WpB+dNDuQQHe5PLpcsbU8vRUAX5OkH5fqFE90jiQZMi3/VfbUuOlitRy3q71AvRMMFOKJHypIH3h2qgeMcoUeE2epiceatf+rcjPunh6jv1B8+cZPnKJ15Cz2vh1AvxNmUb1cAG/J8nK04ovWaCJytpF3qtQv8FLyAJ8fTGPVmc2n3ukP7aqvl3enyV8rY/pYnfVZtWz7NObjfDFlYRsH1s7b/k2rd7Cpi12+io9aAVa69us+hbwmlJDtmvL4ledb6PoeVS3l36LywsaeLNvkxqIBHljeT+rS16zahepvbYvYVS3axf+DWpQopfKqMJ1XCDqA+1tJumgs6AVGjcHYCoPURk2bnIYtK3Z+jelAUqAU5dBf+DbkAYqAdrgLOjizUgApjREATedBV1Ur3wbwjAlwHscBk2zvg1puPotBo1dFrR9PAIYOXmopVOHI5onfRvScPWJs6AF6K0ADOUhSpDecBZ0K+Hlvg1pqEpo1FnQu0bHzhOgP72bwrBkM7HZGJcI0me+jWlwok+NaxSJ/RvjoCTQqDsPWpKV5wjwT77NaSASpJ9bd/O5zoMuwo7F//zvsIFfNmWR1epXxtdZXLzGmsL65aZMKt6KlYcpWm/KpoWrLrTzk3+z7Eu/7BxZdZGpAkF6KgDDuSetNlWx587xM9rHIrybzisV8Iz1bqqkhTzs3ThWrBotMz6wBZX+Gc30mvHFjoTOFOTMewhYrgRYj+fwklNa2LhFkP/o2ZDReqMhEwKC/JjvQLQ0EZtQyI05oTgc2WujGehD682ExNxhyh2+w1FXAp6yhTQTItNJ44qe2AwJ9IM94mxCRqB+exkHO7W6kXwgq9VvNd2AYON+74Hh8amV8AOmmxDgp7tvNNOTptuw39b2tgDv4eH8JEivmG5l7rz2O8GHDLQhT5IB081MrlhxsiB9FG7IvMn20fQCzSQdDPEHjR0A9goM00s0k3RQkN8NJ2TeGMxdHK7Jk2QgiH18QBP5kvQk08vkSTKgSK/7C5rW93zI/yhCAb1Y+XQBvO7wW2z6gryo+PEL1c3J9HxwlbgqUaSHytyp2t7wQ4/79hkEWmvc0778z/l8PCtII779BUUL6zcK0rfOQrYXBiaNJb59BVvPFqBpByO5FXw92TdZbfyCBW56n5y+79HzffvoCqbszZDIb3Y+XdDEfK7YjPzbimQeWxkOrSz6evm2ULRGyxT5+2PMx/sU63f47mdPoPeOX2bvmztqJANvLX1DeL8xM5wual/6SruLWySB1sb5OBKJRCKRSCQSiUQikUjEeOEvPaDMg21PNw0AAAAASUVORK5CYII="/>
                    </defs>
                </svg>
                </div>
                <h1 class="title-text">Like</h1>
            </div>
            <div class="messageLike">
                <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                    Anda harus masuk terlebih dahulu
                </h2>
                <p class="message-subtext" style="font-size: 16px; color: #333;">
                    Masuk untuk menyimpan resep yang anda sukai.
                </p>
            </div>
            <button class="btnlike" data-bs-toggle="modal" data-bs-target="#loginModal">
                <svg width="30" height="20" viewBox="0 0 48 39" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect x="0.77002" y="0.243164" width="46.9265" height="38.6937" fill="url(#pattern0_628_2250)"/>
                    <defs>
                    <pattern id="pattern0_628_2250" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_628_2250" transform="matrix(0.00916176 0 0 0.0111111 0.0877207 0)"/>
                    </pattern>
                    <image id="image0_628_2250" width="90" height="90" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAD2ElEQVR4nO2cS4tcRRSAS0fFZKGgRgXxEaJbcSGiqCCiQRcufSS6EFQCycK/kKUoGMUHEnTl4w8I2biS+CLGB5qY0JnuU7dxCBg1ESE6fY5+Ut6BGTHG9EzfW3dunQ/OpruhOR+ni+pT51YIjuM4juM4juM4zvTA+EYj7lLie0b8UpGflDipQ36sX0vvyU6otqziK8oFuMCIjxvxEyMyXcjHhmwH5nLn0WkUeUCRwfSC/xlKPKqMtubOp3PAwkZF3lyr4H8Ll70w3pA7v04A81ca8sWsJa9YTj6HwaZQumQlHm1O8vJSUqxsWNjYbCWfqbLl4lAa2sCafA6V/UYoCWW0tW3Jy7LlwVDKPllnsIVbQ1UfKWKfbcQncklesV4/FvqOET/tgOiPQgG9C3KHIn9C3Bz6ihF35Za8HKMdoa9o3YWjI1X9TugrRvwqt+DlkIOhr2jdQ+6A5L+3eT+EvqLExQ6J/j30FeuA4JUR+op1QK6LxkXPDPU1uh3Udx3tYL6Pbgclvtud7Z28HfqKITtzCy6i1wHVltQ560b3Tm4IfcZWNYE065D9oe8Ysj2/6OqR0HeAuTZmOc6ybBwu4swwoVT35xMd7w0locjeDJJfD6UB4w1peqhF0Z8VOamUSPNwLc3eHYGFK0LJwGCTIQeareRCBxzPtIykubgm1uRil4uzoVT3pZ/52gXL4eJ2F9MCzBmyLU0TTfN3vf6s7DdGjwLn585jXQFxc2r+pBmMNEud+tnp8KAOOZFGBur3Rjt637twHMdxHMdxHMcpBhheOkHuMOIzirxkxH2pA1ffWBCPK/G3pTi+1BdJDx/tU+IeIz49QW6HwSW58+gcIFenA1slvqXIcHadO5mvn86VbTC8KpTIInKLIs8bcqjppv+KhtM3ijy3yPDm0GdgeJ1RPZuu52lD7v+3UWU3zN8U+sKE6i5D3u/ChNJ/VPoHSvUQcF5Yb8Chi4z4lCHf5pZp5x5fG/IkHLwwrAdSdShyrAPiWGWVD4zq4c5W+IThbelUJLcom118OKG6NXTsWojdilgH5DDj6v5DkZezLyfp+Ki+ay6/FGs05EC6MCCLZEXuUeKp/BJiS9UdT06o7m5VcvrC9Dc4d/LWumw5PSHe2Ypk+P7y+gQ6f+KWR/YJGF/WuGglvpg7Wcsv+4UWROe7eMo6Ekr8rg3Rp3MnatlFy68tiI4xd6KWX/R8C6LlldyJWnbRcU/jomF8jSI/Fyz5FBy7NrT1sI8SfylQ8snWx4HTpKcSX0u7EEW0v3JFl3J8FUbXtyrZcRzHcRzHcRzHcRwndJO/AJEQlrpXBjiOAAAAAElFTkSuQmCC"/>
                    </defs>
                </svg>
                Masuk/Daftar
            </button>
        </div>
    </div>
@endif


</x-layout>