        <div class="navbar-default sidebar pole-movement-sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">

                    <li class="dashboard-txt">
                        <a href="{{ url('admin/home') }}" class="active"> <img
                                src="{{ asset('images/dashboard-icon-bl1.png') }}">
                            <h2>Dashboard</h2>
                        </a>
                    </li>

                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl3.png') }}">
                            <h2>Users</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('admin/users') }}">Users</a>
                            </li>
                            <li>
                                <a href="{{ url('admin/pending-users') }}">Pending Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dashboard-txt">

                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl2.png') }}">
                            <h2>Courses</h2> <span class="fa arrow"></span>
                        </a>

                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/add_course') }}">Add Course</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/view_added_courses') }}">View Courses</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/view_students_requests') }}">Students Requests</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/assign_courses_to_students') }}">Assign Courses to Students</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/assign_courses_to_teachers') }}">Assign Courses to Teachers</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dashboard-txt">
                        <a href=""> <img src="{{ asset('images/dashboard-icon-bl3.png') }}">
                            <h2>Certification</h2> <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/view_courses_certificate') }}">View Courses Certificate</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/addinstructorsignature') }}">Add Instructor Signature</a>
                            </li>
                        </ul>
                    </li>

                    <!--
                <li class="dashboard-txt">
     
                    <a href=""> <img src="{{ asset('images/dashboard-icon-bl4.png') }}"><h2>Quiz Results</h2> <span class="fa arrow"></span></a>
                    
     <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/admin/quiz_result') }}">View Results</a>
                        </li>
      
                    </ul>
                </li>
                -->
                </ul>

            </div>
        </div>
