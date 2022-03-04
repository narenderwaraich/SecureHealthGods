<div class="col-md-3 col-lg-2 sidebar-offcanvas sidebar-bg pl-0" id="sidebar" role="navigation">
    <ul class="nav flex-column sticky-top pl-0 pt-5 mt-3">
        <li class="nav-item"><a class="nav-link" href="/admin">Dashboard</a></li>
        <li class="nav-item">
            <a class="nav-link" href="#category" data-toggle="collapse" data-target="#category">Category ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="category" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/category/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/category/show">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#question" data-toggle="collapse" data-target="#question">Question ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="question" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/question/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/question/show">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#test-question" data-toggle="collapse" data-target="#test-question">Test Question ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="test-question" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/test/question/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/test/question/show">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#post" data-toggle="collapse" data-target="#post">Post ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="post" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#videos" data-toggle="collapse" data-target="#videos">Videos ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="videos" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/video/create">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/videos">Show</a></li>
            </ul>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="#page" data-toggle="collapse" data-target="#page">Page ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="page" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/page/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/page/show">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#banner" data-toggle="collapse" data-target="#banner">Banner ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="banner" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/banner/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/banner/show">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#plans" data-toggle="collapse" data-target="#plans">Plans ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="plans" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/admin/subscriber-plan/add">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/subscriber-plan/list">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#sub" data-toggle="collapse" data-target="#sub">Subscriber ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="sub" aria-expanded="false">
                <li class="nav-item"><a class="nav-link" href="/get-youtube-subscribers">Add</a></li>
                <li class="nav-item"><a class="nav-link" href="/list-youtube-subscribers">Show</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user" data-toggle="collapse" data-target="#user">User ▾</a>
            <ul class="list-unstyled flex-column pl-3 collapse" id="user" aria-expanded="false">
                <!-- <li class="nav-item"><a class="nav-link" href="/get-youtube-subscribers">Add</a></li> -->
                <li class="nav-item"><a class="nav-link" href="/admin/user/list">Show</a></li>
            </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="/approvel-list">Approvel <span class="badge badge-warning show-contact-number">@if(isset($contacts)) {{$contacts->count()}} @else 0 @endif</span></a></li>
        
        <li class="nav-item"><a class="nav-link" href="/admin/contact-us">Contact <span class="badge badge-warning show-contact-number">@if(isset($contacts)) {{$contacts->count()}} @else 0 @endif</span></a></li>
        <li class="nav-item"><a class="nav-link logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
</div>
<!--/col-->