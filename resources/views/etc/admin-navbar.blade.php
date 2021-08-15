<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="./"><img src="/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="/images/logo2.png" alt="Logo"></a> -->
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admin"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">URL</h3>
                    @if(Auth::user()->role == "admin")
                    <li class="active">
                        <a href="/" target="_blank"><i class="menu-icon fa fa-dashboard"></i>Web Home</a>
                    </li>
                    @endif
                    @if(Auth::user()->role == "merchant")
                    <li class="active">
                        <a href="/" target="_blank"><i class="menu-icon fa fa-dashboard"></i>Web Home</a>
                    </li>
                    <li class="active">
                        <a href="/dashboard" target="_blank"><i class="menu-icon fa fa-dashboard"></i>Billing Dashboard</a>
                    </li>
                    @endif
                    <h3 class="menu-title">Food</h3>
                    @if(Auth::user()->role == "admin")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Food Type</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/admin/food-type/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/food-type">View</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == "merchant")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Category</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/admin/category/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/category">View</a></li>
                        </ul>
                    </li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Menu</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/admin/menu/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/menus">View</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Meal</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/admin/meal/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/meals">View</a></li>
                        </ul>
                    </li>
                    @endif
                    <h3 class="menu-title">Account</h3>
                    @if(Auth::user()->role == "admin")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Page</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/page/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/page/show">View</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Page Setup</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/page-setup/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/page-setup/show">View</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Location</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/admin/country/list">Country</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/state/list">State</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/city/list">City</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Account</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="/admin/users">User</a></li>
                            <li><i class="fa fa-table"></i><a href="/admin/merchants">Merchant</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->role == "merchant")
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gift"></i>Coupan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa fa-plus"></i><a href="/discount/create">Add</a></li>
                            <li><i class="fa fa-table"></i><a href="/discounts">View</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="/admin/online-orders"><i class="menu-icon fa fa-truck"></i>Orders</a>
                    </li>
                    <li class="">
                        <a href="/admin/payments"><i class="menu-icon fa fa-inr"></i>Payments</a>
                    </li>
                    @endif
                    @if(Auth::user()->role == "admin")
                    <li class="">
                        <a href="/admin/plan/payments"><i class="menu-icon fa fa-inr"></i>Payments</a>
                    </li>
                    @endif
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-gear"></i><a href="/admin/merchant/settings">Merchant Setting</a></li>
                            <li><i class="fa fa-gear"></i><a href="/admin/listing/settings">Listing Setting</a></li>
                            @if(Auth::user()->role == "admin")
                            <li><i class="fa fa-database"></i><a href="/mysql">MySql Query</a></li>
                            <li><i class="fa fa-history"></i><a href="/logs">Logs</a></li>
                            @endif
                        </ul>
                    </li> 
                    <li>
                        <a href="/admin/change-password"> <i class="menu-icon fa fa-key"></i>Change Password</a>
                    </li>
                    <li>
                        <a style="color: red !important; font-weight: 700 !important; font-size: 20px;" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"> <i class="menu-icon fa fa-arrow-left" style="color: red !important;"></i>{{ __('Logout') }}</a>
                          </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
        <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel" style="width: 83%;">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks" style="margin-top: 13px;"></i></a>
                    <div class="header-left">
                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">@if(isset($getOrders)) {{$getOrders->count()}} @else 0 @endif</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have @if(isset($getOrders)) {{$getOrders->count()}} @else 0 @endif Order</p>
                            @if(isset($getOrders))
                                        @foreach ($getOrders as $order)
                            <router-link to="/orders" class="dropdown-item media bg-flat-color-4">
                            <!-- <a class="dropdown-item media bg-flat-color-4" href="#"> -->
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <p>{{ $order->productName}}</p>
                            <!-- </a> -->
                        </router-link>
                            @endforeach
                            @else
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <p>no found!</p>
                                </a>
                            @endif
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">0</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 0 Mails</p>
                            <!-- <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a> -->
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/icon/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="/admin/merchant/settings"><i class="fa fa- user"></i>My Profile</a>
                                <a class="nav-link" href="/admin/settings"><i class="fa fa -cog"></i>Settings</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->