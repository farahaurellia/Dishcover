<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4" style="width: 100%; max-width: 400px; border-radius: 10px;">
        <div class="text-center mb-3">
            <h5>Masuk untuk menyimpan resep dan artikel favoritmu!</h5>
        </div>
        <form method="POST" action="/login">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="loginusername" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="loginpassword"  class="form-control" required>
            </div>
            <div class="mb-3 text-end">
                <a href="/register" class="text-decoration-none text-muted">Tidak punya akun? <span style="color: #F6664E;" class="text-y">Daftar </span></a>
            </div>
            <button type="submit" class="btn btn-success w-100">Masuk</button>
        </form>
    </div>
</div>
</html>