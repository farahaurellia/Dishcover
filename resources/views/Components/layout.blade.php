<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DishCover</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @stack('styles')
    </head>
    <body>
        <nav class="navbar">
            <div class="navbar-content">
                <!-- Logo Section -->
                <div class="navbar-logo">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">   
                    </a>
                </div>
                
                <!-- Navigation Menu -->
                <ul class="navbar-menu">
                    <li><a href="/history">History</a></li>
                    <li><a href="/like">Like</a></li>
                    @if (Auth::check())
                    <li><a href="/upload">Upload</a></li>
                    @else 
                    <li><a href="#loginModal" data-bs-toggle="modal" data-bs-target="#loginModal">Upload</a></li>
                    @endif
                </ul>
                
                <!-- Right Section -->
                <div class="right-section">
                    <!-- Search Bar -->
                    <form action="/search" method="GET" class="search-bar">
                        <input type="text" placeholder="search" name="query" />
                        <span class="search-icon"></span>
                        <svg width="26" height="25" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5 25C20.7132 25 25.75 19.9632 25.75 13.75C25.75 7.5368 20.7132 2.5 14.5 2.5C8.2868 2.5 3.25 7.5368 3.25 13.75C3.25 19.9632 8.2868 25 14.5 25Z" stroke="black" stroke-opacity="0.75" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.4124 25.862C25.0749 27.862 26.5874 28.062 27.7499 26.312C28.8124 24.712 28.1124 23.3995 26.1874 23.3995C24.7624 23.387 23.9624 24.4995 24.4124 25.862Z" stroke="black" stroke-opacity="0.75" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </form>
                    
                    @auth

                        <div class="profile-icon">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#userModal">
                                <img src="{{ asset(Auth::user()->profilepicture_url) }}" alt="profile picture" style="width: 50px; height: auto;">
                            </button>
                        </div>
                    @else
                        <!-- Profile Icon -->
                        <div class="profile-icon">
                            <!-- Modal Trigger Button -->
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <svg width="40" height="40" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3333 16.0417C18.3333 13.6105 19.2991 11.2789 21.0182 9.55985C22.7373 7.84077 25.0688 6.875 27.5 6.875C29.9312 6.875 32.2627 7.84077 33.9818 9.55985C35.7009 11.2789 36.6667 13.6105 36.6667 16.0417C36.6667 18.4728 35.7009 20.8044 33.9818 22.5235C32.2627 24.2426 29.9312 25.2083 27.5 25.2083C25.0688 25.2083 22.7373 24.2426 21.0182 22.5235C19.2991 20.8044 18.3333 18.4728 18.3333 16.0417ZM18.3333 29.7917C15.2944 29.7917 12.3799 30.9989 10.2311 33.1477C8.08221 35.2966 6.875 38.2111 6.875 41.25C6.875 43.0734 7.59933 44.822 8.88864 46.1114C10.178 47.4007 11.9266 48.125 13.75 48.125H41.25C43.0734 48.125 44.822 47.4007 46.1114 46.1114C47.4007 44.822 48.125 43.0734 48.125 41.25C48.125 38.2111 46.9178 35.2966 44.7689 33.1477C42.6201 30.9989 39.7056 29.7917 36.6667 29.7917H18.3333Z" fill="white"/>
                                </svg>                                    
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
                <div class="modal-content modal-content-login">
                    <div class="modal-header modal-header-login">
                        <h5 class="modal-title modal-title-login" id="loginModalLabel">Masuk untuk berbagi dan menyukai resep favoritmu!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal-body-login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Username Input -->
                            <div class="form-floating mb-3 form-login">
                                <input type="text" name="loginusername" class="form-control" placeholder="Username" required>
                                <label for="floatinginput" class="form" style="color: #75A47F">Username</label>
                            </div>
                            
                            <!-- Password Input -->
                            <div class=" form-floating mb-3 form-login">
                                <input type="password" name="loginpassword" class="form-control" placeholder="Password" required>
                                <label for="floatinginput" class="form" style="color: #75A47F">Password</label>
                            </div>

                            @if ($errors->has('loginerror'))
                                <p class="m-0 small alert alert-danger shadow-sm">{{ $errors->first('loginerror') }}</p>
                            @endif

                            <p class="text" style="font-weight: bold; margin-top: 10px">
                                Tidak punya akun? 
                                <a href="{{ route('register') }}" style="color: #E6A4B4">Daftar</a>
                            </p>
                            
                            <!-- Login Button -->
                            <div class="btn-login-container">
                                <button type="submit" class="btn btn-login">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            @if(session('showLoginModal'))
                                var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                                loginModal.show();
                            @endif
                        });
                    </script>
                </div>
            </div>
        </div>      

        @if (Auth::check())
            {{-- already logged in modal --}}
            <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-custom">
                  <div class="modal-content" style="height: 100%; width: 100%">
                    <!-- Modal Body -->
                    <div class="modal-body modal-body-user text-center">
                      <!-- Avatar -->
                      <div class="mb-3">
                        <img src="{{ Auth::user()->profilepicture_url }}" alt="User Avatar" class="rounded-circle" style="width: 80px; height: 80px;">
                      </div>
              
                      <!-- Greeting -->
                      <h5 class="greeting">
                        <span class="text">Halo, </span> 
                        {{ Auth::user()->username }}!
                      </h5>

                      <!-- My Recipe -->
                      <div class="btn-resep">
                      <a href="/myrecipe" style="text-decoration: none; color: black">
                        <img src="{{ asset('icons/myrecipe.svg') }}" alt="recipe">   
                        Resep saya                     
                      </a>
                      </div>
              
                      <!-- Logout Button -->
                      <div class="btn-logout">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn">LOG OUT</button>
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                             
        @endif

        <div class="content" style="padding-top : 90px">
            {{$slot}}
        </div>

    </body>
