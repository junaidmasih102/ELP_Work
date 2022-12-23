<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top pole-movement-top-bar" role="navigation">
    <div class="main-logo-container">
        <a href="{{ url('/') }}"><img style=" width: 92%; padding: 20px; " src="{{ asset('new/images/logo.png') }}"
                alt="logo"></a>
    </div>

    <div class="explore-dd">
        <a href="#">
            <span>explore</span>
            <b class="caret"></b>
        </a>
    </div>

    <div class="search-bar-cont">
        <form>
            <input type="text" class="search-bar" placeholder="Search Here...">
        </form>
    </div>
    <div class="updates-bell-main">
        <a href="#">
            <img src="{{ asset('images/bell-icon.png') }}">
        </a>
    </div>
    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle admin-settings" data-toggle="dropdown" href="#">
                <img class="admin-img" src="{{ asset('images/admin-img.png') }}" alt=""> <span>
                    {{ Session('user')['name'] }} </span> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user admin-settings-dropdown">
                <li>
                    <a href="{{ url('/course/view_courses') }}"><i class="fa fa-user fa-fw"></i> My Subscribed
                        Courses</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li>
                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- <h1 class="page-header">Page Title</h1> -->
