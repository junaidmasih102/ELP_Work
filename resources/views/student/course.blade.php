@extends('student/layout/master_templete')

@section('title')
    <title> Home </title>
@endsection

@section('nav')
    @include('student/include/nav')
@endsection

@section('sidebar')
    @include('student/include/sidebar')
@endsection


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
                                <img class="icon-clr" src="{{ asset('images/flowchart-icons.png') }}"><img class="icon-wh"
                                    src="{{ asset('images/flowchart-icons-wh.png') }}"> Start
                            </div>

                        </li>
                        <?php $count_week = 1; ?>

                        @foreach ($course_weeks as $course_week)
                            <li>
                                <div id="pointer-cont{{ ++$count_week }}" class="pointer-cont">
                                    <h5>Peer-graded Assignment</h5>
                                    <h6>Essential Peer Reviewed<br>
                                        Update #5</h6>
                                    <span>Jan 17</span>
                                </div>
                                <div id="pointer{{ $count_week }}" class="pointer">
                                    <img class="icon-clr" src="{{ asset('images/flowchart-icons_05.png') }}"><img
                                        class="icon-wh" src="{{ asset('images/flowchart-icons-wh2.png') }}">
                                    {{ $course_week->week_name }}
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <div id="pointer-cont{{ ++$count_week }}" class="pointer-cont">
                                <h5>Peer-graded Assignment</h5>
                                <h6>Essential Peer Reviewed<br>
                                    Update #5</h6>
                                <span>Jan 17</span>
                            </div>
                            <div id="pointer{{ $count_week }}" class="pointer">
                                <img class="icon-clr" src="{{ asset('images/flowchart-icons_07.png') }}"><img
                                    class="icon-wh" src="{{ asset('images/flowchart-icons-wh3.png') }}"> End
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
                <p>Learners who set a goal are 75% more likely to complete the course. We’ll help you track your progress.
                </p>
            </div>
            <div class="weekly-goal-right">
                <a href="#" class="btn-main">Set Goal <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
                    <p>It'll take about 1 min. After you're done, continue on and try finishing ahead of schedule.</p>
                </div>
                <div class="weekly-goal-right">
                    <a href="#" class="btn-main">Start <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="weekly-goal-main instructors-main">
            <h3>Instructor’s Note</h3>
            <img src="{{ asset('images/users-img.png') }}">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has the industry's
                standard dummy
                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                specimen book.</p>
            <a href="#" class="dd-links">More <i class="fa fa-angle-down" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="col-lg-12">
        @php
            $counter_no = 0;
        @endphp

        @foreach ($course_weeks as $course_week)
            <div class="accordian-main">
                <a href="#demo{{ ++$counter_no }}" class="btn accordian-week week-main" data-toggle="collapse">
                    <span><img src="{{ asset('images/calender-img.png') }}"></span>
                    <h5>{{ $course_week->week_name }}</h5>
                    @php
                        $time = 0;
                        $v_time = 0;
                        $r_time = 0;
                    @endphp
                    @if (isset($course_week->topics[0]))
                        @foreach ($course_week->topics as $topics_1)
                            @foreach ($topics_1->topics_data as $topics_data)
                                @if (!isset($topics_data->topics_data_seen[0]))
                                    @php $time+=$topics_data->time @endphp

                                    @if ($topics_data->type == 'V')
                                        @php $v_time+=$topics_data->time @endphp
                                    @elseif($topics_data->type == 'R')
                                        @php $r_time+=$topics_data->time @endphp
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    @endif


                    <span class="acc-head-right">Estimated Time: <b> {{ (int) ($time / 60 / 60) }}h
                            {{ (int) ($time / 60) }}m </b><span><i class="fa fa-angle-down"
                                aria-hidden="true"></i></span></span>
                </a>
                <div id="demo{{ $counter_no }}" class="collapse acc-cont">
                    <div class="acc-cont-inner">
                        <div class="col-lg-5">
                            @php
                                $week = str_replace(' ', '_', $course_week->week_name);
                            @endphp
                            <a href='{{ url("/course/$course_id/$week/videos") }}'>
                                <div class="weekly-cols">
                                    <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img class="icon-wh"
                                        src="{{ asset('images/weekly-icons-wh4.png') }}">
                                    <h4>Videos</h4>
                                    <div class="weekly-col-inner">


                                        <h5>{{ (int) ($v_time / 60 / 60) }}h {{ (int) ($v_time / 60) }}m Left</h5>
                                    </div>
                                </div>
                            </a>
                            <a class="weekly-cols" style="text-decoration:none"
                                href='{{ url("/course/$course_id/$week/readings") }}'>
                                <div>
                                    <img class="icon-bl" src="{{ asset('images/weekly-icons_05.png') }}"><img
                                        class="icon-wh" src="{{ asset('images/weekly-icons-wh.png') }}">
                                    <h4>Readings</h4>
                                    <div class="weekly-col-inner">
                                        <h5>{{ (int) ($r_time / 60 / 60) }}h {{ (int) ($r_time / 60) }}m Left</h5>
                                    </div>
                                </div>
                            </a>
                            <div class="weekly-cols">
                                <img class="icon-bl" src="{{ asset('images/weekly-icons.png') }}"><img class="icon-wh"
                                    src="{{ asset('images/weekly-icons-wh4.png') }}">
                                <h4>Practice</h4>
                                <div class="weekly-col-inner">
                                    <h5>01h 14m Left</h5>
                                </div>
                            </div>
                            <div class="weekly-cols">
                                <img class="icon-bl" src="{{ asset('images/weekly-icons_12.png') }}"><img class="icon-wh"
                                    src="{{ asset('images/weekly-icons-wh2.png') }}">
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
                                    @if ($course_week->topics != null)
                                        @foreach ($course_week->topics as $topic)
                                            @if (isset($topic->topics_data[0]))
                                                <tr>
                                                    <td colspan="3" style="padding:10px !important">
                                                        <p style="padding: 0px;margin: 0px;font-size: large;">
                                                            {{ $topic->topic }}</p>
                                                        @foreach ($topic->topics_data as $topic_data)
                                                            @if ($topic_data->type == 'V')
                                                                @php
                                                                    $week_1 = str_replace(' ', '_', $course_week->week_name);
                                                                    $cu_url = 'course/' . $course_id . '/' . $week_1 . '/video/' . $topic_data->id;
                                                                @endphp
                                                            @elseif($topic_data->type == 'R')
                                                                @php
                                                                    $week_1 = str_replace(' ', '_', $course_week->week_name);
                                                                    $cu_url = 'course/' . $course_id . '/' . $week_1 . '/reading/' . $topic_data->id;
                                                                @endphp
                                                            @endif

                                                            <a class="" style="padding: 0px;margin: 0px;"
                                                                href='{{ url("$cu_url") }}'>
                                                                <p style="padding: 0px 15px;margin: 0px;">
                                                                    @if (isset($topic_data->topics_data_seen[0]))
                                                                        <i class="fa fa-check-circle"
                                                                            style="color:#009900;"></i>
                                                                    @elseif($topic_data->type == 'R')
                                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                                    @elseif($topic_data->type == 'V')
                                                                        <i class="fa fa-play-circle"
                                                                            aria-hidden="true"></i>
                                                                    @endif
                                                                    @if ($topic_data->type == 'V')
                                                                        <b> Video : </b>
                                                                    @elseif($topic_data->type == 'R')
                                                                        <b> Reading : </b>
                                                                    @endif

                                                                    {{ $topic_data->video_title }}
                                                                </p>
                                                            </a>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    <tr>
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
        @endforeach



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

@endsection

@section('footer')
    @include('student/include/footer')
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery('#pointer-cont1').hide();
            jQuery('#pointer1').hover(function() {
                $('#pointer-cont1').toggle();
            });

            jQuery('#pointer-cont2').hide();
            jQuery('#pointer2').hover(function() {
                $('#pointer-cont2').toggle();
            });

            jQuery('#pointer-cont3').hide();
            jQuery('#pointer3').hover(function() {
                $('#pointer-cont3').toggle();
            });

            jQuery('#pointer-cont4').hide();
            jQuery('#pointer4').hover(function() {
                $('#pointer-cont4').toggle();
            });

            jQuery('#pointer-cont5').hide();
            jQuery('#pointer5').hover(function() {
                $('#pointer-cont5').toggle();
            });

        });
    </script>
@stop
