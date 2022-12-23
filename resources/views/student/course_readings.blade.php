@extends('student/layout/master_templete')

@section('title')
    <title> Reading </title>
@endsection

@section('nav')
    @include('student/include/nav')
@endsection

@section('sidebar')
    <link rel="stylesheet" href="{{ asset('plyr.css') }}" />
    <script src="{{ asset('plyr.min.js?id=1') }}"></script>
    <div class="navbar-default sidebar pole-movement-sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu" style="margin: 0px;">
                @if ($topics != null)
                    @php
                        $unseen_video_condition = 1;
                    @endphp

                    @if ($cur_video->id)
                        @php
                            $next_cond = true;
                        @endphp
                    @endif

                    @foreach ($topics as $topic)
                        <li class="dashboard-txt">
                            @if ($topic['topics_data_reading'] != null)
                                <h3 style="padding:0px 10px;font-size: large;">{{ $topic['topic'] }}</h3>

                                @foreach ($topic['topics_data_reading'] as $topic_data)
                                    @php
                                        $v_id = $topic_data['id'];
                                    @endphp

                                    @if (isset($next_cond) && $next_cond == true && $v_id > $cur_video->id)
                                        @php
                                            $next_cond = false;
                                            $next_v_id = $topic_data['id'];
                                        @endphp
                                    @endif

                                    <a class="@if (!isset($topic_data['topics_data_seen'][0]) && $unseen_video_condition == 1 && $cur_video == null) active @endif"
                                        style="padding:10px 0px 1px 30px"
                                        href='{{ url("course/$course_id/$week/reading/$v_id") }}'>
                                        <p>
                                            @if (isset($topic_data['topics_data_seen'][0]))
                                                <i class="fa fa-check-circle" style="color:#009900;"></i>
                                            @else
                                                @if ($unseen_video_condition == 1)
                                                    @php
                                                        $unseen_video_condition = 0;
                                                        $unseen_video = $topic_data;
                                                    @endphp
                                                @endif <i class="fa fa-book" aria-hidden="true"></i>
                                            @endif {{ $topic_data['video_title'] }}
                                        </p>
                                    </a>
                                @endforeach
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection


@section('page_content')
    @if ($cur_video != null)
        <div style="padding:10px">
            <h2>{{ $cur_video->video_title }}</h2>
            <p>{!! $cur_video->content !!}</p>
            <div style="margin-top:10px;">
                <a href='{{ url("mark_as_read/$course_id/$cur_video->id") }}' class="btn btn-primary"
                    @if (isset($cur_video->topics_data_seen[0])) disabled @endif><i class="fa fa-check"></i>Mark as Read</a>
                <a href='{{ url('/course/view_courses') }}'>
                    <button class="btn btn-info">Back to Courses</button>
                </a>
                <a href='{{ url("/course/$course_id/week/$week") }}'>
                    <button class="btn btn-info">Back to Week</button>
                </a>
                @if (isset($next_v_id))
                    <a href="{{ $next_v_id }}" class="btn btn-info nxt">Next</a>
                @endif
            </div>
        </div>
    @elseif(isset($unseen_video))
        @if ($unseen_video != null)
            <div style="padding:10px">
                <h2>{{ $unseen_video['video_title'] }} </h2>
                <p>{!! $unseen_video['content'] !!}</p>
            </div>
            @php
                $url = 'mark_as_read/' . $course_id . '/' . $unseen_video['id'];
            @endphp
            <div style="margin-top:10px;">
                <a href='{{ url("$url") }}' class="btn btn-primary" @if (isset($unseen_video['topics_data_seen'][0])) disabled @endif><i
                        class="fa fa-check"></i>Mark as Read</a>
                <button class="btn btn-info" id="transcript" name="transcipt">Transcript</button>
                <a href='{{ url('/course/view_courses') }}'>
                    <button class="btn btn-info">Back to Courses</button>
                </a>
                <a href='{{ url("/course/$course_id/week/$week") }}'>
                    <button class="btn btn-info">Back to Week</button>
                </a>
                @if (isset($next_v_id))
                    <a href="{{ $next_v_id }}" class="btn btn-info nxt">Next</a>
                @endif
            </div>
        @endif
    @elseif(isset($topics[0]))
        @if ($topics[0] != null)
            <div style="padding:10px">
                <h2>{{ $topics[0]['topics_data_reading'][0]['video_title'] }} </h2>
                <p>{!! $topics[0]['topics_data_reading'][0]['content'] !!}</p>
            </div>
            @php
                $url = 'mark_as_read/' . $course_id . '/' . $topics[0]['topics_data_reading'][0]['id'];
            @endphp
            <div style="margin-top:10px;">
                <a href='{{ url("$url") }}' class="btn btn-primary" @if (isset($topics[0]['topics_data_reading'][0]['topics_data_seen'][0])) disabled @endif><i
                        class="fa fa-check"></i>Mark as Read</a>
                <button class="btn btn-info" id="transcript" name="transcipt">Transcript</button>
                <a href='{{ url('/course/view_courses') }}'>
                    <button class="btn btn-info">Back to Courses</button>
                </a>
                <a href='{{ url("/course/$course_id/week/$week") }}'>
                    <button class="btn btn-info">Back to Week</button>
                </a>
                @if (isset($next_v_id))
                    <a href="{{ $next_v_id }}" class="btn btn-info nxt">Next</a>
                @endif
            </div>
        @endif
    @endif
@endsection

@section('footer')
    @include('student/include/footer')
@endsection