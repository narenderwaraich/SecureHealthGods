<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary header-bg mb-3">
    <div class="flex-row d-flex">
        <button type="button" class="navbar-toggler mr-2 " data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/admin" title="Admin">Admin</a>
    </div>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="navbar-nav ml-auto">
            @guest

            @else
             <li class="nav-item">
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">
                </a>
            </div>
        </li> -->
        @endguest
    </ul>
</div>
</nav>

