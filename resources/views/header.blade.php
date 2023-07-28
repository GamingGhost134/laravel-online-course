<!-- header -->
<header class="fixed-top header">
    <!-- navbar -->
    <div class="navigation w-100">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <a class="navbar-brand" href="index.html"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav ml-auto text-center">
                        <li class="nav-item {{ request()->is('/') ? 'active' : ''}} @@home">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item {{ request()->is('about') ? 'active' : ''}} @@about">
                            <a class="nav-link" href="{{ url('about') }}">About</a>
                        </li>
                        <li class="nav-item {{ request()->is('course') ? 'active' : ''}} @@courses">
                            <a class="nav-link" href="{{ url('about') }}">COURSES</a>
                        </li>
                        <li class="nav-item {{ request()->is('events') ? 'active' : ''}} @@events">
                            <a class="nav-link" href="{{ url('events') }}">EVENTS</a>
                        </li>
                        <li class="nav-item {{ request()->is('contact') ? 'active' : ''}} @@contact">
                            <a class="nav-link" href="{{ url('contact') }}">CONTACT</a>
                        </li>
                        @auth
                            <!-- Show profile icon when the user is authenticated -->
                            <li class="nav-item dropdown view">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                                </ul>
                              </li>

                        @else
                            <!-- Show login and register links when the user is not authenticated -->
                            <li class="nav-item {{ request()->is('login') ? 'active' : ''}} @@contact">
                                <a class="nav-link" href="{{ url('/login') }}">Login</a>
                            </li>
                            <li class="nav-item {{ request()->is('register') ? 'active' : ''}} @@contact">
                                <a class="nav-link" href="{{ url('/register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- /header -->
