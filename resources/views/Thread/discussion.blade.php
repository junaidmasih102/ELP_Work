@extends('student/layout/master_templete')

@section('title')
    <title> Forum </title>
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

        .dis_div {
            overflow: scroll;
            height: 500px;
            border-style: double;
            border: 0 0 0 0;
            /* border-bottom: 10px; */
        }

        .error {
            border-color: red;
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
        <h1 class="Discussion-Forums-h1">Discussion Forums</h1>
        <p class="Discussion-Forums-p">Get help and discuss material with the community.</p>
    </div>




    <div class="col-lg-12">
        <div class="">
            <div class="row">
                <div class="col-lg-8">

                    {{-- <div>
                        <div class="form-search-bar" style="float: right;">
                            <input type="text" placeholder="Search..." class="form-search-bar-style">
                        </div>
                    </div> --}}
                    <br>
                    <br>
                    <br>
                    <div
                        style="background-color:#f6f9fa;border:transparent;border-radius: 10px;margin-top: -6px;padding: 14px 10px; border-top-left-radius: 0px!Important;">


                        <div class="General-Discussion-form" style="height: 605px !important;">
                            <div class="General-Discussion-div-2">
                                <h4 class="General-Discussion-div-22-span" style="margin-left: 52px;">{{ $count }}
                                </h4><br>
                                <h4 class="General-Discussion-div-22">Threads</h4>
                            </div>
                            <div class="General-Discussion-div-1">
                                <span style="font-size: 30px;"
                                    class="General-Discussion-div-1-h2">{{ $thread->thread_title }}</span>
                                <hr>
                                <div class="dis_div" id="dis_div">
                                    <br>
                                    @foreach ($discussion as $item)
                                        <div id="data_">
                                            <div class="col-md-10">
                                                <span style="font-size: 20px; font-weight: 900; color: black;"
                                                    class="General-Discussion-div-1-p1"><span>{{ $item->msg_text }}</span>
                                                </span> <br>
                                                <span style="font-size: 14px; font-weight: 900; color: black;">By :
                                                    {{ App\Models\User::where('id', '=', $item->msg_by)->pluck('name')->first() }}</span><br>
                                                <sub>{{ $item->post_time }}</sub><br>
                                                <hr>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="/view_thread/{{ $item->msg_id }}"
                                                    style="font-size: 14px; color: blue; float:">{{ count(App\Models\Threadmsg::where('reply_to', '=', $item->msg_id)->get()) > 0 ? 'see ' . count(App\Models\Threadmsg::where('reply_to', '=', $item->msg_id)->get()) : '0 Reply' }}</a>
                                                <a href="/view_thread/{{ $item->msg_id }}"
                                                    style="font-size: 16px; color: blue; float:">Reply</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="General-Discussion-div-3"><img src="{{ asset('images/forums-vedio-icon_03.png') }}"
                                    class="forums-vedio-icon" alt=""></div>

                        </div>
                        <form action="{{ url('add_query') }}" method="POST">
                            @csrf
                            <input type="hidden" name="thread_id" value="{{ $thread->thread_id }}">
                            <div class="col-md-10">
                                <input type="text" placeholder="Type your query..."
                                    class="form-control @error('msg') error @enderror" name="msg">
                                @error('msg')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-primary" value="Create Thread">
                            </div>
                        </form>
                        <!-- tab inner contant -->
                    </div>


                </div>



                <div class="col-lg-4">
                    <div class="descripition">
                        <h2 class="descripition-h2"><img src="{{ asset('images/Forums-message-icon_03.png') }}"
                                class="Forums-message-icon" alt="">DESCRIPTION</h2>
                        <p class="descripition-p">Welcome to the discussion forums!
                            Ask questions, debate ideas, and find
                            classmates who share your goals.
                            Browse popular threads below or other
                            forums in the sidebar.</p>
                    </div>


                    <div class="moderators">
                        <h2 class="moderators-h2"><img src="{{ asset('images/moder-logo_07.png') }}" class="moder"
                                alt="">MODERATORS</h2>
                        <ul class="forum-ul">
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_06.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_09.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_11.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_17.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_19.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_22.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_24.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_30.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_33.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_36.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_38.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_43.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_44.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_47.png') }}"
                                    class="moderators-image" alt=""></li>
                            <li class="moderators-li"><img src="{{ asset('images/moderators-imgs_48.png') }}"
                                    class="moderators-image" alt=""></li>
                        </ul>
                    </div>


                    <div class="forum-guidelines">
                        <a href="#" class="forum-guidelines-btn">Forum guidelines <i
                                class="fa fa-angle-right course-in-catalog-icon"></i></a>
                    </div>

                </div>
            </div>

            <!--  -->
        </div>

        <!-- tab end -->

    </div>

    <!-- Page Content end -->
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                // alert({{ $thread->thread_id }})
                $('.dis_div').load('/dis_refresh/' + {{ $thread->thread_id }}).fadeIn('slow')
            }, 3000);
        });
    </script>
@endsection
