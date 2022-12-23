@extends('admin/layout/master_templete')

@section('title')
    <title> Add Course </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
	
	<div style="padding: 0px 40px;">
	<h1 class="h3 mb-2 text-gray-800">Add Course</h1>
	<form id="add_course">
		@csrf
	  <div class="form-group">
		<label for="exampleFormControlInput1">Course Name</label>
		<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Course Name">
		<ul class='name-error-msg' style='color:red'></ul>
	  </div>

	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Summary</label>
		<textarea name="summary" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Course Summary" ></textarea>
		<ul class='summary-error-msg' style='color:red'></ul>
	  </div>
	  
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">About Course</label>
		<textarea name="about_course" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="About Course"></textarea>
		<ul class='about_course-error-msg' style='color:red'></ul>
	  </div>
	  
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Course Skills</label>
		<textarea name="skills" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Skills Separate with Comma like Programming Language,Algorithms"></textarea>
		<ul class='skills-error-msg' style='color:red'></ul>
	  </div>
	  
	  <div class="form-group">
		<label class="" >Select Image</label>
		<input type="file" class="form-control" name="image">
		<ul class='image-error-msg' style='color:red'></ul>
	  </div>
	  
	  <button type="submit" class="btn btn-primary">Add Course</button>
	</form>
<div>
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
	<script>
    $(document).ready(function() {
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
        $("#add_course").unbind("submit").submit(function(e){
		
             e.preventDefault();
			let formData = new FormData(this);
			
			
            $.ajax({

                url: "{{ url('/admin/doaddcourse') }}",

                type:'POST',

                data: formData,
				contentType: false,
				processData: false,
                success: function(data) {
					
				
                    if($.isEmptyObject(data.error)){
						
						window.location.href = "{{url('/admin/view_added_courses')}}";
						
						
                    }else{
                        //printErrorMsg(data.error);
						$(".name-error-msg").html('');
						$(".summary-error-msg").html('');
						$(".about_course-error-msg").html('');
						$(".skills-error-msg").html('');
						$('.image-error-msg').html('');
						
						if(data.error_name!=""){
						$(".name-error-msg").append('<li>'+data.error_name+'</li>');
						}
						
						
						if(data.error_summary!=""){
						$(".summary-error-msg").append('<li>'+data.error_summary+'</li>');
						}
						
						if(data.error_about_course!=""){
						$(".about_course-error-msg").append('<li>'+data.error_about_course+'</li>');
						}
						
						if(data.error_skills!=""){
						$(".skills-error-msg").append('<li>'+data.error_skills+'</li>');
						}
						
						if(data.error_image!=""){
						$(".image-error-msg").append('<li>'+data.error_image+'</li>');
						}
                    }

                }

            });

       

        }); 

	});
	</script>
@endsection