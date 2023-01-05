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

<style>
    .main_dashborad_heading {
        margin-bottom: 30px;
        color: #9da7bd;
    }

    .main_dashborad_heading img {
        margin-right: 15px;
    }

    .main-heading-top {

        color: #8b91a2;


    }

    .main-heading-top h2 span {
        color: #001746;
        font-weight: 400;

    }

    .main-heading-top h2 {
        font-weight: 400;
        margin-bottom: 0px;
        font-size: 34px;
    }

    .main-heading-top h3 {
        font-weight: 400;
        font-size: 16px;
    }

    .info-sec-01 {
        background-color: #f1f5ff;
        border-radius: 8px;
        border: 1px solid #e0e4ed;
    }

    .info-data-main h5 {
        color: #001746;
        font-weight: bolder;
        font-size: 26px;
        padding-left: 20px;
        padding-top: 10px;
    }

    .info-data-main h6 {
        font-size: 18px;
        font-weight: 800;
        color: #9da7bd;
        margin-left: 20px;
        margin-bottom: 25px;
    }

    .info-data-main a {
        color: #0f5ef7;
        text-decoration: none;
        font-size: 20;
        font-weight: 700;
        margin-left: 20px;
    }

    .info-data-main span {
        color: #001847;
    }

    .info-sec-01 h6 {
        color: #9da7bd;
        font-weight: bold;
    }

    .info-sec-01 a {
        color: #0f5ef7;
        text-decoration: none;
        font-weight: bold;
    }

    .info-sec-01 .row span {
        color: #001746;
    }

    .info-sec-01 .row h6 img {
        margin-left: 40px;
    }

    .posi-mar-01 {
        margin-left: -35px;
    }

    .age-loc-posi {
        margin-left: -10px;
    }

    .Primary-insure-01 {
        margin-left: -50px;
        margin-bottom: 40px;
    }

    .atten-graph h3 {
        color: #001746;
        font-weight: bolder;
        font-size: 26px;
        padding-bottom: 25px;
        padding-top: 25px;
        margin-bottom: 0px;
        margin-left: 12px;
    }

    .atten-graph .back-img-percrnt p {
        position: relative;
        top: 35.5%;
        left: 16.8%;
        font-size: 38px;
        font-weight: bolder;
        margin-bottom: 0px;
        color: #000;
    }


    .learning-progress-sec-02 {
        background-color: #fdfdfd;
        border-radius: 8px;
        border: 1px solid #e0e4ed;
        margin-top: 40px;
        padding-top: 0px !important;
        height: 360px;
    }

    .learning-progress-sec-02 h3 {
        font-weight: 800 !important;
        margin-left: 15px;
    }

    .percentag-para-sec-02 {
        position: relative;
        font-size: 38px;
        font-weight: bolder;
        margin-bottom: 0px;
        color: #001746;
        bottom: 49.5%;
        left: 45%;
    }

    .learning-progress-sec-02 .col-lg-5 {
        padding-top: 25px;
        padding-left: 28px;
        padding-bottom: 25px;
    }

    .learning-progress-sec-02 h3 {
        margin-bottom: 20px;
    }

    .topic-progress h5 {
        color: #001847;
        font-weight: 800;
    }

    .sec-01-01 {
        border-right: 1px solid #e0e4ed;
    }

    .learning-progress-sec-02 .col-lg-7 {
        padding-top: 25px;
        padding-left: 28px;
        padding-bottom: 25px;
        padding-right: 40px;
    }

    .remain-task-01 {
        padding: 15px 0px;
        padding-left: 15px !important;
    }

    .remain-task-01 img {
        float: left;
        margin-right: 10px;
    }

    .remain-task-01 h6 {
        margin-left: 10 !important;
    }

    .remian-task-02 {
        border-bottom: 1px solid;
        border-bottom-style: dashed;
    }

    .remain-task-01:hover {
        background-color: #fce9e9;
    }




    .main-heading-top {

        color: #8b91a2;


    }

    .main-heading-top h2 span {
        color: #001746;
        font-weight: 400;

    }

    .main-heading-top h2 {
        font-weight: 400;
        margin-bottom: 0px;
        font-size: 34px;
    }

    .main-heading-top h3 {
        font-weight: 400;
        font-size: 16px;
    }

    .info-sec-01 {
        background-color: #f1f5ff;
        border-radius: 8px;
        border: 1px solid #e0e4ed;
    }

    .info-sec-01 h5 {
        color: #001746;
        font-weight: bolder;
        padding-left: 28px;
        font-size: 26px;
        border-bottom: 1px solid #c9cbd2;
        padding-bottom: 25px;
        padding-top: 25px;
        margin-bottom: 0px;
    }

    .info-sec-01 h6 {
        color: #9da7bd;
        font-weight: bold;
    }

    .info-sec-01 a {
        color: #0f5ef7;
        text-decoration: none;
        font-weight: bold;
    }

    .info-sec-01 .row span {
        color: #001746;
    }

    .info-sec-01 .row h6 img {
        margin-left: 40px;
    }

    .posi-mar-01 {
        margin-left: -35px;
    }

    .age-loc-posi {
        margin-left: -10px;
    }

    .Primary-insure-01 {
        margin-left: -50px;
        margin-bottom: 40px;
    }

    .atten-graph h3 {
        color: #001746;
        font-weight: bolder;
        font-size: 26px;
        padding-bottom: 25px;
        padding-top: 25px;
        margin-bottom: 0px;
        margin-left: 12px;
    }

    .atten-graph .back-img-percrnt p {
        position: relative;
        top: 35.5%;
        left: 16.8%;
        font-size: 38px;
        font-weight: bolder;
        margin-bottom: 0px;
        color: #000;
    }


    .learning-progress-sec-02 {
        background-color: #fdfdfd;
        border-radius: 8px;
        border: 1px solid #e0e4ed;
        margin-top: 40px;
        padding-top: 25px;
    }

    .percentag-para-sec-02 {
        position: relative;
        font-size: 38px;
        font-weight: bolder;
        margin-bottom: 0px;
        color: #001746;
        bottom: 49.5%;
        left: 45%;
    }

    .learning-progress-sec-02 .col-lg-5 {
        padding-top: 25px;
        padding-left: 28px;
        padding-bottom: 25px;
    }

    .learning-progress-sec-02 h3 {
        margin-bottom: 20px;
    }

    .sec-01-01 {
        border-right: 1px solid #e0e4ed;
    }

    .learning-progress-sec-02 .col-lg-7 {
        padding-top: 25px;
        padding-left: 28px;
        padding-bottom: 25px;
        padding-right: 40px;
    }

    .remain-task-01 {
        padding: 15px 0px;
        padding-left: 15px !important;
    }

    .remain-task-01 img {
        float: left;
        margin-right: 10px;
    }

    .remain-task-01 h6 {
        margin-left: 10 !important;
    }

    .remian-task-02 {
        border-bottom: 1px solid;
        border-bottom-style: dashed;
    }

    .remain-task-01:hover {
        background-color: #fce9e9;
    }

    .topic-progress {
        border: 1px solid #ededed;
        background-color: #fdfdfd;
        border-radius: 8px;
        padding-left: 20px;
        padding-top: 20px;
        height: 300px;
        overflow: auto;
        margin-top: 15px;
    }

    .topic-progress .row {
        align-items: center;
        border-bottom: 1px solid;
        border-bottom-style: dotted;
        margin: 15 15;
        margin-left: 0px;
    }

    .topic-progress .row-2 {
        align-items: center;
        border: none;
        margin: 15 15;
        margin-left: 0px;
    }

    .topic-progress h5 {
        margin-bottom: 15px;
    }

    .Your-Video-Progress {
        border: 1px solid #ededed;
        background-color: #fdfdfd;
        border-radius: 8px;
        padding-left: 15px;
        padding-top: 20px;
        height: 300px;
        margin-top: 15px;
    }

    .Your-Video-Progress p {
        font-size: 16px;
        color: #949494;
        font-weight: 500;
    }

    .Your-Video-Progress h6 {
        margin-bottom: 0px;
    }

    .img-col {
        width: 19%;
        float: left;
    }

    .progre-sec-1 {
        margin-right: 7px;

    }

    .progre-sec-2 {
        margin-right: 7px;
        border-bottom: 1px solid;
        border-bottom-style: dashed;
        padding-bottom: 15px;
        margin-bottom: 15px;

    }

    .topic-progress h5 {
        color: #001847;
        font-weight: bold;
    }

    .Your-Video-Progress h5 {
        color: #001847;
        font-weight: bold;
        padding-bottom: 15px;
    }

    .info-data-main {
        text-align: left;
    }

    .my-information {
        background-color: #f2f5fd;
        border-radius: 8px;
        height: 353px;
    }

    html,
    body {
        overflow-x: hidden;
    }
</style>





@section('page_content')
<!-- <div class="col-8 "> -->



<div class="main_wrapper_show">
    <div class="main_dashborad_heading">
        <div>
            <span style="display: inline-flex;">
                <img src="{{asset('images/Dashboard-new-user-avatr-logo-01_03.png')}}" alt=""><span>
                    <h2 style="margin: 0px;">Welcome back,<span style="color: #001746;"> Mubbashir</span></h2>
                    <h3 style="margin: 0px;">Here is your progress so far keep up the great work</h3>
                </span>
            </span>
        </div>
    </div>
    <div>
        <div class="my-information">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 " style="padding: 0px;">
                        <div class="info-data-main">
                            <h5>My Information</h5>
                            <hr>
                            <h6>Age: <span>35</span> Years</h6>
                            <h6>Gender: <span>Male</span> <img src="{{asset('images/Dashboard-newUK-Flag-main_07.png')}}" alt=""> UK</h6>
                            <h6>Weight: <span>177</span> lbs</h6>
                            <h6>Primary Insurance: <span>AARP Healthcare Option</span><br> PO BOX 740819 /
                                Atlanta, GA</h6>
                            <a href="#">History of Login</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 style="color: #001746; font-weight:700">Attendance</h3>
                        <span class="back-img-percrnt">
                            <!-- <img src="/images/Dashboard-loader-1_03.png" alt=""> -->
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- laearning Progress and Remaining Task -->
    <div class="col-12  learning-progress-sec-02">
        <div class="row">
            <div class="col-lg-5 col-md-8">
                <h3>Your Learning Progress</h3>
                <div class="row sec-01-01">
                    <div class="col-lg-6">

                        <div class="progress-bar1" data-percent="20" data-duration="1000" data-color="#ccc,#E74C3C"></div>

                    </div>
                    <div class="col-lg-6">
                        <img style="float:left;" src="{{asset('images/percent-chek-box_03.png')}}" alt="">
                        <h6 style="margin-left: 25px; margin-top: 0px;">75%
                            Student Learning
                            Completed </h6>
                        <img style="float:left;margin-top: 130px;" src="{{asset('images/Dashboard-new-check-box-instnat_03.png')}}" alt="">
                        <h6 style="margin-top: 135px;margin-left: 25px;">75%
                            Student Learning
                            Completed </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h3>Remaining Task</h3>
                <div class="remain-task-01 remian-task-02">
                    <img src="{{asset('images/Dashboard-newyellow-check-box-01_03.png')}}" alt="">
                    <h6>Science of Learning, how people Learn?</h6>
                    <!-- <img src="images/Dashboard-newcross-image-011_07.png" alt=""> -->
                </div>
                <div class="remain-task-01 remian-task-02"><img src="{{asset('images/Dashboard-newyellow-check-box-01_03.png')}}" alt="">
                    <h6>Science of Learning, how people Learn?</h6>
                </div>
                <div class="remain-task-01 remian-task-02"><img src="{{asset('images/Dashboard-newyellow-check-box-01_03.png')}}" alt="">
                    <h6>Science of Learning, how people Learn?</h6>
                </div>
                <div class="remain-task-01"><img src="{{asset('images/Dashboard-newyellow-check-box-01_03.png')}}" alt="">
                    <h6>Science of Learning, how people Learn?</h6>
                </div>
            </div>
        </div>
    </div>
    <div>
        <section>
            <div class="col-lg-12" style="padding: 0;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="topic-progress">
                            <h5>Your Topic Progress</h5>
                            @php

                            $idss = 1;
                            @endphp
                            @foreach ($data_module as $list)

                            <div class="row">

                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-book-img_07.png')}}" alt="">
                                </div>
                                <div class="col-lg-10">
                                    <img src="{{asset('images/Dashboard-new-module-1_03.png')}}" alt=""> : {{$idss++}}
                                    @php
                                    echo "<br>";
                                    @endphp
                                    Topic : {{$list->topic}}
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div>
                            @endforeach
                            <!-- <div class="row row-2">
                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-book-img_07.png')}}" alt=""></div>
                                <div class="col-lg-10">
                                    <h6>Topic : <br>
                                        Characteristics of a ‘good’ T-L experience</h6>
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div>
                            <img src="{{asset('images/Dashboard-new-module-2_10.png')}}" alt="">
                            <div class="row row-2">
                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-book-img_07.png')}}" alt=""></div>
                                <div class="col-lg-10">
                                    <h6>Topic : <br>
                                        Characteristics of a ‘good’ T-L experience</h6>
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div>
                            <div class="row row-2">
                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-book-img_07.png')}}" alt=""></div>
                                <div class="col-lg-10">
                                    <h6>Topic : <br>
                                        Characteristics of a ‘good’ T-L experience</h6>
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div> -->
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="Your-Video-Progress">
                            <h5>Your Video Progress</h5>
                            <div class="row progre-sec-1">
                                <div class="col-lg-3"><img src="{{asset('images/Dashboard-new-history-book-img_06.png')}}" alt=""></div>
                                <div class="col-lg-9">
                                    <h6>History of Health Professions Educations</h6>
                                    <p>Result:</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row progre-sec-2">
                                    <div class="img-col">
                                        <h6>First</h6>
                                        <img src="{{asset('images/Dashboard-new-progress-bar-1_03.png')}}" alt="">
                                    </div>
                                    <div class="img-col">
                                        <h6>Second</h6>
                                        <img src="{{asset('images/Dashboard-new-progress-bar-2_05.png')}}" alt="">
                                    </div>
                                    <div class="img-col">
                                        <h6>Third</h6>
                                        <img src="{{asset('images/Dashboard-new-progress-bar-3_07.png')}}" alt="">
                                    </div>
                                    <div class="img-col">
                                        <h6>Fourth</h6>
                                        <img src="{{asset('images/Dashboard-new-progress-bar-4_09.png')}}" alt="">
                                    </div>
                                    <div class="img-col">
                                        <h6>Five</h6>
                                        <img src="{{asset('images/Dashboard-new-progress-bar-5_11.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row progre-sec-1">
                                <div class="col-lg-3"><img src="{{asset('images/Dashboard-new-history-world-img_14.png')}}" alt=""></div>
                                <div class="col-lg-9">
                                    <h6>History of Health Professions Educations</h6>
                                    <p>Result:</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="topic-progress">
                            <h5>Your Video Progress</h5>
                            @php

                            $idss = 1;
                            @endphp

                            @foreach ($data_module as $list)
                            <div class="row">
                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-video-directory_13.png')}}" alt="">
                                </div>


                                <div class="col-lg-10">
                                    <img src="{{asset('images/Dashboard-new-module-1_03.png')}}" alt=""> : {{$idss++}}
                                    @php
                                    echo "<br>";
                                    @endphp
                                    Topic : {{$list->video_title}}
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div>
                            @endforeach

                        </div>


                    </div>
                    <div class="col-lg-6">
                        <div class="topic-progress">
                            <h5>Your Assessment Progress</h5>
                            @php

                            $idss = 1;
                            @endphp

                            @foreach ($data_module as $list)
                            <div class="row">
                                <div class="col-lg-1"><img src="{{asset('images/Dashboard-new-topic-video-directory_13.png')}}" alt="">
                                </div>


                                <div class="col-lg-10">
                                    <img src="{{asset('images/Dashboard-new-module-1_03.png')}}" alt=""> : {{$idss++}}
                                    @php
                                    echo "<br>";
                                    @endphp
                                    Topic : {{$list->asessment_title}}
                                </div>
                                <div class="col-lg-1"> <input type="checkbox" name="" id=""></div>
                            </div>
                            @endforeach

                         
                        </div>


                    </div>
                    <div class="col-lg-6" style="margin: 2rem 0rem;visibility: hidden;">

                        sadasdasd
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>














@endsection

@section('footer')
@include('student/include/footer')
@endsection

@section('js')


<!-- learning progress bar -->





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
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>


<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
@stop