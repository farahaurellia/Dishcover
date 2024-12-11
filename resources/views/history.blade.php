<x-layout>
@push('styles')
        <link rel="stylesheet" href="{{ asset('css/history.css') }}">
@endpush 

@if (Auth::check())
    <div class="container">
        <div class="content">
            <div class="title">
                <div class="history-icon">
                <svg width="33" height="33" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.5 0C14.0388 0 10.6554 1.02636 7.77753 2.94928C4.89967 4.87221 2.65665 7.60533 1.33212 10.803C0.0075824 14.0007 -0.338976 17.5194 0.336265 20.9141C1.01151 24.3087 2.67822 27.4269 5.12564 29.8744C7.57306 32.3218 10.6913 33.9885 14.0859 34.6637C17.4806 35.339 20.9993 34.9924 24.197 33.6679C27.3947 32.3433 30.1278 30.1003 32.0507 27.2225C33.9736 24.3446 35 20.9612 35 17.5C35 15.2019 34.5473 12.9262 33.6679 10.803C32.7884 8.67984 31.4994 6.75065 29.8744 5.12563C28.2493 3.50061 26.3202 2.21156 24.197 1.33211C22.0738 0.452651 19.7981 0 17.5 0ZM24.5 19.25H17.5C17.0359 19.25 16.5908 19.0656 16.2626 18.7374C15.9344 18.4092 15.75 17.9641 15.75 17.5V10.5C15.75 10.0359 15.9344 9.59075 16.2626 9.26256C16.5908 8.93437 17.0359 8.75 17.5 8.75C17.9641 8.75 18.4093 8.93437 18.7374 9.26256C19.0656 9.59075 19.25 10.0359 19.25 10.5V15.75H24.5C24.9641 15.75 25.4093 15.9344 25.7374 16.2626C26.0656 16.5907 26.25 17.0359 26.25 17.5C26.25 17.9641 26.0656 18.4092 25.7374 18.7374C25.4093 19.0656 24.9641 19.25 24.5 19.25Z" fill="#E35778"/>
                </svg>
                </div>
                <h1 class="title-text">History</h1>
            </div>
            <div class="message">
            <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                    Halaman masih kosong
                </h2>
            </div>
        </div>
    </div>

@else 
<div class="containerhistory">
        <div class="content">
            <div class="titlehistory">
                <div class="history-icon">
                <svg width="33" height="33" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.5 0C14.0388 0 10.6554 1.02636 7.77753 2.94928C4.89967 4.87221 2.65665 7.60533 1.33212 10.803C0.0075824 14.0007 -0.338976 17.5194 0.336265 20.9141C1.01151 24.3087 2.67822 27.4269 5.12564 29.8744C7.57306 32.3218 10.6913 33.9885 14.0859 34.6637C17.4806 35.339 20.9993 34.9924 24.197 33.6679C27.3947 32.3433 30.1278 30.1003 32.0507 27.2225C33.9736 24.3446 35 20.9612 35 17.5C35 15.2019 34.5473 12.9262 33.6679 10.803C32.7884 8.67984 31.4994 6.75065 29.8744 5.12563C28.2493 3.50061 26.3202 2.21156 24.197 1.33211C22.0738 0.452651 19.7981 0 17.5 0ZM24.5 19.25H17.5C17.0359 19.25 16.5908 19.0656 16.2626 18.7374C15.9344 18.4092 15.75 17.9641 15.75 17.5V10.5C15.75 10.0359 15.9344 9.59075 16.2626 9.26256C16.5908 8.93437 17.0359 8.75 17.5 8.75C17.9641 8.75 18.4093 8.93437 18.7374 9.26256C19.0656 9.59075 19.25 10.0359 19.25 10.5V15.75H24.5C24.9641 15.75 25.4093 15.9344 25.7374 16.2626C26.0656 16.5907 26.25 17.0359 26.25 17.5C26.25 17.9641 26.0656 18.4092 25.7374 18.7374C25.4093 19.0656 24.9641 19.25 24.5 19.25Z" fill="#E35778"/>
                </svg>
                </div>
                <h1 class="title-text">History</h1>
            </div>
            <div class="messagehistory">
                <h2 class="message-text" style="font-size: 16px; font-weight: bold; color: #333;">
                    Anda harus masuk terlebih dahulu
                </h2>
                <p class="message-subtext" style="font-size: 16px; color: #333;">
                    Masuk untuk melihat riwayat menu yang dilihat.
                </p>
            </div>
            <button class="btnhistory" data-bs-toggle="modal" data-bs-target="#loginModal">
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