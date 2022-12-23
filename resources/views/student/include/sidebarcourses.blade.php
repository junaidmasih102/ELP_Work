<div class="navbar-default sidebar pole-movement-sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">
            <li class="dashboard-txt">
                <a href=""> <img src="{{ asset('images/dashboard-icon-bl1.png') }}">
                    <h2>View Courses</h2> <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('course/ire_courses') }}">
                            <h2>View Courses</h2>
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
        </ul>
    </div>
</div>
