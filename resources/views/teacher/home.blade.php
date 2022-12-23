@extends('teacher/layout/master_templete')

@section('title')
    <title> Home </title>
@endsection

@section('nav')
	
    @include('teacher/include/nav')
@endsection

@section('sidebar')
    @include('teacher/include/sidebar')
@endsection

@section('page_content')
	
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
<script>
    jQuery(document).ready(function(){
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