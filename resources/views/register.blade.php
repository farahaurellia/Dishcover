<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-regist">
        <div class="left-section">
            <div class="container-title">
                <p>Gabung bersama </p>
                <p style="color: #75A47F">Dish<span>Cover!</span></p>
            </div>
        </div>
            <div class="right-section">
                <a href="/" class="close-button">
                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.152 14.1521C14.5426 13.7616 15.0725 13.5422 15.6249 13.5422C16.1773 13.5422 16.7071 13.7616 17.0978 14.1521L24.9999 22.0542L32.902 14.1521C33.0941 13.9532 33.324 13.7944 33.5782 13.6853C33.8324 13.5761 34.1058 13.5186 34.3824 13.5162C34.659 13.5138 34.9333 13.5665 35.1894 13.6713C35.4454 13.776 35.678 13.9307 35.8736 14.1263C36.0692 14.3219 36.2239 14.5545 36.3287 14.8106C36.4334 15.0666 36.4861 15.3409 36.4837 15.6175C36.4813 15.8942 36.4239 16.1675 36.3147 16.4217C36.2055 16.6759 36.0468 16.9058 35.8478 17.098L27.9457 25L35.8478 32.9021C36.2273 33.295 36.4373 33.8213 36.4325 34.3675C36.4278 34.9138 36.2087 35.4363 35.8224 35.8226C35.4362 36.2088 34.9136 36.4279 34.3674 36.4327C33.8211 36.4374 33.2949 36.2274 32.902 35.848L24.9999 27.9459L17.0978 35.848C16.7049 36.2274 16.1786 36.4374 15.6324 36.4327C15.0861 36.4279 14.5636 36.2088 14.1773 35.8226C13.7911 35.4363 13.572 34.9138 13.5672 34.3675C13.5625 33.8213 13.7725 33.295 14.152 32.9021L22.054 25L14.152 17.098C13.7614 16.7073 13.542 16.1775 13.542 15.625C13.542 15.0726 13.7614 14.5428 14.152 14.1521Z" fill="black"/>
                    </svg>                        
                </a>
                <form action="/register" method="POST" id="registration-form">
                    <h3>Create Account</h3>
                    @csrf
                    <div class="form-floating mb-3 form-register">
                        <input class="form-control" value="{{old('username')}}" type="text" name="username" placeholder="Username" required>
                        @error('username') 
                            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                        @enderror
                        <label for="floatinginput" class="form" style="color: #75A47F">Username</label>
                    </div>
                    <div class="form-floating mb-3 form-register">
                        <input class="form-control" value="{{old('email')}}" type="email" name="email" placeholder="Email" required>
                        @error('email') 
                            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                        @enderror
                        <label for="floatinginput" class="form" style="color: #75A47F">Email</label>
                    </div>
                    <div class="form-floating mb-3 form-register">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        @error('password') 
                            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                        @enderror
                        <label for="floatinginput" class="form" style="color: #75A47F">Password</label>
                    </div>
                    <div class="submit-btn">
                        <button type="submit" class="submit-button">Daftar</button>
                    </div>
                </form>
            </div>
    </div>
</body>
</html>
