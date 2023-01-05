

  

        <div class="navbar-default sidebar pole-movement-sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="dashboard-txt">
             
                        <!-- <a href="{{url('/dashboard')}}/{{$course_id}}"> <img src="{{ asset('images/dashboard-icon-bl2.png') }}"> -->

                        <a href="{{url('/dashboard/14')}}"> <img src="{{ asset('images/dashboard-icon-bl2.png') }}">
                            <h2>Dashbaord</h2>
                        </a>
             
                    </li>

                    
                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl1.png') }}">
                            <h2>Overview</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/">
                                    <h2>Overview</h2>
                                </a>
                            </li>
                            @if (isset($course_weeks_sidebar) && $course_weeks_sidebar != null)
                            @foreach ($course_weeks_sidebar as $course_week)
                            @php
                            $week = str_replace(' ', '_', $course_week->week_name);
                            @endphp
                            <li>
                                <a href='{{ url("course/$course_id/week/$week") }}'>{{ $course_week->week_name }}</a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </li>


                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl2.png') }}">
                            <h2>Grades</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/grades">
                                    <h2>Grades</h2>
                                </a>
                            </li>
                            <li>
                                <a href="/grade_week1">Week 1</a>
                            </li>
                            <li>
                                <a href="/grades_week2">Week 2</a>
                            </li>
                            <li>
                                <a href="/grades_week3">Week 3</a>
                            </li>
                            <li>
                                <a href="/grades_week4">Week 4</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl3.png') }}">
                            <h2>Notes</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/notes">
                                    <h2>Notes</h2>
                                </a>
                            </li>
                            <li>
                                <a href="/notes_week1">Week 1</a>
                            </li>
                            <li>
                                <a href="/notes_week2">Week 2</a>
                            </li>
                            <li>
                                <a href="/notes_week3">Week 3</a>
                            </li>
                            <li>
                                <a href="/notes_week4">Week 4</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl4.png') }}">
                            <h2>Forums</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/forums">
                                    <h2>Forums</h2>
                                </a>
                            </li>
                            @if (isset($thread_sidebar) && $thread_sidebar != null)
                            @foreach ($thread_sidebar as $threads)
                            <li>
                                <a href='{{ url("discussion/$thread_id") }}'>{{ $threads->thread_title }}</a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl5.png') }}">
                            <h2>Messages</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/messages">
                                    <h2>Messages</h2>
                                </a>
                            </li>
                            <li>
                                <a href="/messages_week1">Week 1</a>
                            </li>
                            <li>
                                <a href="/messages_week2">Week 2</a>
                            </li>
                            <li>
                                <a href="/messages_week3">Week 3</a>
                            </li>
                            <li>
                                <a href="/messages_week4">Week 4</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl6.png') }}">
                            <h2>Resources</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/resources">
                                    <h2>Resources</h2>
                                </a>
                            </li>
                            <li>
                                <a href="/resources_week1">Week 1</a>
                            </li>
                            <li>
                                <a href="/resources_week2">Week 2</a>
                            </li>
                            <li>
                                <a href="/resources_week3">Week 3</a>
                            </li>
                            <li>
                                <a href="/resources_week4">Week 4</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>