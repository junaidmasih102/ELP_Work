<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')


    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style_thread.css') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


    @yield('css')

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @yield('nav')


        <!-- Sidebar -->
        @yield('sidebar')




        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Content start -->
                <div class="inner-page-wrapper">
                    @section('page_content')
                        <div class="col-lg-12">
                            <div class="ecologies-main">
                                <h2 class="gy-hdng">e-Learning Ecologies:</h2>
                                <h3 class="sub-hdng">Innovative Approaches to Teaching and Learning for the Digital Age</h3>
                                <p>by Medvisty</p>
                                <div class="ecology-flowchart-main">
                                    <div class="ecology-pointers">

                                        <ul class="ecology-flowchart">

                                            <li>
                                                <div id="pointer-cont1" class="pointer-cont">
                                                    <h5>Peer-graded Assignment</h5>
                                                    <h6>Essential Peer Reviewed<br>
                                                        Update #5</h6>
                                                    <span>Jan 17</span>
                                                </div>
                                                <div id="pointer1" class="pointer">
                                                    <img class="icon-clr"
                                                        src="{{ asset('images/flowchart-icons.png') }}"><img class="icon-wh"
                                                        src="{{ asset('images/flowchart-icons-wh.png') }}">
                                                    Start
                                                </div>

                                            </li>
                                            <li>
                                                <div id="pointer-cont2" class="pointer-cont">
                                                    <h5>Peer-graded Assignment</h5>
                                                    <h6>Essential Peer Reviewed<br>
                                                        Update #5</h6>
                                                    <span>Jan 17</span>
                                                </div>
                                                <div id="pointer2" class="pointer">
                                                    <img class="icon-clr"
                                                        src="{{ asset('images/flowchart-icons_05.png') }}"><img
                                                        class="icon-wh"
                                                        src="{{ asset('images/flowchart-icons-wh2.png') }}"> Week 1
                                                </div>

                                            </li>
                                            <li>
                                                <div id="pointer-cont3" class="pointer-cont">
                                                    <h5>Peer-graded Assignment</h5>
                                                    <h6>Essential Peer Reviewed<br>
                                                        Update #5</h6>
                                                    <span>Jan 17</span>
                                                </div>
                                                <div id="pointer3" class="pointer">
                                                    <img class="icon-clr"
                                                        src="{{ asset('images/flowchart-icons_05.png') }}"><img
                                                        class="icon-wh"
                                                        src="{{ asset('images/flowchart-icons-wh2.png') }}"> Week 2
                                                </div>

                                            </li>
                                            <li>
                                                <div id="pointer-cont4" class="pointer-cont">
                                                    <h5>Peer-graded Assignment</h5>
                                                    <h6>Essential Peer Reviewed<br>
                                                        Update #5</h6>
                                                    <span>Jan 17</span>
                                                </div>
                                                <div id="pointer4" class="pointer">
                                                    <img class="icon-clr"
                                                        src="{{ asset('images/flowchart-icons_05.png') }}"><img
                                                        class="icon-wh"
                                                        src="{{ asset('images/flowchart-icons-wh2.png') }}"> Week 3
                                                </div>

                                            </li>
                                            <li>
                                                <div id="pointer-cont5" class="pointer-cont">
                                                    <h5>Peer-graded Assignment</h5>
                                                    <h6>Essential Peer Reviewed<br>
                                                        Update #5</h6>
                                                    <span>Jan 17</span>
                                                </div>
                                                <div id="pointer5" class="pointer">
                                                    <img class="icon-clr"
                                                        src="{{ asset('images/flowchart-icons_07.png') }}"><img
                                                        class="icon-wh"
                                                        src="{{ asset('images/flowchart-icons-wh3.png') }}"> End
                                                </div>

                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="weekly-goal-main">
                                <div class="weekly-goal-left">
                                    <h3>My Weekly Goal</h3>
                                    <p>Learners who set a goal are 75% more likely to complete the course. We’ll help you
                                        track your progress.</p>
                                </div>
                                <div class="weekly-goal-right">
                                    <a href="#" class="btn-main">Set Goal <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="clr-box">
                                <div class="week-main">
                                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                                    <h5>Week 1</h5>
                                </div>
                                <div class="clr-head">
                                    <div class="weekly-goal-left">
                                        <h3>Welcome to e-Learning Ecologies!</h3>
                                        <p>It'll take about 1 min. After you're done, continue on and try finishing ahead of
                                            schedule.</p>
                                    </div>
                                    <div class="weekly-goal-right">
                                        <a href="#" class="btn-main">Start <i class="fa fa-angle-right"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="weekly-goal-main instructors-main">
                                <h3>Instructor’s Note</h3>
                                <img src="{{ asset('images/users-img.png') }}">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has the industry's standard dummy
                                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                                    it to make a type specimen book.</p>
                                <a href="#" class="dd-links">More <i class="fa fa-angle-down"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="accordian-main">
                                <a href="#demo" class="btn accordian-week week-main" data-toggle="collapse">
                                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                                    <h5>Week 1</h5>
                                    <span class="acc-head-right">Estimated Time: <b>5h 39m</b><span><i
                                                class="fa fa-angle-down" aria-hidden="true"></i></span></span>
                                </a>
                                <div id="demo" class="collapse acc-cont">
                                    <div class="acc-cont-inner">
                                        <div class="col-lg-5">
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Videos</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_05.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh.png') }}">
                                                <h4>Readings</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Practice</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_12.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh2.png') }}">
                                                <h4>Other</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <table id="acc-table">
                                                <thead>
                                                    <tr>
                                                        <th>Required</th>
                                                        <th>Grade</th>
                                                        <th>Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="accordian-main">
                                <a href="#demo2" class="btn accordian-week week-main" data-toggle="collapse">
                                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                                    <h5>Week 2</h5>
                                    <span class="acc-head-right">Estimated Time: <b>5h 39m</b><span><i
                                                class="fa fa-angle-down" aria-hidden="true"></i></span></span>
                                </a>
                                <div id="demo2" class="collapse acc-cont">
                                    <div class="acc-cont-inner">
                                        <div class="col-lg-5">
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Videos</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_05.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh.png') }}">
                                                <h4>Readings</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Practice</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_12.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh2.png') }}">
                                                <h4>Other</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <table id="acc-table">
                                                <thead>
                                                    <tr>
                                                        <th>Required</th>
                                                        <th>Grade</th>
                                                        <th>Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="accordian-main">
                                <a href="#demo3" class="btn accordian-week week-main" data-toggle="collapse">
                                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                                    <h5>Week 3</h5>
                                    <span class="acc-head-right">Estimated Time: <b>5h 39m</b><span><i
                                                class="fa fa-angle-down" aria-hidden="true"></i></span></span>
                                </a>
                                <div id="demo3" class="collapse acc-cont">
                                    <div class="acc-cont-inner">
                                        <div class="col-lg-5">
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Videos</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_05.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh.png') }}">
                                                <h4>Readings</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Practice</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_12.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh2.png') }}">
                                                <h4>Other</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <table id="acc-table">
                                                <thead>
                                                    <tr>
                                                        <th>Required</th>
                                                        <th>Grade</th>
                                                        <th>Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="accordian-main">
                                <a href="#demo4" class="btn accordian-week week-main" data-toggle="collapse">
                                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                                    <h5>Week 4</h5>
                                    <span class="acc-head-right">Estimated Time: <b>5h 39m</b><span><i
                                                class="fa fa-angle-down" aria-hidden="true"></i></span></span>
                                </a>
                                <div id="demo4" class="collapse acc-cont">
                                    <div class="acc-cont-inner">
                                        <div class="col-lg-5">
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Videos</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_05.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh.png') }}">
                                                <h4>Readings</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh4.png') }}">
                                                <h4>Practice</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                            <div class="weekly-cols">
                                                <img class="icon-bl" src="{{ asset('images/weekly-icons_12.png') }}"><img
                                                    class="icon-wh" src="{{ asset('images/weekly-icons-wh2.png') }}">
                                                <h4>Other</h4>
                                                <div class="weekly-col-inner">
                                                    <h5>01h 14m Left</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <table id="acc-table">
                                                <thead>
                                                    <tr>
                                                        <th>Required</th>
                                                        <th>Grade</th>
                                                        <th>Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="{{ asset('images/table-icon.png') }}">
                                                            <div class="inner-table-cnt">
                                                                <h3>Peer-graded Assignment</h3>
                                                                <h5>Essential Peer Reviewed Update#1</h5>
                                                                <b>2h</b>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <h3>Jan 3</h3>
                                                            <h5>11:59 pm PST</h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="email-medvisty">
                                <div class="email-medvisty-left">
                                    <p>Do you want to receive emails from <strong>Medvisty?</strong></p>
                                </div>
                                <div class="email-medvisty-right" id="toggle-switch">
                                    <label class="switch">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                    <div class="email-close">
                                        <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @show
                </div>

                <!-- Page Content end -->

            </div>
        </div>

    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Footer -->
    @yield('footer')
    @yield('js')
</body>

</html>
