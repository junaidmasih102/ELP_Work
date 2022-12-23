@extends('teacher/layout/master_templete')

@section('title')
    <title> Assessments </title>
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
        <h1 class="Discussion-Forums-h1">Peer Graded Assessment Reviews</h1>
        <p class="Discussion-Forums-p">This is a Assessment review page for Student : <u>{{ $view_students->name }}</u>,
            you may once give feedback. </p>
    </div>

    <div class="col-lg-12">
            <div class="">
                <div class="row">
                    <div class="col-lg-10">

                        <div class="tab" style="display: inline-block;width:70%;">
                            <button class="tablinks" type="button"
                                onclick="openCity(event, 'submission')">Submission</button>
                            <button class="tablinks" type="button"
                                onclick="openCity(event, 'feedbacks')">All Feedbacks</button>
                        </div>

                        <div id="submission" class="tabcontent"
                            style="background-color:#f6f9fa; border:transparent; border-radius: 10px; margin-top: -6px; padding: 14px 10px; border-top-left-radius: 0px !important;">
                            <h2 class="Syllabus-h2"><img src="{{ asset('images/Forums-icon_65.png') }}" alt=""
                                    class="clander">{{ $view_students->asessment_title }}</h2>
                            <div class="General-Discussion-form">
                                <div class="General-Discussion-div">
                                    <h2 class="General-Discussion-div-1-h2"></h2>
                                    @foreach ($a_qst as $key => $item)
                                        <h3 style=""><strong>Instructions for Question : {{ $key + 1 }}</strong></h3>
                                        <p class="General-Discussion-div-1-p1">{!! $item->instructions !!}</p>
                                        <textarea style="max-width:100%" name="answer[]" class="form-control"
                                            id="instructions" rows="8"
                                            readonly>{{ App\Models\Assessment::get_answers($item->id, $view_students->id) }}</textarea>
                                        <br>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div id="feedbacks" class="tabcontent">
                            {{-- @foreach ($feedbacks as $item)
                                <h3><u>{{ $item->point }}</u> Points given by {{ $item->name }}</h3>
                                <br>
                            @endforeach --}}
                            @foreach ($feedbacks as $item)
                                <h3><u>{{ App\Models\Assessment::get_percentage($view_students->id, $item->feedback_by, $attempt->assessment_id) }}%</u> given by {{ $item->name }}</h3>
                                <br>
                            @endforeach
                        </div>
                    </div>

                </div>

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
