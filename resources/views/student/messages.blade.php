@extends('student/layout/master_templete')

@section('title')
    <title> Messages </title>
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
			<div class="inner-page-wrapper-message">
				<div class="col-lg-12">
                    <div class="ecologies-main">
                        <h2 class="gy-hdng">e-Learning Ecologies:</h2>
                        <h3 class="sub-hdng">Innovative Approaches to Teaching and Learning for the Digital Age</h3>
                        <p>by Medvisty</p>
                       
                    </div>
                </div>
                <div class="col-lg-12">
                    

                    <div class="media border p-3">
                        <!-- <div class="media-content"> -->
                            <img src="images/new_person_03.png" alt="John Doe" class="mr-3 mt-3 rounded-circle">
                            <p>Welcome to e-Learning Ecologies: Innovative Approaches to Teaching and <br>
                                Learning for the Digital Age
                                </p>
                        
                      
                        <div class="media-body">
                          
                          <p>Welcome to e-Learning Ecologies: Innovative Approaches to Teaching and Learning for the Digital Age! We’re glad you’re <br>
                            here. Start learning today by watching your first video: Welcome to e-Learning Ecologies!.
                            </p>  
                        </div>  
                        
                        <div class="media-body-left-content">
                            <button type="button" class="btn btn-link">Go to first video <i class="fa fa-caret-right" aria-hidden="true"></i> </button>
                        </div>
                        <div class="media-body-right-content">
                            <h4> <small>6 days ago </small></h4>
                        </div>
                          
                        </div>
                      </div>
                      <div class="col-lg-12">
                    

                        <div class="media border p-3">
                            <!-- <div class="media-content"> -->
                                <img src="images/new_person_03.png" alt="John Doe" class="mr-3 mt-3 rounded-circle">
                                <p>Welcome to e-Learning Ecologies: Innovative Approaches to Teaching and <br>
                                    Learning for the Digital Age
                                    </p>
                            
                          
                            <div class="media-body">
                              
                              <p>Welcome to e-Learning Ecologies: Innovative Approaches to Teaching and Learning for the Digital Age! We’re glad you’re <br>
                                here. Start learning today by watching your first video: Welcome to e-Learning Ecologies!.
                                </p>  
                            </div>  
                            
                            <div class="media-body-left-content">
                                <button type="button" class="btn btn-link">Go to first video <i class="fa fa-caret-right" aria-hidden="true"></i> </button>
                            </div>
                            <div class="media-body-right-content">
                                <h4> <small>6 days ago </small> </h4>
                            </div>
                              
                            </div>
                          </div>
						</div>
@endsection