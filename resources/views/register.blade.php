<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 60%;
        }
        .left-section {
            background-color: #4a6341;
            color: white;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .left-section h2 {
            font-size: 2em;
            margin-bottom: 0.5em;
        }
        .left-section span {
            color: #e76f8d;
            font-weight: bold;
        }
        .right-section {
            flex: 2;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-section h3 {
            font-size: 1.5em;
            margin-bottom: 1em;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .submit-button {
            background-color: #e76f8d;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #c95672;
        }
        .close-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h2>Gabung bersama <span>DishCover!</span></h2>
        </div>
        <div class="right-section">
            <button class="close-button">&times;</button>
            <h3>Create Account</h3>
            <form action="/register" method="POST" id="registration-form">
                @csrf
                <div class="form-group">
                    <input value="{{old('username')}}" type="text" name="username" placeholder="Username" required>
                    @error('username') 
                        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                    @enderror
                </div>
                <div class="form-group">
                    <input value="{{old('email')}}" type="email" name="email" placeholder="Email" required>
                    @error('email') 
                        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                    @error('password') 
                        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>   
                    @enderror
                </div>
                <button type="submit" class="submit-button">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>
