@extends('student/layout/master_templete')

@section('title')
    <title> Notes </title>
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
	
            <div class="inner-page-wrapper">
                <div class="col-lg-12">
                  <h1 class="note-main-heading">Notes</h1>
                    </div>
            


            <div class="col-lg-12">  
				<div class="color">
                <div class="dropdown note-full-width">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;text-align: left;margin-top: 1px;font-size: 20px;
                    color: #111111!important;background-color: transparent;"><span class="heading-All-Notes"> All Notes</span> 
                        <span ><i class="fa fa-angle-down note-icon"></i></span></button>
                        <ul style="width: 100%;" class="dropdown-menu"></span>
                      <li><a href="#">Example</a></li>
                      <li><a href="#">Example</a></li>
                      <li><a href="#">Example</a></li>
                    </ul>
                  </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="Essential-Peer">
                <h3 class="Essential-Peer-h3"><img src="images/Notes1_03.png" class="Peer-image" alt=""> Essential Peer Reviewed Update #1</h3>
                <p class="Essential-Peer-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                    book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Mo<span class="more-col-span">re</span> 
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Example</a></li>
                      <li class="disabled"><a href="#">Example</a></li>
                      <li class="active"><a href="#">Example</a></li>
                      <li><a href="#">Example</a></li>
                    </ul>
                  </div>  
                </div>      
            </div>


            <div class="col-lg-12">
                <div class="Essential-Peer">
                <h3 class="Essential-Peer-h3"><img src="images/Notes1_03.png" class="Peer-image" alt=""> Essential Peer Reviewed Update #1</h3>
                <p class="Essential-Peer-p">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                    book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
               
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle styling" type="button" data-toggle="dropdown">Mo<span class="more-col-span">re</span> 
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><a href="#">Example</a></li>
                      <li class="disabled"><a href="#">Example</a></li>
                      <li class="active"><a href="#">Example</a></li>
                      <li><a href="#">Example</a></li>
                    </ul>
                  </div>  
                </div>      
            </div>



            <div class="col-lg-12"> 
                <div class="doc">
					<img src="images/Notes2_07.png" alt="">
					<h2 class="doc-1">You have not added any notes yet.</h2>
					<h2 class="doc-2">Notes can be created from video pages.</h2>
                </div>
            </div>

            <div class="col-lg-12">  
            </div>
@endsection