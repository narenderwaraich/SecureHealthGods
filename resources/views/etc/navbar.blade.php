<nav class="navbar navbar-expand-md navbar-light header-bg shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            SecureHealthGods
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/youtube-videos">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact-us">Contact Us</a>
                </li> 
            </ul>

            <!-- Right Side Of Navbar -->

            <!-- Header Icon -->
            <div class="header-icons">
                <div class="header-wrapicon1 dis-block user-icon">
                    @if(Auth::check())
                    @if(Auth::user()->avatar)
                    <img src="{{asset('/public/images/user/'.Auth::user()->avatar)}}" class="navbar-user-profile-img nav-user-icon" alt="{{Auth::user()->name}}"> 
                    @else
                    <i class="fa fa-user-circle header-icon1 nav-user-icon" aria-hidden="true"></i>
                    @endif
                    @else
                    <i class="fa fa-user-circle header-icon1 nav-user-icon" aria-hidden="true"></i>
                    @endif
                    <ul class="user_menu">
                        @guest
                        <li><a href="/login">Login</a></li>
                        @if (Route::has('register'))
                        <!-- <li><a href="/register">Register</a></li> -->
                        @endif
                        @else
                        <li><a href="/user-profile">Profile</a></li>
                        <li class="log-out"><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    @endguest
                </ul>
            </div>
        </div>

    </div>
</div>
</nav>