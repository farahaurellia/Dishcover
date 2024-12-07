<x-layout>
@push('styles')
        <link rel="stylesheet" href="{{ asset('css/like.css') }}">
@endpush 

@if (Auth::check())
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