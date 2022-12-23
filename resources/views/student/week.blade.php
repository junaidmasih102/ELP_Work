@extends('student/layout/master_templete')

@section('title')
    <title> Week </title>
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
    <!-- Page Content start -->
    <div class="inner-page-wrapper-schedule">
        <div class="col-lg-12">
            <div class="ecologies-main">
                <h1 class="gy-hdng"> {{ $week }} </h1>
                <h3 class="sub-hdng"> <span>e-Learning Ecologies: </span> Innovative Approaches to Teaching and
                    Learning for the Digital Age</h3>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="main-week">
                <div class="week-1-heading">
                    <img src="{{ asset('images/calender_03.png') }}" alt="calender">
                    <h5>{{ $week }}</h5>
                </div>
                <div class="week-1-content">
                    <div class="left-content">
                        <h2>Discuss and ask questions about Week 1.

                        </h2>
                        <p>7287 threads · Last post an hour ago
                        </p>
                    </div>
                    <div class="right-content">
                        <div class="form_submit_btn">
                            @isset($thread_id)
                                <a class="sign_bar" href="{{ url('discussion/' . $thread_id->thread_id) }}"> Go to forum
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> </a>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12 media-content">
            <!-- live-media-object-start -->
            <div class="media border p-3">
                <h3>Module 1: Course Orientation + Ubiquitous Learning
                </h3>
                <img src="{{ asset('images/new_person_03.png') }}" alt="person" class="mr-3 mt-3 rounded-circle"> <img
                    src="{{ asset('images/women_03.png') }}" alt="women" class="mr-3 mt-3 rounded-circle" id="women">
                <div class="media-body">

                    <p>We begin this module with an introduction to the idea of an "e-learning ecology" and the notion of
                        "affordance." We use this <br>
                        idea to map the range of innovative activities that we may be able to use in e-learning environments
                        – not that we necessaril...</p>
                    <button type="button" class="btn btn-link">More <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-12 media-content">
            <!-- live-media-object-start -->
            <div class="media border p-3">
                <h3>Learning Objectives
                </h3>
                <div class="media-body">
                    <a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Demonstrate understanding of the course
                        structure</a>
                    <a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Differentiate didactic and reflexive
                        pedagogy</a>
                    <a><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Determine the scope of ubiquitous learning </a>

                    <button type="button" class="btn btn-link">More <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        @if ($topics != null)
            @foreach ($topics as $topic)
                <div class="col-lg-12 About-the-Course">
                    <div class="main-week">
                        <div class="week-1-heading">
                            <h4>{{ $topic['topic'] }}</h4>
                        </div>
                        @if (isset($topic['topics_data'][0]))
                            @php
                                $quiz_cond = true;
                            @endphp
                            @foreach ($topic['topics_data'] as $topic_data)
                                @if (!isset($topic_data['topics_data_seen'][0]) && $topic_data['type'] != 'Q')
                                    @php
                                        $quiz_cond = false;
                                    @endphp
                                @endif
                                @if ($topic_data['type'] == 'V')
                                    @php
                                        $cu_url = 'course/' . $course_id . '/' . $week_ . '/video/' . $topic_data['id'];
                                    @endphp
                                @elseif($topic_data['type'] == 'R')
                                    @php
                                        $cu_url = 'course/' . $course_id . '/' . $week_ . '/reading/' . $topic_data['id'];
                                    @endphp
                                @elseif($topic_data['type'] == 'Q')
                                    @if ($quiz_attempt_cond >= $topic['week_id'] && $quiz_cond)
                                        @php
                                            $cu_url = 'course/' . $course_id . '/' . $week_ . '/quiz/' . $topic['topics_data'][0]['topic_id'];
                                        @endphp
                                    @else
                                        @php
                                            $cu_url = '#';
                                        @endphp
                                    @endif
                                @endif
                                <div class="week-inactive-content">
                                    <a href='{{ url("$cu_url") }}' class="complete-task">
                                        @if (isset($topic_data['topics_data_seen'][0]))
                                            <i class="fa fa-check-circle"
                                                style="background: #00FF00;
                                            -webkit-text-fill-color: transparent !important;
                                            -webkit-background-clip: text !important;"></i>
                                        @elseif($topic_data['type'] == 'R')
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        @elseif($topic_data['type'] == 'V')
                                            <i class="fa fa-play-circle" aria-hidden="true"></i>
                                        @elseif($topic_data['type'] == 'Q')
                                            <i class="fa fa-question-circle"></i>
                                        @endif
                                        @if ($topic_data['type'] == 'V')
                                            <b> Video : </b>
                                        @elseif($topic_data['type'] == 'R')
                                            <b> Reading : </b>
                                        @elseif($topic_data['type'] == 'Q')
                                            <b> Quiz </b>
                                        @endif
                                        {{ $topic_data['video_title'] }}
                                        @if (!isset($topic_data['topics_data_seen'][0]))
                                            <small>{{ (int) ($topic_data['time'] / 60) }}m
                                                {{ (int) ($topic_data['time'] % 60) }}s </small>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        @isset($assessment)
            <div class="col-lg-12 About-the-Course">
                <div class="main-week">
                    <div class="week-1-heading">
                        <h4>Peer Graded Assessment</h4>
                    </div>
                    <div class="week-inactive-content">
                        <a href="{{ url("/course/$weeks->course_id/week/$week_/peer_assessment") }}"> <i
                                class="fa fa-lock "></i> <b> Peer Assessment : </b>
                            {{ $assessment->asessment_title }}
                            {{-- <small>1 min</small> --}}
                        </a>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection
