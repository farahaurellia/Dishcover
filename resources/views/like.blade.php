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
        <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g filter="url(#filter0_d_137_2433)">
            <ellipse cx="26.5" cy="22" rx="22.5" ry="22" fill="white"/>
            <rect x="11.8644" y="8.79395" width="29.6426" height="28.9898" fill="url(#pattern0_137_2433)"/>
            </g>
            <defs>
            <filter id="filter0_d_137_2433" x="0" y="0" width="53" height="52" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
            <feOffset dy="4"/>
            <feGaussianBlur stdDeviation="2"/>
            <feComposite in2="hardAlpha" operator="out"/>
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_137_2433"/>
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_137_2433" result="shape"/>
            </filter>
            <pattern id="pattern0_137_2433" patternContentUnits="objectBoundingBox" width="1" height="1">
            <use xlink:href="#image0_137_2433" transform="matrix(0.0108664 0 0 0.0111111 0.0110112 0)"/>
            </pattern>
            <image id="image0_137_2433" width="90" height="90" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4klEQVR4nO2c32tcRRTHR6NRK+IvEBRE8MeDihZRQQRpRNRKg/rgPWeNgT4IxReRGrPnrEWuUlGoVkHxR0FEpWIerEqt/Qt8UaJSXEsrlOSes2mxtVbrz1TtlbmbSm21Zpu5d2Z35wNfyFNmvt+dOzt77swYE4lEIpFIJBKJRCKRSCQSmRdfL33wFEUaUuAnFOl9Ad6qwN8p8AEF+lWBdirSlwr8dob8sCR0latotda4WoDG7P9W4GbRlm0TabboA9JXtk9zfRuyfe26j7VVo2sEeJ0i7VPkvBMJ8jZFpqm70rM6bTcb4bMVuCFA2ztt14YvyK/avpvQUaDFArxZkA92bBSPCny/HW0zw+mi/2t31+jY6Yq8WpB+dNDuQQHe5PLpcsbU8vRUAX5OkH5fqFE90jiQZMi3/VfbUuOlitRy3q71AvRMMFOKJHypIH3h2qgeMcoUeE2epiceatf+rcjPunh6jv1B8+cZPnKJ15Cz2vh1AvxNmUb1cAG/J8nK04ovWaCJytpF3qtQv8FLyAJ8fTGPVmc2n3ukP7aqvl3enyV8rY/pYnfVZtWz7NObjfDFlYRsH1s7b/k2rd7Cpi12+io9aAVa69us+hbwmlJDtmvL4ledb6PoeVS3l36LywsaeLNvkxqIBHljeT+rS16zahepvbYvYVS3axf+DWpQopfKqMJ1XCDqA+1tJumgs6AVGjcHYCoPURk2bnIYtK3Z+jelAUqAU5dBf+DbkAYqAdrgLOjizUgApjREATedBV1Ur3wbwjAlwHscBk2zvg1puPotBo1dFrR9PAIYOXmopVOHI5onfRvScPWJs6AF6K0ADOUhSpDecBZ0K+Hlvg1pqEpo1FnQu0bHzhOgP72bwrBkM7HZGJcI0me+jWlwok+NaxSJ/RvjoCTQqDsPWpKV5wjwT77NaSASpJ9bd/O5zoMuwo7F//zvsIFfNmWR1epXxtdZXLzGmsL65aZMKt6KlYcpWm/KpoWrLrTzk3+z7Eu/7BxZdZGpAkF6KgDDuSetNlWx587xM9rHIrybzisV8Iz1bqqkhTzs3ThWrBotMz6wBZX+Gc30mvHFjoTOFOTMewhYrgRYj+fwklNa2LhFkP/o2ZDReqMhEwKC/JjvQLQ0EZtQyI05oTgc2WujGehD682ExNxhyh2+w1FXAp6yhTQTItNJ44qe2AwJ9IM94mxCRqB+exkHO7W6kXwgq9VvNd2AYON+74Hh8amV8AOmmxDgp7tvNNOTptuw39b2tgDv4eH8JEivmG5l7rz2O8GHDLQhT5IB081MrlhxsiB9FG7IvMn20fQCzSQdDPEHjR0A9goM00s0k3RQkN8NJ2TeGMxdHK7Jk2QgiH18QBP5kvQk08vkSTKgSK/7C5rW93zI/yhCAb1Y+XQBvO7wW2z6gryo+PEL1c3J9HxwlbgqUaSHytyp2t7wQ4/79hkEWmvc0778z/l8PCtII779BUUL6zcK0rfOQrYXBiaNJb59BVvPFqBpByO5FXw92TdZbfyCBW56n5y+79HzffvoCqbszZDIb3Y+XdDEfK7YjPzbimQeWxkOrSz6evm2ULRGyxT5+2PMx/sU63f47mdPoPeOX2bvmztqJANvLX1DeL8xM5wual/6SruLWySB1sb5OBKJRCKRSCQSiUQikUjEeOEvPaDMg21PNw0AAAAASUVORK5CYII="/>
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
                        <svg width="50" height="25" viewBox="0 0 50 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0.5H40C45.2467 0.5 49.5 4.7533 49.5 10V15C49.5 20.2467 45.2467 24.5 40 24.5H10C4.7533 24.5 0.5 20.2467 0.5 15V10C0.5 4.7533 4.7533 0.5 10 0.5Z" stroke="#F6664E"/>
                            <path d="M26.6 19V18.355C27.58 17.365 28.41 16.5 29.09 15.76C29.77 15.01 30.285 14.34 30.635 13.75C30.985 13.16 31.16 12.6 31.16 12.07C31.16 11.51 31.005 11.05 30.695 10.69C30.395 10.33 29.92 10.15 29.27 10.15C28.87 10.15 28.49 10.26 28.13 10.48C27.78 10.7 27.465 10.98 27.185 11.32L26.54 10.69C26.94 10.26 27.365 9.915 27.815 9.655C28.265 9.385 28.795 9.25 29.405 9.25C29.985 9.25 30.485 9.365 30.905 9.595C31.335 9.825 31.665 10.15 31.895 10.57C32.125 10.98 32.24 11.465 32.24 12.025C32.24 12.635 32.065 13.25 31.715 13.87C31.375 14.49 30.9 15.15 30.29 15.85C29.69 16.54 28.995 17.3 28.205 18.13C28.465 18.11 28.735 18.095 29.015 18.085C29.295 18.065 29.56 18.055 29.81 18.055H32.705V19H26.6ZM37.9578 19V12.46C37.9578 12.21 37.9678 11.91 37.9878 11.56C38.0078 11.21 38.0228 10.91 38.0328 10.66H37.9728C37.8528 10.88 37.7278 11.095 37.5978 11.305C37.4678 11.515 37.3328 11.74 37.1928 11.98L34.8078 15.43H40.3278V16.3H33.6378V15.595L37.8228 9.43H38.9928V19H37.9578Z" fill="#F6664E"/>
                            <path d="M23.6945 11.9684H7.19446C7.10329 11.9684 7.01586 12.0046 6.95139 12.0691C6.88692 12.1335 6.85071 12.221 6.85071 12.3122C6.85358 13.9195 7.30573 15.494 8.15611 16.8579C9.00649 18.2219 10.2212 19.321 11.6632 20.0311V20.5622C11.6632 20.8357 11.7719 21.098 11.9653 21.2914C12.1587 21.4848 12.421 21.5934 12.6945 21.5934H18.1945C18.468 21.5934 18.7303 21.4848 18.9237 21.2914C19.1171 21.098 19.2257 20.8357 19.2257 20.5622V20.0311C20.6677 19.321 21.8824 18.2219 22.7328 16.8579C23.5832 15.494 24.0353 13.9195 24.0382 12.3122C24.0382 12.221 24.002 12.1335 23.9375 12.0691C23.8731 12.0046 23.7856 11.9684 23.6945 11.9684ZM18.7384 19.5017C18.6786 19.5292 18.6279 19.5733 18.5924 19.6287C18.5569 19.6842 18.5381 19.7487 18.5382 19.8145V20.5622C18.5382 20.6533 18.502 20.7408 18.4375 20.8052C18.3731 20.8697 18.2856 20.9059 18.1945 20.9059H12.6945C12.6033 20.9059 12.5159 20.8697 12.4514 20.8052C12.3869 20.7408 12.3507 20.6533 12.3507 20.5622V19.8145C12.3508 19.7487 12.332 19.6842 12.2965 19.6287C12.261 19.5733 12.2103 19.5292 12.1505 19.5017C10.8289 18.8927 9.70037 17.9319 8.88826 16.7245C8.07614 15.5171 7.61177 14.1095 7.54594 12.6559H23.343C23.2771 14.1095 22.8128 15.5171 22.0007 16.7245C21.1885 17.9319 20.06 18.8927 18.7384 19.5017ZM18.6138 6.94106C19.0916 6.34637 19.3013 5.83332 19.2008 5.49645C19.1148 5.19223 18.7797 5.07793 18.7763 5.07707C18.6893 5.04949 18.6169 4.9885 18.5749 4.90752C18.5329 4.82653 18.5248 4.73219 18.5524 4.64524C18.58 4.55828 18.641 4.48585 18.7219 4.44387C18.8029 4.40188 18.8973 4.39379 18.9842 4.42137C19.0117 4.42996 19.658 4.63793 19.8573 5.2902C20.0335 5.8677 19.7955 6.56809 19.1501 7.3716C18.6723 7.96543 18.4626 8.47848 18.5631 8.81535C18.6491 9.11957 18.9842 9.23387 18.9877 9.23473C19.0658 9.25972 19.1325 9.31186 19.1756 9.38172C19.2187 9.45158 19.2353 9.53455 19.2225 9.61563C19.2098 9.69671 19.1684 9.77054 19.106 9.82378C19.0435 9.87701 18.964 9.90614 18.882 9.9059C18.8473 9.9058 18.8128 9.90059 18.7797 9.89043C18.7522 9.88184 18.1059 9.67387 17.9066 9.0216C17.7304 8.44496 17.9684 7.74371 18.6138 6.94106ZM15.1763 6.94106C15.6541 6.34637 15.8638 5.83332 15.7633 5.49645C15.6773 5.19223 15.3422 5.07793 15.3388 5.07707C15.2518 5.04949 15.1794 4.9885 15.1374 4.90752C15.0954 4.82653 15.0873 4.73219 15.1149 4.64524C15.1425 4.55828 15.2035 4.48585 15.2844 4.44387C15.3654 4.40188 15.4598 4.39379 15.5467 4.42137C15.5742 4.42996 16.2205 4.63793 16.4198 5.2902C16.596 5.8677 16.358 6.56809 15.7126 7.3716C15.2348 7.96543 15.0251 8.47848 15.1256 8.81535C15.2116 9.11957 15.5467 9.23387 15.5502 9.23473C15.6283 9.25972 15.695 9.31186 15.7381 9.38172C15.7812 9.45158 15.7978 9.53455 15.785 9.61563C15.7723 9.69671 15.7309 9.77054 15.6685 9.82378C15.606 9.87701 15.5265 9.90614 15.4445 9.9059C15.4098 9.9058 15.3753 9.90059 15.3422 9.89043C15.3147 9.88184 14.6684 9.67387 14.4691 9.0216C14.2929 8.44496 14.5309 7.74371 15.1763 6.94106ZM11.7388 6.94106C12.2166 6.34637 12.4263 5.83332 12.3258 5.49645C12.2398 5.19223 11.9047 5.07793 11.9013 5.07707C11.8582 5.06342 11.8183 5.04141 11.7837 5.01232C11.7492 4.98323 11.7207 4.94762 11.6999 4.90752C11.6791 4.86742 11.6664 4.82362 11.6626 4.77862C11.6587 4.73361 11.6637 4.68829 11.6774 4.64524C11.691 4.60218 11.713 4.56224 11.7421 4.52769C11.7712 4.49314 11.8068 4.46465 11.8469 4.44387C11.887 4.42308 11.9308 4.41039 11.9758 4.40653C12.0208 4.40267 12.0662 4.40771 12.1092 4.42137C12.1367 4.42996 12.783 4.63793 12.9823 5.2902C13.1585 5.8677 12.9205 6.56809 12.2751 7.3716C11.7973 7.96543 11.5876 8.47848 11.6881 8.81535C11.7741 9.11957 12.1092 9.23387 12.1127 9.23473C12.1908 9.25972 12.2575 9.31186 12.3006 9.38172C12.3437 9.45158 12.3603 9.53455 12.3475 9.61563C12.3348 9.69671 12.2934 9.77054 12.231 9.82378C12.1685 9.87701 12.089 9.90614 12.007 9.9059C11.9723 9.9058 11.9378 9.90059 11.9047 9.89043C11.8772 9.88184 11.2309 9.67387 11.0316 9.0216C10.8554 8.44496 11.0934 7.74371 11.7388 6.94106Z" fill="#F6664E"/>
                            </svg>
                        </span>
                        <span class="waktu">
                        <svg width="90" height="25" viewBox="0 0 90 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="89" height="24" rx="9.5" stroke="#F6664E"/>
                            <path d="M16 20.2913C20.3033 20.2913 23.7917 16.8029 23.7917 12.4997C23.7917 8.19646 20.3033 4.70801 16 4.70801C11.6968 4.70801 8.20837 8.19646 8.20837 12.4997C8.20837 16.8029 11.6968 20.2913 16 20.2913Z" stroke="#F6664E"/>
                            <path d="M20.125 12.4993H16.2292C16.1684 12.4993 16.1101 12.4752 16.0671 12.4322C16.0241 12.3893 16 12.331 16 12.2702V9.29102" stroke="#F6664E" stroke-linecap="round"/>
                            <path d="M33.055 17.156C32.613 17.156 32.223 17.0997 31.885 16.987C31.547 16.8743 31.2523 16.7313 31.001 16.558C30.7497 16.376 30.533 16.1853 30.351 15.986L30.832 15.362C31.0833 15.622 31.378 15.856 31.716 16.064C32.0627 16.2633 32.4917 16.363 33.003 16.363C33.523 16.363 33.9477 16.22 34.277 15.934C34.615 15.6393 34.784 15.2493 34.784 14.764C34.784 14.426 34.693 14.127 34.511 13.867C34.3377 13.607 34.0517 13.4077 33.653 13.269C33.263 13.1217 32.7343 13.048 32.067 13.048V12.307C32.665 12.307 33.1373 12.2377 33.484 12.099C33.8393 11.9517 34.095 11.7567 34.251 11.514C34.407 11.2713 34.485 10.9983 34.485 10.695C34.485 10.279 34.3507 9.94967 34.082 9.707C33.8133 9.45567 33.4493 9.33 32.99 9.33C32.6347 9.33 32.3053 9.41233 32.002 9.577C31.6987 9.733 31.4257 9.93667 31.183 10.188L30.663 9.577C30.9837 9.28233 31.3347 9.03967 31.716 8.849C32.0973 8.64967 32.5307 8.55 33.016 8.55C33.484 8.55 33.9 8.63233 34.264 8.797C34.628 8.96167 34.914 9.2 35.122 9.512C35.3387 9.81533 35.447 10.188 35.447 10.63C35.447 11.1413 35.304 11.5617 35.018 11.891C34.7407 12.2117 34.3723 12.4543 33.913 12.619V12.671C34.251 12.749 34.5587 12.8833 34.836 13.074C35.1133 13.256 35.3343 13.4943 35.499 13.789C35.6637 14.075 35.746 14.4087 35.746 14.79C35.746 15.284 35.6247 15.7087 35.382 16.064C35.1393 16.4107 34.8143 16.6793 34.407 16.87C33.9997 17.0607 33.549 17.156 33.055 17.156ZM39.5964 17.156C38.7818 17.156 38.1404 16.7833 37.6724 16.038C37.2131 15.284 36.9834 14.2137 36.9834 12.827C36.9834 11.4317 37.2131 10.37 37.6724 9.642C38.1404 8.914 38.7818 8.55 39.5964 8.55C40.4198 8.55 41.0611 8.91833 41.5204 9.655C41.9798 10.383 42.2094 11.4403 42.2094 12.827C42.2094 14.2137 41.9798 15.284 41.5204 16.038C41.0611 16.7833 40.4198 17.156 39.5964 17.156ZM39.5964 16.389C39.9344 16.389 40.2291 16.2633 40.4804 16.012C40.7404 15.7607 40.9398 15.3707 41.0784 14.842C41.2171 14.3133 41.2864 13.6417 41.2864 12.827C41.2864 12.0037 41.2171 11.3363 41.0784 10.825C40.9398 10.305 40.7404 9.92367 40.4804 9.681C40.2291 9.43833 39.9344 9.317 39.5964 9.317C39.2584 9.317 38.9638 9.43833 38.7124 9.681C38.4611 9.92367 38.2618 10.305 38.1144 10.825C37.9758 11.3363 37.9064 12.0037 37.9064 12.827C37.9064 13.6417 37.9758 14.3133 38.1144 14.842C38.2618 15.3707 38.4611 15.7607 38.7124 16.012C38.9638 16.2633 39.2584 16.389 39.5964 16.389ZM46.5044 17V10.695H47.2844L47.3624 11.631H47.4014C47.6787 11.3277 47.9821 11.072 48.3114 10.864C48.6494 10.6473 49.0004 10.539 49.3644 10.539C49.8584 10.539 50.2397 10.6517 50.5084 10.877C50.7857 11.0937 50.9851 11.3883 51.1064 11.761C51.4444 11.397 51.7824 11.1023 52.1204 10.877C52.4671 10.6517 52.8267 10.539 53.1994 10.539C53.8494 10.539 54.3304 10.747 54.6424 11.163C54.9544 11.579 55.1104 12.19 55.1104 12.996V17H54.1614V13.113C54.1614 12.5063 54.0617 12.0643 53.8624 11.787C53.6631 11.5097 53.3511 11.371 52.9264 11.371C52.6751 11.371 52.4107 11.4577 52.1334 11.631C51.8647 11.7957 51.5787 12.047 51.2754 12.385V17H50.3264V13.113C50.3264 12.5063 50.2267 12.0643 50.0274 11.787C49.8367 11.5097 49.5291 11.371 49.1044 11.371C48.6017 11.371 48.0471 11.709 47.4404 12.385V17H46.5044ZM57.232 17V10.695H58.168V17H57.232ZM57.713 9.343C57.531 9.343 57.375 9.28233 57.245 9.161C57.1236 9.03967 57.063 8.87933 57.063 8.68C57.063 8.48933 57.1236 8.33767 57.245 8.225C57.375 8.10367 57.531 8.043 57.713 8.043C57.9036 8.043 58.0596 8.10367 58.181 8.225C58.3023 8.33767 58.363 8.48933 58.363 8.68C58.363 8.87933 58.3023 9.03967 58.181 9.161C58.0596 9.28233 57.9036 9.343 57.713 9.343ZM60.3804 17V10.695H61.1604L61.2384 11.631H61.2774C61.5807 11.319 61.9014 11.059 62.2394 10.851C62.5861 10.643 62.9717 10.539 63.3964 10.539C64.0637 10.539 64.5491 10.747 64.8524 11.163C65.1644 11.579 65.3204 12.19 65.3204 12.996V17H64.3714V13.113C64.3714 12.5063 64.2717 12.0643 64.0724 11.787C63.8817 11.5097 63.5654 11.371 63.1234 11.371C62.7941 11.371 62.4951 11.4577 62.2264 11.631C61.9577 11.7957 61.6544 12.047 61.3164 12.385V17H60.3804ZM69.259 17.156C68.609 17.156 68.128 16.948 67.816 16.532C67.504 16.116 67.348 15.505 67.348 14.699V10.695H68.284V14.582C68.284 15.1887 68.3837 15.635 68.583 15.921C68.7823 16.1983 69.103 16.337 69.545 16.337C69.8743 16.337 70.1733 16.2503 70.442 16.077C70.7107 15.895 71.001 15.609 71.313 15.219V10.695H72.262V17H71.469L71.391 15.999H71.352C71.0573 16.3457 70.7453 16.6273 70.416 16.844C70.0867 17.052 69.701 17.156 69.259 17.156ZM76.3705 17.156C75.7205 17.156 75.2655 16.9653 75.0055 16.584C74.7542 16.2027 74.6285 15.7087 74.6285 15.102V11.475H73.6795V10.76L74.6675 10.695L74.7845 8.914H75.5775V10.695H77.3065V11.475H75.5775V15.128C75.5775 15.518 75.6468 15.8257 75.7855 16.051C75.9328 16.2677 76.1972 16.376 76.5785 16.376C76.6912 16.376 76.8125 16.3587 76.9425 16.324C77.0812 16.2893 77.2025 16.2503 77.3065 16.207L77.5015 16.922C77.3282 16.9827 77.1418 17.0347 76.9425 17.078C76.7432 17.13 76.5525 17.156 76.3705 17.156ZM81.2592 17.156C80.7132 17.156 80.2105 17.026 79.7512 16.766C79.3005 16.4973 78.9409 16.1203 78.6722 15.635C78.4035 15.141 78.2692 14.5473 78.2692 13.854C78.2692 13.1693 78.4035 12.58 78.6722 12.086C78.9409 11.592 79.2875 11.2107 79.7122 10.942C80.1455 10.6733 80.6049 10.539 81.0902 10.539C81.6102 10.539 82.0565 10.6603 82.4292 10.903C82.8019 11.1457 83.0835 11.488 83.2742 11.93C83.4735 12.3633 83.5732 12.8833 83.5732 13.49C83.5732 13.594 83.5689 13.698 83.5602 13.802C83.5602 13.8973 83.5515 13.984 83.5342 14.062H79.0102L78.9972 13.373H82.7282C82.7282 12.697 82.5852 12.1857 82.2992 11.839C82.0132 11.4837 81.6145 11.306 81.1032 11.306C80.7912 11.306 80.4879 11.397 80.1932 11.579C79.8985 11.761 79.6559 12.0383 79.4652 12.411C79.2745 12.7837 79.1792 13.2647 79.1792 13.854C79.1792 14.4173 79.2789 14.8853 79.4782 15.258C79.6775 15.6307 79.9419 15.9123 80.2712 16.103C80.6092 16.2937 80.9775 16.389 81.3762 16.389C81.6969 16.389 81.9829 16.3413 82.2342 16.246C82.4942 16.1507 82.7412 16.0293 82.9752 15.882L83.3262 16.506C83.0575 16.6793 82.7542 16.831 82.4162 16.961C82.0869 17.091 81.7012 17.156 81.2592 17.156Z" fill="#F6664E"/>
                            </svg>
                                                      
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
                <svg width="53" height="52" viewBox="0 0 53 52" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g filter="url(#filter0_d_137_2433)">
                    <ellipse cx="26.5" cy="22" rx="22.5" ry="22" fill="white"/>
                    <rect x="11.8644" y="8.79395" width="29.6426" height="28.9898" fill="url(#pattern0_137_2433)"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_137_2433" x="0" y="0" width="53" height="52" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_137_2433"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_137_2433" result="shape"/>
                    </filter>
                    <pattern id="pattern0_137_2433" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_137_2433" transform="matrix(0.0108664 0 0 0.0111111 0.0110112 0)"/>
                    </pattern>
                    <image id="image0_137_2433" width="90" height="90" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE4klEQVR4nO2c32tcRRTHR6NRK+IvEBRE8MeDihZRQQRpRNRKg/rgPWeNgT4IxReRGrPnrEWuUlGoVkHxR0FEpWIerEqt/Qt8UaJSXEsrlOSes2mxtVbrz1TtlbmbSm21Zpu5d2Z35wNfyFNmvt+dOzt77swYE4lEIpFIJBKJRCKRSCQSmRdfL33wFEUaUuAnFOl9Ad6qwN8p8AEF+lWBdirSlwr8dob8sCR0latotda4WoDG7P9W4GbRlm0TabboA9JXtk9zfRuyfe26j7VVo2sEeJ0i7VPkvBMJ8jZFpqm70rM6bTcb4bMVuCFA2ztt14YvyK/avpvQUaDFArxZkA92bBSPCny/HW0zw+mi/2t31+jY6Yq8WpB+dNDuQQHe5PLpcsbU8vRUAX5OkH5fqFE90jiQZMi3/VfbUuOlitRy3q71AvRMMFOKJHypIH3h2qgeMcoUeE2epiceatf+rcjPunh6jv1B8+cZPnKJ15Cz2vh1AvxNmUb1cAG/J8nK04ovWaCJytpF3qtQv8FLyAJ8fTGPVmc2n3ukP7aqvl3enyV8rY/pYnfVZtWz7NObjfDFlYRsH1s7b/k2rd7Cpi12+io9aAVa69us+hbwmlJDtmvL4ledb6PoeVS3l36LywsaeLNvkxqIBHljeT+rS16zahepvbYvYVS3axf+DWpQopfKqMJ1XCDqA+1tJumgs6AVGjcHYCoPURk2bnIYtK3Z+jelAUqAU5dBf+DbkAYqAdrgLOjizUgApjREATedBV1Ur3wbwjAlwHscBk2zvg1puPotBo1dFrR9PAIYOXmopVOHI5onfRvScPWJs6AF6K0ADOUhSpDecBZ0K+Hlvg1pqEpo1FnQu0bHzhOgP72bwrBkM7HZGJcI0me+jWlwok+NaxSJ/RvjoCTQqDsPWpKV5wjwT77NaSASpJ9bd/O5zoMuwo7F//zvsIFfNmWR1epXxtdZXLzGmsL65aZMKt6KlYcpWm/KpoWrLrTzk3+z7Eu/7BxZdZGpAkF6KgDDuSetNlWx587xM9rHIrybzisV8Iz1bqqkhTzs3ThWrBotMz6wBZX+Gc30mvHFjoTOFOTMewhYrgRYj+fwklNa2LhFkP/o2ZDReqMhEwKC/JjvQLQ0EZtQyI05oTgc2WujGehD682ExNxhyh2+w1FXAp6yhTQTItNJ44qe2AwJ9IM94mxCRqB+exkHO7W6kXwgq9VvNd2AYON+74Hh8amV8AOmmxDgp7tvNNOTptuw39b2tgDv4eH8JEivmG5l7rz2O8GHDLQhT5IB081MrlhxsiB9FG7IvMn20fQCzSQdDPEHjR0A9goM00s0k3RQkN8NJ2TeGMxdHK7Jk2QgiH18QBP5kvQk08vkSTKgSK/7C5rW93zI/yhCAb1Y+XQBvO7wW2z6gryo+PEL1c3J9HxwlbgqUaSHytyp2t7wQ4/79hkEWmvc0778z/l8PCtII779BUUL6zcK0rfOQrYXBiaNJb59BVvPFqBpByO5FXw92TdZbfyCBW56n5y+79HzffvoCqbszZDIb3Y+XdDEfK7YjPzbimQeWxkOrSz6evm2ULRGyxT5+2PMx/sU63f47mdPoPeOX2bvmztqJANvLX1DeL8xM5wual/6SruLWySB1sb5OBKJRCKRSCQSiUQikUjEeOEvPaDMg21PNw0AAAAASUVORK5CYII="/>
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