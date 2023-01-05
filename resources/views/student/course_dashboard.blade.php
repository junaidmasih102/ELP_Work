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
        border-bottom: 1px solid #c9cbd2;
        padding-bottom: 25px;
        margin-bottom: 30px;
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
        height: 353px;
    }
</style>






@section('page_content')















<div>
    e
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