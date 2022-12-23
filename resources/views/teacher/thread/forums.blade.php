@extends('student/layout/master_templete')

@section('title')
    <title> Forums </title>
@endsection

@section('css')
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            background-color: #ffffff;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: #ffffff;
            float: left;
            outline: none;
            cursor: pointer;
            padding: 16px 20px;
            border-bottom: none !important;
            margin-right: 15px;
            color: #919191;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            transition: 0.3s;
            font-size: 19px;
            border: 1px solid #ccc;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #d9e7f1;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #f6f9fa;
            border: transparent;
            padding: 16px 32px;
            font-size: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-right: 14px;
            color: #111111;
            font-family: 'Fontfabric---Mont-SemiBold' !important;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
@endsection

@section('nav')
    @include('teacher/include/nav')
@endsection

@section('sidebar')
    @include('teacher/include/sidebar')
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('page_content')
    <div class="col-lg-12">
        <h1 class="Discussion-Forums-h1">Discussion Forums</h1>
        <p class="Discussion-Forums-p">Get help and discuss material with the community.</p>
    </div>


    <div class="col-lg-12">
        <div class="forums-background">
            <h2 class="Syllabus-h2"><img src="images/Course-Info-clander_11.png" alt="" class="clander">Week 1</h2>
            <h3 class="Discussion-Forums1-h3">Discuss and ask questions about Week 1.</h3>
            <p class="Discussion-Forums1-p">T7291 threads · Last post 2 hours ago</p>
            <a href="#" class="Discussion-Forums-a">Go to Forum <i
                    class="fa fa-angle-right course-in-catalog-icon"></i></a>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="">
            <div class="row">
                <div class="col-lg-8">

                    <div>
                        <div class="form-search-bar" style="float: right;">
                            <input type="text" placeholder="Search..." class="form-search-bar-style">
                        </div>
                    </div>


                    <div class="tab" style="display: inline-block;width:50%;">
                        <button class="tablinks" onclick="openCity(event, 'London')">Forums</button>
                        {{-- <button class="tablinks" onclick="openCity(event, 'Paris')">All Threads</button> --}}
                    </div>

                    <div id="London" class="tabcontent"
                        style="background-color:#f6f9fa;border:transparent;border-radius: 10px;margin-top: -6px;padding: 14px 10px;    border-top-left-radius: 0px!Important;">
                        <!-- tab inner contant -->
                        @foreach ($forums as $item)
                            <h2 class="Syllabus-h2"><img src="images/Forums-icon_65.png" alt=""
                                    class="clander">{{ $item->course_name }}</h2>

                            @foreach (App\Models\Courses_week::where('course_id', '=', $item->course_id)->where('status', '=', 1)->get() as $week)
                                <div class="General-Discussion-form" style="height: 156px;">
                                    <div class="General-Discussion-div-1">
                                        <h2 class="General-Discussion-div-1-h2">{{ $week->week_name }}</h2>
                                        <p class="General-Discussion-div-1-p1">
                                            {{ App\Models\Weekthread::get_thread_title_by_week($week->id) }}</p>
                                        {{-- <p class="General-Discussion-div-1-p2">Last post a month ago</p> --}}
                                    </div>

                                    <div class="General-Discussion-div-2">
                                        <h4 class="General-Discussion-div-22-span">
                                            {{ App\Models\Threadmsg::get_total_thread_by_week($week->id) }}</h4><br>
                                        <h4 class="General-Discussion-div-22">Threads</h4>
                                    </div>

                                    <div class="General-Discussion-div-3">
                                        <a href="discussion/{{ App\Models\Weekthread::get_thread_id_by_week($week->id) }}">
                                            <img src="{{ asset('images/forums-vedio-icon_03.png') }}"
                                                class="forums-vedio-icon" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach


                        <!-- tab inner contant -->
                    </div>



                    {{-- <div id="Paris" class="tabcontent">
                        <h3>Paris</h3>
                        <p>Paris is the capital of France.</p>
                    </div> --}}
                </div>



                <div class="col-lg-4">



                    <div class="descripition">
                        <h2 class="descripition-h2"><img src="images/Forums-message-icon_03.png" class="Forums-message-icon"
                                alt="">DESCRIPTION</h2>
                        <p class="descripition-p">Welcome to the discussion forums!
                            Ask questions, debate ideas, and find
                            classmates who share your goals.
                            Browse popular threads below or other
                            forums in the sidebar.</p>
                    </div>


                    <div class="moderators">
                        <h2 class="moderators-h2"><img src="images/moder-logo_07.png" class="moder"
                                alt="">MODERATORS</h2>
                        <ul class="forum-ul">
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_06.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_09.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_11.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_17.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_19.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_22.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_24.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_30.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_33.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_36.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_38.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_43.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_44.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_47.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_48.png') }}"
                                    class="moderators-image" alt=""></li>
                        </ul>
                    </div>


                    <div class="forum-guidelines">
                        <a href="#" class="forum-guidelines-btn">Forum guidelines <i
                                class="fa fa-angle-right course-in-catalog-icon"></i></a>
                    </div>

                </div>
            </div>

            <!--  -->
        </div>

        <!-- tab end -->

    </div>

    <!-- Page Content end -->
@endsection


@section('js')
    <!-- tab -->
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
@endsection
