@extends('admin/layout/master_templete')

@section('title')
    <title> Home </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
    <div class="col-md-4 col-sm-4 col-xs-4">
        <div class="">
            <h4>Students</h4>
            <p>{{ count($users) }}</p>
        </div>
    </div>
@endsection

@section('footer')
    @include('admin/include/footer')
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
@endsection
