<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DishCover</title>
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('styles')
    </head>
    <body>
        <nav class="navbar">
            <div class="navbar-content">
                <!-- Logo Section -->
                <div class="navbar-logo">
                    <a href="/">Logo</a>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="navbar-menu">
                    <li><a href="#history">History</a></li>
                    <li><a href="#like">Like</a></li>
                    <li><a href="#upload">Upload</a></li>
                </ul>
                
                <!-- Right Section -->
                <div class="right-section">
                    <!-- Search Bar -->
                    <div class="search-bar">
                        <input type="text" placeholder="search" />
                        <span class="search-icon"></span>
                        <i class="fas fa-search"></i> <!-- Font Awesome Search Icon -->
                    </div>
                    
                    @auth
                        <div class="profile-icon">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
                                <img src="{{ asset('storage/' . Auth::user()->profilePicture->url) }}" alt="profile picture">
                            </button>
                        </div>
                    @else
                        <!-- Profile Icon -->
                        <div class="profile-icon">
                            <!-- Modal Trigger Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="fas fa-user"></i> <!-- Font Awesome User Icon -->
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>             
        {{-- HEADER ENDS HERE --}}

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Masuk untuk menyimpan resep dan artikel favoritmu!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Username Input -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="loginusername" class="form-control" placeholder="Username" required>
                            </div>
                            
                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="loginpassword" class="form-control" placeholder="Password" required>
                            </div>

                            <p class="text-center">Tidak punya akun? <a href="{{ route('register') }}">Daftar</a></p>
                            
                            <!-- Login Button -->
                            <button type="submit" class="btn btn-success w-100">Masuk</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>      

        @if (Auth::check())
            {{-- already logged in modal --}}
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-top-right">
                    <div class="modal-content">
                        <!-- Modal Body -->
                        <div class="modal-body text-center">
                            <!-- Avatar -->
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . Auth::user()->profilePicture->url) }}" alt="User Avatar" class="rounded-circle" style="width: 80px; height: 80px;">
                            </div>
            
                            <!-- Greeting -->
                            <h5 class="greeting">
                                <span class="text">Halo, </span> {{Auth::user()->username}}
                                <a href="#" class="ms-2 text-decoration-none">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </h5>
            
                            <!-- Logout Button -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">LOG OUT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
        @endif

        <div class="content">
            {{$slot}}
        </div>
    </body>
