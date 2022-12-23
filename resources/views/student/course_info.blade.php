@extends('student/layout/master_templete')

@section('title')
    <title> Cource Info </title>
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
                    <h1 class="Course-Info-heading-1">e-Learning Ecologies:</h1>
                    <h1 class="Course-Info-heading-2">Innovative Approaches to Teaching and Learning for the Digital Age</h1>
                    <p class="Course-Info-heading-3">by Medvisty</p>
                </div>

                <div class="col-lg-12">
                    <div class="Course-Info-inner-background">

                        <div class="Course-Info-inner-background2">
                            <h3 class="Course-h3"><img src="{{ asset('images/Notes1_03.png')}}" class="Peer-image" alt="">About this Course</h3>
                            <p class="Course-Info-p">For three decades and longer we have heard educators and technologists making a case for the transformative power of
                            technology in learning. However, despite the rhetoric, in many ways and at most institutional sites, education is still relatively
                            untouched by technology. Even when technologies are introduced...</p>
                
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

                <div class="Organization-Leadership">
                <div class="course-info-col-left"><img src="{{ asset('images/Course-Info-man_03.png')}}" class="man" alt=""></div>
                <div class="course-info-col-right">
                    <h2 class="Course-Info-Taught">Taught by:</h2>
                    <h1 class="Course-Info-Professor">Dr William Cope, <span>Professor</span></h1>
                    <p class="Course-Info-Department">Department of Education Policy, Organization & Leadership, College of Education</p>
                </div>
                </div>
                
                <div class="Organization-Leadership">
                    <div class="course-info-col-left"><img src="images/Course-Info-gir_03.png" class="man" alt=""></div>
                    <div class="course-info-col-right">
                        <h2 class="Course-Info-Taught">Taught by:</h2>
                        <h1 class="Course-Info-Professor">Dr Mary Kalantzis, <span>Professor</span></h1>
                        <p class="Course-Info-Department">Department of Education Policy, Organization & Leadership, College of Education</p>
                </div>
                </div>
                
                
                <div class="Course-Info-inner-background3">

                <div class="Course-Info-inner-background3-1">
                    <ul>
                        <li class="Course-Info-inner-background3-lef"><h2 class="Course-Info-inner-background3-left"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">Commitment</h2></li>
                        <li class="Course-Info-inner-background3-right"><p class="Course-Info-inner-background3-right-p">4 Weeks 12 Hours per week</p></li>
                    </ul>
                </div>
               

                <div class="Course-Info-inner-background3-2">
                    <ul>
                        <li class="Course-Info-inner-background3-lef1"><h2 class="Course-Info-inner-background3-left1"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">Language</h2></li>
                        <li class="Course-Info-inner-background3-right"><p class="Course-Info-inner-background3-right-pp">English, Subtitles: Arabic, French, Portuguese (European), Chinese (Simplified), Italian,
                            Vietnamese, Korean, German, Russian, Turkish,<br> <span class="Course-Info-inner-background3-right-p-span">Volunteer to translate subtitles for this course </span><i class="fa fa-angle-right info-rigth-icon"></i></p></li>
                    </ul>
                </div>

                <div class="Course-Info-inner-background3-1">
                    <ul>
                        <li class="Course-Info-inner-background3-lef"><h2 class="Course-Info-inner-background3-left"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">How To Pass</h2></li>
                        <li class="Course-Info-inner-background3-right"><p class="Course-Info-inner-background3-right-p">Pass all graded assignments to complete the course.</p></li>
                    </ul>
                </div>

                <div class="Course-Info-inner-background3-1">
                    <ul>
                        <li class="Course-Info-inner-background3-lef"><h2 class="Course-Info-inner-background3-left"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">User Ratings</h2></li>
                        <li class="Course-Info-inner-background3-right"><p class="Course-Info-inner-background3-right-p"><img src="{{ asset('images/Course-Info-stars_03.png')}}" class="star-window" alt=""> Average User Rating 4.6</p></li>
                    </ul>
                </div>









                


                </div>

                   
             
    

                </div>
                
                </div>
            <div class="col-lg-12">
                <h1 class="Syllabus">Syllabus</h1>
                <div class="Syllabus-background">
                    <h2 class="Syllabus-h2"><img src="images/Course-Info-clander_11.png" alt="" class="clander">Week 1</h2>
                    <h3 class="Syllabus-h3">Module 1: Course Orientation + Ubiquitous Learning</h3>
                    <p class="Syllabus-p">We begin this module with an introduction to the idea of an "e-learning ecology" and the notion of "affordance." We use this
                        idea to map the range of innovative activities that we may be able to use in e-learning environments – not that we necessarily
                        do. Many e-learning environments simply reproduce the worst of old, didactic pedagogies. We then go on to explore the notion
                        of "ubiquitous learning," the first of seven "affordances" in computer-mediated educational applications and environments that
                        we examine in this course.</p>
                    <p class="Syllabus-p1"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">9 videos, 8 readings, 1 practice quiz <span class="Syllabus-p1-span1">Expand <i class="fa fa-angle-right info-rigth-icon"></i></span></p>   
                    <p class="Syllabus-p1"><img src="{{ asset('images/Course-Info-lock_07.png')}}" alt="" class="Info-lock">Graded: <span class="Syllabus-p1-span2">Essential Peer Reviewed Update #1</span></p>    
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row"></div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" style="color: #ffffff; background-color: #54b4e9;background-image: linear-gradient(to right, #3e9fd6 , #2486bf);font-family: 'Fontfabric---Mont-Bold';padding: 12px 25px;text-transform: uppercase;margin-left: 0px;" data-toggle="dropdown">View Full Syllabus<span class="caret" style="color: #ffffff!important;margin-left: 10px;"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Example</a></li>
                  <li class="disabled"><a href="#">Example</a></li>
                  <li class="active"><a href="#">Example</a></li>
                  <li><a href="#">Example</a></li>
                </ul>
            </div>
              </div>  
            


           


            <div class="col-lg-12">
                <h1 class="Syllabus">How It Works</h1>
                <div class="Syllabus-background">
                    <h2 class="Syllabus-h2"><img src="{{ asset('images/Course-Info-clander_11.png')}}" alt="" class="clander">General</h2>
                    <h3 class="Syllabus-h3">How do I pass the course?</h3>
                    <p class="Syllabus-p">To earn your Course Certificate, you’ll need to earn a passing grade on each of the required assignments—these can be quizzes,
peer-graded assignments, or programming assignments. Videos, readings, and practice exercises are there to help you prepare
for the graded assignments.</p>
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
                <div class="Syllabus-background">
                    <h2 class="Syllabus-h2"><img src="{{ asset('images/Course-Info-clander_11.png')}}" alt="" class="clander">General</h2>
                    <h3 class="Syllabus-h3">How do I pass the course?</h3>
                    <p class="Syllabus-p">To earn your Course Certificate, you’ll need to earn a passing grade on each of the required assignments—these can be quizzes,
peer-graded assignments, or programming assignments. Videos, readings, and practice exercises are there to help you prepare
for the graded assignments.</p>
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
    <a href="#" class="course-in-catalog">View the course in catalog<i class="fa fa-angle-right course-in-catalog-icon"></i></a>
    </div>


    <div class="col-lg-12">
        <h1 class="Syllabus">Related Courses</h1>
    </div>



  




<div class="col-lg-12">
    <div class="Related-Courses">
        <div class="Related-Courses-left"><img src="{{ asset('images/related-courses-1_07.png')}}" class="related-courses-1" alt=""></div>
        <div class="Related-Courses-right">
            <h3 class="col-Related-Courses-h3">Foundations of Teaching for Learning: Introduction to Student Assessment</h3>
            <p class="col-Related-Courses-p">University of California, Irvine</p>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="Related-Courses">
        <div class="Related-Courses-left"><img src="{{ asset('images/related-courses-2_07.png')}}" class="related-courses-1" alt=""></div>
        <div class="Related-Courses-right">
            <h3 class="col-Related-Courses-h3">Foundations of Teaching for Learning: Introduction to Student Assessment</h3>
            <p class="col-Related-Courses-p">University of California, Irvine</p>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="Related-Courses">
        <div class="Related-Courses-left"><img src="{{ asset('images/related-courses-3_07.png')}}" class="related-courses-1" alt=""></div>
        <div class="Related-Courses-right">
            <h3 class="col-Related-Courses-h3">Foundations of Teaching for Learning: Introduction to Student Assessment</h3>
            <p class="col-Related-Courses-p">University of California, Irvine</p>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="Related-Courses">
        <div class="Related-Courses-left"><img src="{{ asset('images/related-courses-4_07.png')}}" class="related-courses-1" alt=""></div>
        <div class="Related-Courses-right">
            <h3 class="col-Related-Courses-h3">Foundations of Teaching for Learning: Introduction to Student Assessment</h3>
            <p class="col-Related-Courses-p">University of California, Irvine</p>
        </div>
    </div>
</div>


@endsection