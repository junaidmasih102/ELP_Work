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
        <h1 class="Discussion-Forums-h1">Peer Graded Assessment Reviews</h1>
        <p class="Discussion-Forums-p">This is a Assessment review page for Anonymus student, you may once give feedback.
        </p>
        @if (Session::has('unsuccess'))
            <p style="color: white; font-weight: 600; background-color: rgb(243, 42, 42);">{{ Session::get('unsuccess') }}
            </p>
        @endif
        @if (Session::has('success'))
            <p style="color: white; font-weight: 600; background-color: rgb(66, 218, 66);">{{ Session::get('success') }}</p>
        @endif
    </div>

    <div class="col-lg-12">
        <form method="POST" action="{{ url('/student/doadd_assessment_feedback') }}">
            @csrf
            <input type="hidden" name="course_id" value="{{ $weeks->course_id }}">
            <input type="hidden" name="week_id" value="{{ $weeks->id }}">
            <input type="hidden" name="asessment_id" value="{{ $assessment->id }}">
            <input type="hidden" name="std_id" value="{{ $view_students->id }}">
            <div class="">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="tab" style="display: inline-block;width:70%;">
                            <button class="tablinks" type="button"
                                onclick="openCity(event, 'assessment')">Assessment</button>
                            <button class="tablinks" type="button" onclick="openCity(event, 'feedbacks')">All
                                Feedbacks</button>
                        </div>

                        <div id="assessment" class="tabcontent"
                            style="background-color:#f6f9fa; border:transparent; border-radius: 10px; margin-top: -6px; padding: 14px 10px; border-top-left-radius: 0px !important;">
                            <h2 class="Syllabus-h2"><img src="{{ asset('images/Forums-icon_65.png') }}" alt=""
                                    class="clander">{{ $assessment->asessment_title }}</h2>
                            <div class="General-Discussion-form">
                                <div class="General-Discussion-div">
                                    <h2 class="General-Discussion-div-1-h2"></h2>
                                    @foreach ($a_qst as $key => $item)
                                        <h3 style=""><strong>Instructions for Question : {{ $key + 1 }}</strong>
                                        </h3>
                                        <input type="hidden" name="question_id[]" value="{{ $item->id }}">
                                        <p class="General-Discussion-div-1-p1">{!! $item->instructions !!}</p>
                                        <textarea style="max-width:100%" name="answer[]" class="form-control" id="instructions" rows="8" readonly>{{ App\Models\Assessment::get_answers($item->id, $view_students->id) }}</textarea>

                                        @isset($feedback_by)
                                            <h3>You already give feedback. </h3>
                                        @else
                                            @foreach (App\Models\Assessment::get_points($item->id) as $item)
                                                <br>
                                                <input type="radio" name="point_{{ $key }}"
                                                    value="{{ $item->point }}">
                                                <input type="number" min="0" value="{{ $item->point }}" readonly
                                                    disabled size="5">
                                                <input readonly disabled value="{{ $item->descriptions }}" size="80" />
                                                <br>
                                            @endforeach
                                        @endisset
                                    @endforeach
                                    <br>
                                    @if (!isset($feedback_by))
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </div>


                        <div id="feedbacks" class="tabcontent">
                            @foreach ($feedbacks as $item)
                                <h3><u>{{ App\Models\Assessment::get_percentage($view_students->id, $item->feedback_by, $assessment->id) }}%</u>
                                    given by {{ $item->name }}</h3>
                                <br>
                            @endforeach
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
