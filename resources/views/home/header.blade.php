<div class="header_main">
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/homepage">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutus">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/servicespage">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blogpage">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="menu_main">
            <ul>
                <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('servicespage') }}">Services</a></li>
                <li><a href="{{ route('blogPage') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>

                @if (Route::has('login'))
                    @auth
                        <li>
                            <!-- Logout Button -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; cursor: pointer; color: inherit;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</div>
