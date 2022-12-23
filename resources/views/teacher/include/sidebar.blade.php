<div class="navbar-default sidebar pole-movement-sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">


            <li class="dashboard-txt">

                <a href=""> <img src="{{ asset('images/dashboard-icon-bl2.png') }}">
                    <h2>Courses</h2> <span class="fa arrow"></span>
                </a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ url('/teacher/view_courses') }}">View Courses</a>
                    </li>
                    <li>
                        <a href="{{ url('/teacher/view_forums') }}">View Forums</a>
                    </li>
                    <li>
                        <a href="{{ url('/show_certificate') }}">Certificates</a>
                    </li>
                    <li>
                        <a href="{{ url('/teacher/view_assessments') }}">Grade Assessments</a>
                    </li>
                </ul>
            </li>



        </ul>

    </div>
</div>
