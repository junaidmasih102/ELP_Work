@extends('student/layout/master_templete')

@section('title')
    <title>
        Videos </title>
    <style>
        #hide {
            display: none;
        }
    </style>
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
                            @if ($topic['topics_data_video'] != null)
                                <h3 style="padding:0px 10px;font-size: large;">{{ $topic['topic'] }}</h3>

                                @foreach ($topic['topics_data_video'] as $topic_data)
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
                                        href='{{ url("course/$course_id/$week/video/$v_id") }}'>
                                        <p>
                                            @if (isset($topic_data['topics_data_seen'][0]))
                                                <i class="fa fa-check-circle" style="color:#00ff00;"></i>
                                            @else
                                                @if ($unseen_video_condition == 1)
                                                    @php
                                                        $unseen_video_condition = 0;
                                                        $unseen_video = $topic_data;
                                                    @endphp
                                                @endif
                                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                            @endif
                                            {{ $topic_data['video_title'] }}
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
    @if ($compulsory == 1)
        @if ($cur_video != null)
            <div style="padding:10px">
                <h3>{{ $cur_video->video_title }} </h3>
                <div style="width:700px">
                    <div class="compulsory_video" data-plyr-provider="youtube"
                        data-plyr-embed-id="{{ $cur_video->video_url }}"
                        data-plyr-config='{ "video_id": "<?php echo $cur_video->id; ?>" }'></div>
                </div>
            </div>
            <div style="padding:10px">
                <p id="hide">{{ $cur_video->content }}</p>
            </div>
            <div style="margin-top:10px;">
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
        @elseif(isset($unseen_video) && $unseen_video != null)
            <div style="padding:10px">
                <h3>{{ $unseen_video['video_title'] }} </h3>
                <div style="width:700px">
                    <div class="compulsory_video" data-plyr-provider="youtube"
                        data-plyr-embed-id="{{ $unseen_video['video_url'] }}"
                        data-plyr-config='{ "video_id": "<?php echo $unseen_video['id']; ?>" }'></div>
                </div>
            </div>
            {{-- <div style="padding:10px">
                <p id="hide">{{ $cur_video->content }}</p>
            </div> --}}
            <div style="padding:10px">
                <p id="hide">{{ $unseen_video['content'] }}</p>
            </div>
            <div style="margin-top:10px;">
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
        @elseif(isset($topics[0]))
            @if ($topics[0]['topics_data_video'][0] != null)
                <div style="padding:10px">
                    <h3>{{ $topics[0]['topics_data_video'][0]['video_title'] }} </h3>
                    <div style="width:700px">
                        <div class="compulsory_video" data-plyr-provider="youtube"
                            data-plyr-embed-id="{{ $topics[0]['topics_data_video'][0]['video_url'] }}"
                            data-plyr-config='{ "video_id": "<?php echo $topics[0]['topics_data_video'][0]['id']; ?>" }'></div>
                    </div>
                </div>
                {{-- <div style="padding:10px">
                    <p id="hide">{{ $cur_video->content }}</p>
                </div> --}}
                <div style="padding:10px">
                    <p id="hide">{{ $topics[0]['topics_data_video'][0]['content'] }}</p>
                </div>
                <div style="margin-top:10px;">
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
    @else
        @if ($cur_video != null)
            <div style="padding:10px" class="video_off">
                <h3>{{ $cur_video->video_title }} </h3>
                <div style="width:700px">
                    <div class="simple_video" data-plyr-provider="youtube" data-plyr-embed-id="{{ $cur_video->video_url }}"
                        data-plyr-config='{ "video_id": "<?php echo $cur_video->id; ?>" }'></div>
                </div>
            </div>
            <div style="padding:10px">
                <p id="hide">{{ $cur_video->content }}</p>
            </div>
            <div style="margin-top:10px;">
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
        @elseif(isset($unseen_video) && $unseen_video != null)
            <div style="padding:10px">
                <h3>{{ $unseen_video['video_title'] }} </h3>
                <div style="width:700px">
                    <div class="simple_video" data-plyr-provider="youtube"
                        data-plyr-embed-id="{{ $unseen_video['video_url'] }}"
                        data-plyr-config='{ "video_id": "<?php echo $unseen_video['id']; ?>" }'></div>
                </div>
            </div>
            {{-- <div style="padding:10px">
                <p id="hide">{!! $cur_video->content !!}</p>
            </div> --}}
            <div style="padding:10px">
                <p id="hide">{{ $unseen_video['content'] }}</p>
            </div>
            <div style="margin-top:10px;">
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
        @elseif(isset($topics[0]))
            @if ($topics[0]['topics_data_video'][0] != null)
                <div style="padding:10px">
                    <h3>{{ $topics[0]['topics_data_video'][0]['video_title'] }} </h3>
                    <div style="width:700px">
                        <div class="simple_video" data-plyr-provider="youtube"
                            data-plyr-embed-id="{{ $topics[0]['topics_data_video'][0]['video_url'] }}"
                            data-plyr-config='{ "video_id": "<?php echo $topics[0]['topics_data_video'][0]['id']; ?>" }'></div>
                    </div>
                </div>
                <div style="padding:10px">
                    <p id="hide">{{ $topics[0]['topics_data_video'][0]['content'] }}</p>
                </div>
                <div style="margin-top:10px;">
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
    @endif


@endsection

@section('footer')
    @include('student/include/footer')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#transcript").click(function() {
                $("#hide").toggle();
            });
        });

        function finish_video(finish_time, video_id) {
            var url = "/video_watched/" + {{ $course_id }} + "/" + video_id;
            $.ajax({
                url: url,
                type: 'get',
                success: function(data) {},
            })
            $('li .active i').removeClass('fa-play-circle');
            $('li .active i').addClass('fa fa-check-circle');
            $('li .active i').css('color', '#00ff00');
        }

        if ($('.simple_video').length) {
            const simple_video = Plyr.setup('.simple_video', {
                invertTime: false
            });



            simple_video.forEach(function(instance) {
                instance.on('timeupdate', function() {});
                instance.on('ended', function() {
                    var finish_time = Math.floor(instance.currentTime);
                    finish_video(finish_time, instance.config.video_id);
                });
            });

        } else {

            const compulsory_video = Plyr.setup('.compulsory_video', {
                invertTime: false,
                controls: ['play', 'current-time', 'mute', 'volume', 'settings', 'fullscreen']
            });

            compulsory_video.forEach(function(instance) {
                instance.on('timeupdate', function() {
                    var total_time = Math.floor((instance.duration * 70) / 100);
                    var current_time = Math.floor(instance.currentTime);
                    save_video_timing(total_time, current_time, instance.config.video_id);
                });
                instance.on('ended', function() {
                    var finish_time = Math.floor(instance.currentTime);
                    finish_video(finish_time, instance.config.video_id);
                });
            });

        }
    </script>
@stop
