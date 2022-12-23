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
    @include('student/include/nav')
@endsection

@section('sidebar')
    @include('student/include/sidebar')
@endsection

@section('footer')
    @include('student/include/footer')
@endsection

@section('page_content')
    <div class="col-lg-12">
        <h1 class="Discussion-Forums-h1">Peer Graded Assessment</h1>
        <p class="Discussion-Forums-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
            has been the industry's standard dummy</p>
    </div>

    <div class="col-lg-12">
        <div class="forums-background">
            <h2 class="Syllabus-h2"><img src="images/Course-Info-clander_11.png" alt=""
                    class="clander">{{ $weeks->week_name }}</h2>
            <h3 class="Discussion-Forums1-h3">Discuss and ask questions about Week 1.</h3>
            <p class="Discussion-Forums1-p">T7291 threads · Last post 2 hours ago</p>
            @isset($thread_id)
                <a href="{{ url('discussion/' . $thread_id->thread_id) }}" class="Discussion-Forums-a">Go to Forum <i
                        class="fa fa-angle-right course-in-catalog-icon"></i></a>
            @endisset
        </div>
    </div>

    <div class="col-lg-12">
        <form method="POST" action="{{ url('/student/doadd_assessment_answer') }}">
            @csrf
            <input type="hidden" name="course_id" value="{{ $weeks->course_id }}">
            <input type="hidden" name="week_id" value="{{ $weeks->id }}">
            <input type="hidden" name="asessment_id" value="{{ $assessment->id }}">
            <div class="">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="tab" style="display: inline-block;width:70%;">
                            <button class="tablinks" type="button"
                                onclick="openCity(event, 'instructions')">Instructions</button>
                            <button class="tablinks" type="button"
                                onclick="openCity(event, 'submission')">Submissions</button>
                            <button class="tablinks" type="button" onclick="openCity(event, 'students')">Assess
                                Peers</button>
                        </div>
                        <div id="instructions" class="tabcontent"
                            style="background-color:#f6f9fa;border:transparent;border-radius: 10px;margin-top: -6px;padding: 14px 10px;    border-top-left-radius: 0px!Important;">
                            <!-- tab inner contant -->
                            <h2 class="Syllabus-h2"><img src="{{ asset('images/Forums-icon_65.png') }}" alt=""
                                    class="clander">{{ $assessment->asessment_title }}</h2>
                            <div class="General-Discussion-form">
                                <div class="General-Discussion-div">
                                    <h2 class="General-Discussion-div-1-h2"></h2>
                                    {{-- <p class="General-Discussion-div-1-p1">{{ $a_qst->instructions }}</p> --}}
                                    @foreach ($a_qst as $key => $item)
                                        <h3 style=""><strong>Instructions for Question : {{ $key + 1 }}</strong>
                                        </h3>
                                        <p class="General-Discussion-div-1-p1">{{ $item->instructions }}</p>
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <!-- tab inner contant -->
                        </div>
                        <div id="submission" class="tabcontent">
                            @if (count($take_assessment) > 0)
                                <p>You have completed this assessment!!!!</p>
                                @foreach ($feedbacks as $item)
                                    <h3>{{ $item->name }} given you
                                        <u>{{ App\Models\Assessment::get_other_feedbacks($item->feedback_by, $assessment->id) }}%</u>
                                        points.
                                    </h3>
                                @endforeach
                            @else
                                @foreach ($a_qst as $key => $item)
                                    <h3><strong>Question : {{ $key + 1 }}</strong></h3>
                                    <h4>Instructions : </h4>
                                    <p class="General-Discussion-div-1-p1">{!! $item->instructions !!}</p>
                                    <input type="hidden" name="{{ $item->id }}" value="{{ $item->id }}">
                                    <textarea style="max-width:100%" name="answer[]" class="form-control" id="instructions" rows="8"
                                        placeholder="Enter your answer for question {{ $key + 1 }}" required></textarea>
                                    <br>
                                    <br>
                                @endforeach
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @endif
                        </div>

                        <div id="students" class="tabcontent">
                            @if (count($take_assessment) == null)
                                <h3><strong>First you should submit your Peer Assessements then this option will appear for
                                        you. </strong></h3>
                            @else
                                @foreach ($attempts as $key => $item)
                                    <a
                                        href="/course/{{ $weeks->course_id }}/week/{{ $week_name }}/give_review_assessment/{{ $item->attempt_id }}">
                                        <h2>Peer {{ $key = $key + 1 }}</h2>
                                    </a>
                                    <br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- tab end -->

    </div>

    <!-- Page Content end -->
@endsection


@section('js')
    <!-- tab -->
    @if (Session::has('error'))
        <script>
            alert('Please see instructions carefully and follow the limit of answer!!!');
        </script>
    @endif
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
