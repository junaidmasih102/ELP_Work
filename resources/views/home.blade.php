@extends('student/layout/master_templete_new')

@section('title')
    <title> Home </title>
@endsection

@section('page-content')
    {{-- Topbar --}}
    @guest
        <div class="home-page">
            <!-- Header Start -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="header-top-bar">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{ asset('new/images/logo.png') }}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="header-content-image">
                                        <img src="{{ asset('new/images/header-img.png') }}">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="header-content">
                                        <p>Happy black student raising arm to answer question.</p>
                                        <a href="#">Read more <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="header-content-image">
                                        <img src="{{ asset('new/images/header-img-02.png') }}">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="header-content">
                                        <p>Happy black student raising arm to answer question.</p>
                                        <a href="#">Read more <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-more-news-btn">
                                    <a href="#">MORE <br> NEWS <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
            <!-- Navigation Start -->
            <div class="navigarion">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div class="navigarion-left-col">
                                <ul>
                                    <li><a href="#">Study</a></li>
                                    <li><a href="#">Research & Innovation</a></li>
                                    <li><a href="#">Be Inspired</a></li>
                                    <li><a href="#">About</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="navigarion-right-col">
                                <ul>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">What’s On</a></li>
                                    <li><a href="#">Give</a></li>
                                    <li><a href="#">A-z</a></li>
                                    <li><a href="#">Information for</a></li>
                                    @guest
                                        <li><a href="{{ url('/login') }}"> Login </li>
                                        <li><a href="{{ url('/register') }}"> Join For Free </li>
                                    @else
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <img class="admin-img" src="{{ asset('images/admin-img.png') }}" alt="">
                                                <span>
                                                    {{ Session('user')['name'] }} </span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('/course/view_courses') }}">My Subscribed
                                                    Courses</a>
                                                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                                            </div>
                                        </div>
                                    </ul>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation End -->
        </div>
    @else
        <div class="container">
            <nav class="navigarion navbar navbar-expand-sm sign-in-nav">
                <a class="sign-in-login" href="{{ url('/') }}"><img src="{{ asset('new/images/logo.png') }}"
                        alt="logo"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    </form>
                </div>
                <!-- <i class="fa-solid fa-bell"></i> -->
                <img src="http://127.0.0.1:8000/images/bell-icon.png">
                <div class="navigarion-right-col">
                    @guest
                        {{-- <li><a href="{{ url('/login') }}"> Login </li> --}}
                    @else
                        <div class="dropdown mr-5">
                            <span class="border-right" style="padding-top:20px; padding-bottom: 20px; padding-right: 10px;"></span>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <img class="admin-img" src="{{ asset('images/admin-img.png') }}" alt="">
                                <span>
                                    {{ Session('user')['name'] }} </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/course/view_courses') }}">My Subscribed
                                    Courses</a>
                                <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                            </div>
                        </div>
                        </ul>
                    @endguest
                </div>
            </nav>
        </div>
        <div class="navigarion">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="navigarion-left-col">
                            <ul>
                                <li><a href="#">Study</a></li>
                                <li><a href="#">Research & Innovation</a></li>
                                <li><a href="#">Be Inspired</a></li>
                                <li><a href="#">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="navigarion-right-col navigarion-right-col-sign-in">
                            <ul>
                                <li><a href="#">News</a></li>
                                <li><a href="#">What’s On</a></li>
                                <li><a href="#">Give</a></li>
                                <li><a href="#">A-z</a></li>
                                <li><a href="#">Information for</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    {{-- Topbar --}}

    @if (Auth::guest())
        <!-- Banner Start -->
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="banner-content">
                            <h1>From LEADERS<br> FOR LEADERS <span>AROUND THE WORLD</span></h1>
                            <p>Take a look inside our teaching <span>facilities and student accommodation</span> from
                                wherever you are in the world.</p>
                            <div class="hone-pg-carousel">
                                <div class="owl-carousel">
                                    <div class="slide">
                                        <img src="{{ asset('new/images/leader.png') }}" alt="LEADERS">
                                        <div class="leader-info">
                                            <h3>Machelien Smith</h3>
                                            <h4>NewYork</h4>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <img src="{{ asset('new/images/leader-02.png') }}" alt="LEADERS">
                                        <div class="leader-info">
                                            <h3>Johson Micehal</h3>
                                            <h4>Jonatham</h4>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <img src="{{ asset('new/images/leader-03.png') }}" alt="LEADERS">
                                        <div class="leader-info">
                                            <h3>Sheliena Armond</h3>
                                            <h4>Washington</h4>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <img src="{{ asset('new/images/leader.png') }}" alt="LEADERS">
                                        <div class="leader-info">
                                            <h3>Machelien Smith</h3>
                                            <h4>NewYork</h4>
                                        </div>
                                    </div>
                                    <div class="slide">
                                        <img src="{{ asset('new/images/leader-03.png') }}" alt="LEADERS">
                                        <div class="leader-info">
                                            <h3>Sheliena Armond</h3>
                                            <h4>Washington</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->
    @else
        <div class="studying-at-medvisty" style="overflow: hidden;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="home-page-tabs">
                            <div class="studying-at-medvisty-tab">
                                <button class="tablinks active" onclick="opentabs(event, 'courses')">
                                    All Courses</button>
                                <button class="tablinks" onclick="opentabs(event, 'progress')">Enrolled
                                </button>
                                <button class="tablinks" onclick="opentabs(event, 'complete')">Courses Completed</button>
                            </div>
                            <div id="courses" class="tab_data" style="display: block;">
                                <div class="sharing-experiences-section">
                                    <div class="container">
                                        <div class="row">
                                            @if ($all_courses)
                                                @foreach ($all_courses as $course)
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <div class="sharing-experiences-content">
                                                            <img src="{{ asset("storage/$course->image") }}"
                                                                alt="sharing experiences">
                                                            <div class="sharing-experiences-content-btn">
                                                                <span><a class="sharing-experiences-content-btn-01"
                                                                        href="#">Now</a></span>
                                                                @if ($course->students_courses != null && $course->students_courses->status === 0)
                                                                    <span><a class="sharing-experiences-content-btn-02"
                                                                            style="background-color:grey;border:none">Applied</a></span>
                                                                @elseif($course->students_courses != null && $course->students_courses->status === 1)
                                                                    <span><a class="sharing-experiences-content-btn-02"
                                                                            href="{{ url("dashboard/$course->id") }}">View</a></span>
                                                                @else
                                                                    <span><a class="sharing-experiences-content-btn-02"
                                                                            href="{{ url("/apply_for_cource/$course->id") }}">Apply</a></span>
                                                                @endif
                                                            </div>
                                                            <h3>{{ $course->name }}</h3>
                                                            <h3>{{ Str::limit($course->summary, 70, $end = '.......') }}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="progress" class="tab_data">
                            <div class="sharing-experiences-section">
                                <div class="container">
                                    <div class="row">
                                        @if ($progress_courses)
                                            @foreach ($progress_courses as $course)
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <div class="sharing-experiences-content">
                                                        <img src="{{ asset("storage/$course->image") }}"
                                                            alt="sharing experiences">
                                                        <div class="sharing-experiences-content-btn">
                                                            <span><a class="sharing-experiences-content-btn-01"
                                                                    href="#">Now</a></span>
                                                            <span><a class="sharing-experiences-content-btn-02"
                                                                    href="{{ url("course/$course->id") }}">View</a></span>
                                                        </div>
                                                        <h3>{{ $course->name }}</h3>
                                                        <h3>{{ Str::limit($course->summary, 70, $end = '.......') }}</h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="complete" class="tab_data">
                            <div class="sharing-experiences-section">
                                <div class="container">
                                    <div class="row">
                                        @if ($progress_courses)
                                            @foreach ($progress_courses as $course)
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <div class="sharing-experiences-content">
                                                        <img src="{{ asset("storage/$course->image") }}"
                                                            alt="sharing experiences">
                                                        <div class="sharing-experiences-content-btn">
                                                            <span><a class="sharing-experiences-content-btn-01"
                                                                    href="#">Now</a></span>
                                                            <span><a class="sharing-experiences-content-btn-02"
                                                                    href="{{ url("course/$course->id") }}">View</a></span>
                                                        </div>
                                                        <h3>{{ $course->name }}</h3>
                                                        <h3>{{ Str::limit($course->summary, 70, $end = '.......') }}</h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Sharing Experiences Start -->
    <div class="sharing-experiences-section">
        <div class="container">
            <div class="row">
                @if ($courses_latest)
                    @foreach ($courses_latest as $course)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="sharing-experiences-content">
                                <img src="{{ asset("storage/$course->image") }}" alt="sharing experiences">
                                <div class="sharing-experiences-content-btn">
                                    <span><a class="sharing-experiences-content-btn-01" href="#">Now</a></span>
                                    @if ($course->students_courses != null && $course->students_courses->status === 0)
                                        <span><a class="sharing-experiences-content-btn-02"
                                                style="background-color:grey;border:none">Applied</a></span>
                                    @elseif($course->students_courses != null && $course->students_courses->status === 1)
                                        <span><a class="sharing-experiences-content-btn-02"
                                                href="{{ url("course/$course->id") }}">View</a></span>
                                    @else
                                        <span><a class="sharing-experiences-content-btn-02"
                                                href="{{ url("/apply_for_cource/$course->id") }}">Apply</a></span>
                                    @endif
                                </div>
                                <h3>{{ $course->name }}</h3>
                                <h3>{{ Str::limit($course->summary, 70, $end = '.......') }}</h3>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="home-pg-covid-update">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <img src="{{ asset('new/images/covid-update_08.png') }}" alt="Covid Update">
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <h2>Coronavirus (COVID-19)<br> updates</h2>
                            <p>Our latest information for students, staff and<br> applicants, including safety
                                information<br> for academic year 2021-22</p>
                        </div>
                    </div>

                    <div class="support-with-online-education-sec">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h2>Support<br>
                                MEDIVISTY<br>
                                with Online<br>
                                education</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <p>A Online to can provide vital<br>
                                bursaries, scholarships and a<br>
                                lifeline to a student in financial<br>
                                difficulty.</p>
                            <a href="#">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sharing Experiences End -->

    <!-- Events Section Start -->

    <div class="sharing-experiences-section events-sec">
        <div class="container">
            <div class="row">
                @if ($courses)
                    @foreach ($courses as $course)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="sharing-experiences-content">
                                <img src="{{ asset("storage/$course->image") }}" alt="sharing experiences">
                                <div class="sharing-experiences-content-btn">
                                    <span><a class="sharing-experiences-content-btn-01" href="#">Now</a></span>
                                    @if ($course->students_courses != null && $course->students_courses->status === 0)
                                        <span><a class="sharing-experiences-content-btn-02"
                                                style="background-color:grey;border:none">Applied</a></span>
                                    @elseif($course->students_courses != null && $course->students_courses->status === 1)
                                        <span><a class="sharing-experiences-content-btn-02"
                                                href="{{ url("course/$course->id") }}">View Course</a></span>
                                    @else
                                        <span><a class="sharing-experiences-content-btn-02"
                                                href="{{ url("/apply_for_cource/$course->id") }}">Apply</a></span>
                                    @endif
                                </div>
                                <h3>{{ $course->name }}</h3>
                                <h3>{{ Str::limit($course->summary, 70, $end = '.......') }}</h3>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="events-sec-list">
                        <ul>
                            <li>
                                <h6>22 February 2022, 03.00–04.00</h6>
                                <h4>Seminar Sky Cao (Stanford University):<br>
                                    A state space for the 3D Yang-Mills<br>
                                    measure.</h4>
                            </li>
                            <li>
                                <h6>22 February 2022, 03.00–04.00</h6>
                                <h4>Seminar Sky Cao (Stanford University):<br>
                                    A state space for the 3D Yang-Mills<br>
                                    measure.</h4>
                            </li>
                            <li>
                                <h6>22 February 2022, 03.00–04.00</h6>
                                <h4>Seminar Sky Cao (Stanford University):<br>
                                    A state space for the 3D Yang-Mills<br>
                                    measure.</h4>
                            </li>
                            <li>
                                <h6>22 February 2022, 03.00–04.00</h6>
                                <h4>Seminar Sky Cao (Stanford University):<br>
                                    A state space for the 3D Yang-Mills<br>
                                    measure.</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="your-network-section">
                        <h3>Alumni</h3>
                        <div class="your-network-section-content">
                            <img src="{{ asset('new/images/event_14.png') }}" alt="Events">
                            <h4>Your Network</h4>
                            <p>As an Imperial alumnus, you are a member of a lifelong community of over 190,000
                                across the globe. Access exclusive alumni benefits join a local group and keep in
                                touch</p>
                            <a href="#">Find Out More<i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events Section End -->

    <!-- Studying At Medvisty Start -->
    <div class="studying-at-medvisty">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="studying-at-medvisty-heading">
                        <h5>education platform</h5>
                        <h2>studying at medvisty</h2>
                        <p>Medvisty is the only university in the UK to focus exclusively on science, medicine,<br>
                            engineering and business.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="home-page-tabs">
                        <div class="studying-at-medvisty-tab">
                            <button class="tablinks active" onclick="openCity(event, 'home-pg-tab-01')">Our
                                Courses</button>
                            <button class="tablinks" onclick="openCity(event, 'home-pg-tab-02')">Campus
                                Life</button>
                            <button class="tablinks" onclick="openCity(event, 'home-pg-tab-03')">Life in
                                London</button>
                            <button class="tablinks" onclick="openCity(event, 'home-pg-tab-04')">Why Medvisty
                                ?</button>
                        </div>

                        <div id="home-pg-tab-01" class="tabcontent">
                            <div class="home-pg-tab-inner">
                                <h3>Our Courses</h3>
                                <p>An Imperial education is something
                                    special. Learn from world class experts and be part of a global community. With
                                    so many discoveries happening all around you, expect to be inspired as we open
                                    your mind to the latest thinking in your subject.</p>
                                <a href="#">Find the right course for you <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>

                        <div id="home-pg-tab-02" class="tabcontent">
                            <div class="home-pg-tab-inner">
                                <h3>Campus Life</h3>
                                <p>An Imperial education is something
                                    special. Learn from world class experts and be part of a global community. With
                                    so many discoveries happening all around you, expect to be inspired as we open
                                    your mind to the latest thinking in your subject.</p>
                                <a href="#">Find the right course for you <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>

                        <div id="home-pg-tab-03" class="tabcontent">
                            <div class="home-pg-tab-inner">
                                <h3>Life in London</h3>
                                <p>An Imperial education is something
                                    special. Learn from world class experts and be part of a global community. With
                                    so many discoveries happening all around you, expect to be inspired as we open
                                    your mind to the latest thinking in your subject.</p>
                                <a href="#">Find the right course for you <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>

                        <div id="home-pg-tab-04" class="tabcontent">
                            <div class="home-pg-tab-inner">
                                <h3>Why Medvisty ?</h3>
                                <p>An Imperial education is something
                                    special. Learn from world class experts and be part of a global community. With
                                    so many discoveries happening all around you, expect to be inspired as we open
                                    your mind to the latest thinking in your subject.</p>
                                <a href="#">Find the right course for you <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Studying At Medvisty End -->

    <!-- Education Platform Start -->
    <div class="education-platform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="education-platform-heading">
                        <h5>education platform</h5>
                        <h2>Research & innovation</h2>
                        <p>Medivisty people share ideas, expertise and technology to find answers to the big
                            scientific <br>questions and tackle global challenges</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="education-platform-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="{{ asset('new/images/education-platform.png') }}" alt="Education Platform">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Coronavirus (COVID-19)<br>updates</h3>
                                <p>Our latest information for students, staff<br> and applicants, including safety
                                    information<br> for academic year 2021-22</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="education-platform-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="{{ asset('new/images/education-platform-02.png') }}" alt="Education Platform">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Coronavirus (COVID-19)<br>updates</h3>
                                <p>Our latest information for students, staff<br> and applicants, including safety
                                    information<br> for academic year 2021-22</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="education-platform-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="{{ asset('new/images/education-platform-03.png') }}" alt="Education Platform">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Coronavirus (COVID-19)<br>updates</h3>
                                <p>Our latest information for students, staff<br> and applicants, including safety
                                    information<br> for academic year 2021-22</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="education-platform-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <img src="{{ asset('new/images/education-platform-04.png') }}" alt="Education Platform">
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <h3>Coronavirus (COVID-19)<br>updates</h3>
                                <p>Our latest information for students, staff<br> and applicants, including safety
                                    information<br> for academic year 2021-22</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Platform Start -->

    <!-- Footer Start -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="footer-col">
                            <h2>Information for</h2>
                            <ul>
                                <li><a href="#">Prospective students</a></li>
                                <li><a href="#">Alumni</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Partners and business</a></li>
                                <li><a href="#">Media</a></li>
                                <li><a href="#">Donors</a></li>
                                <li><a href="#">Parents</a></li>
                                <li><a href="#">Conference organisers</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="footer-col">
                            <h2>Top links</h2>
                            <ul>
                                <li><a href="#">Visit Medvisty</a></li>
                                <li><a href="#">Medvisty and the EU</a></li>
                                <li><a href="#">Outlook 365 web access</a></li>
                                <li><a href="#">Contact the ICT Service Desk</a></li>
                                <li><a href="#">Library</a></li>
                                <li><a href="#">Blackboard</a></li>
                                <li><a href="#">Move Imperial</a></li>
                                <li><a href="#">Term dates</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="footer-col">
                            <h2>Students</h2>
                            <ul>
                                <li><a href="#">Medvisty students</a></li>
                                <li><a href="#">Medvisty College Union</a></li>
                                <li><a href="#">Student Hub</a></li>
                                <li><a href="#">Careers Service</a></li>
                                <li><a href="#">Medvisty Mobile</a></li>
                                <li><a href="#">Graduation</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="footer-col">
                            <h2>Staff</h2>
                            <ul>
                                <li><a href="#">Staff main page</a></li>
                                <li><a href="#">ICIS</a></li>
                                <li><a href="#">HR Procedures</a></li>
                                <li><a href="#">Salaries</a></li>
                                <li><a href="#">Pension schemes</a></li>
                                <li><a href="#">Research support</a></li>
                                <li><a href="#">Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-col">
                            <h2>Medvisty Partners</h2>
                            <ul>
                                <li><a href="#">Medvisty College Healthcare NHS Trust</a></li>
                                <li><a href="#">Medvisty College Academic Health Science Centre</a></li>
                                <li><a href="#">Medvisty College Health Partners</a></li>
                                <li><a href="#">Medvisty Consultants</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Socket Start -->
        <div class="socket">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-logo">
                            <a href="index.html"><img src="{{ asset('new/images/footer-logo_03.png') }}"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="socket-content">
                            <h4>Follow Medvisty</h4>
                            <div class="socket-inner-content">
                                <div class="social-icon">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="socket-inner-content-btn">
                                    <ul>
                                        <li><a href="#">site map</a></li>
                                        <li><a href="#">accessibility</a></li>
                                        <li><a href="#">modern slavery statement</a></li>
                                        <li><a href="#">privacy notice</a></li>
                                        <li><a href="#">use of cookies</a></li>
                                        <li><a href="#">report incorrect content</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Socket End -->
    </footer>
    <!-- Footer End -->
    </div>
@endsection
