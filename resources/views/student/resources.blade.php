@extends('student/layout/master_templete')

@section('title')
    <title> Resources </title>
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
                <h1 class="Resources-main-heading">Additional Resources</h1>
                </div>

                <div class="col-lg-12">
                    <div class="Resources-inner-background">
                        <h2 class="Resources-headings"><img src="images/Notes1_03.png" class="Peer-image" alt="">Sign Up To CGScholar and our New Learning Blog</h2>
                        <h5 class="Sign-Up">Sign Up for a <span class="Sign-Up-span">free CG Scholar Account.</span></h5>
                        <h5 class="Sign-Up">Join our New Learning <span class="Sign-Up-span">Community in CGScholar.</span></h5>
                        <h5 class="Sign-Up">Find out more <span class="Sign-Up-span">about CGScholar.</span></h5>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="Resources-inner-background">
                        <h2 class="Resources-headings"><img src="images/Notes1_03.png" class="Peer-image" alt="">Access Related Resources</h2>
                        <h5 class="Sign-Up">This course is based on the book, <span class="Sign-Up-span">e-Learning Ecologies.</span></h5>
                        <h5 class="Sign-Up">Additional resources are available <span class="Sign-Up-span">on our website.</span></h5>
                        <h5 class="Sign-Up">In particular, you may find the <span class="Sign-Up-span">Five Theses on the Future of Learning </span>video series helpful.</h5>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="Resources-inner-background">
                        <h2 class="Resources-headings"><img src="images/Notes1_03.png" class="Peer-image" alt="">Take Our Other MOOCs</h2>
                        <p class="Resources-course">This course is one of a series of eight MOOCs created by Bill Cope and Mary Kalantzis for the Learning Design and Leadership
                            program at the University of Illinois. If you find this MOOC helpful, please join us in others! </p>
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">e-Learning Ecologies: Innovative Approaches to Teaching and Learning for the Digital Age </p>
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">New Learning: Principles and Patterns of Pedagogy </p>       
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Assessment for Learning </p>   
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Learning, Knowledge, and Human Development</p>   
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Ubiquitous Learning and Instructional Technologies </p>   
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Negotiating Learner Differences: Towards Productive Diversity in Learning </p>   
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Literacy Teaching and Learning: Aims, Approaches and Pedagogies </p>   
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Multimodal Literacies: Communication and Learning in the Era of Digital Media </p>   
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="Resources-inner-background">
                        <h2 class="Resources-headings"><img src="images/Notes1_03.png" class="Peer-image" alt="">Join our Fully Online Certificate, Masters and Doctoral Programs</h2>
                        <p class="Resources-course">You can also take this course for credit in our online Learning Design and Leadership Program at the University of Illinois. This
                            course has the same content and anticipates the same level of contribution by students in the e-Learning Ecologies course
                            offered to graduate certificate, masters, and doctoral level students in the Learning Design and Leadership Program in the
                            College of Education:</p>
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Information about the Learning Design and Leadership Program</p>
                        <p class="Resource-MOOCs"><img src="images/dot-icon_03.png" class="dot-icon" alt="">Apply to Join the Learning Design and Leadership Program</p>       
                    </div>
                </div>

@endsection


@section('js')
    <script>
$('#html').LineProgressbar({
        percentage: 92,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#e9837f'
    });
    $('#html2').LineProgressbar({
        percentage: 92,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#e9837f'
    });
    $('#html3').LineProgressbar({
        percentage: 92,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#e9837f'
    });
    $('#html4').LineProgressbar({
        percentage: 60,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#26415a'
    });
    $('#html5').LineProgressbar({
        percentage: 60,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#26415a'
    });
    $('#html6').LineProgressbar({
        percentage: 60,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#26415a'
    });
    $('#html7').LineProgressbar({
        percentage: 60,
        radius: '3px',
        height: '6px',
        fillBackgroundColor: '#26415a'
    });
</script>
@endsection
