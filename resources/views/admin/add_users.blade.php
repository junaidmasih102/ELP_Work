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
	<h1 class="h3 mb-2 text-gray-800">Add User</h1>
	<form id="add_user">
		@csrf
	  <div class="form-group">
		<label for="exampleFormControlInput1">Full Name</label>
		<input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Full Name">
		<ul class='name-error-msg' style='color:red'></ul>
	  </div>

	  <div class="form-group">
		<label for="exampleFormControlInput1">Email</label>
		<input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
		<ul class='email-error-msg' style='color:red'></ul>
	  </div>
	  
	  
	  <div class="form-group">
		<label for="exampleFormControlInput1">Password</label>
		<input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
		<ul class='password-error-msg' style='color:red'></ul>
	  </div>
	  
	  <div class="form-group">
		<label>Role</label>
		<select name="role" class="form-control" style="width: 30%;">
			<option value=""> Select Role </option>
			<option value="2"> Teacher </option>
			<option value="3"> Student </option>
		</select>
		<ul class='role-error-msg' style='color:red'></ul>
	  </div>
	  
	  
	  
	  <button type="submit" class="btn btn-primary">Add User</button>
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
	
        $("#add_user").unbind("submit").submit(function(e){
		
             e.preventDefault();
			let formData = new FormData(this);
			
			
            $.ajax({

                url: "{{ url('/admin/doadduser') }}",

                type:'POST',

                data: formData,
				contentType: false,
				processData: false,
                success: function(data) {
					
				
                    if($.isEmptyObject(data.error)){
						
						window.location.href = "{{url('/admin/users')}}";
						
						
                    }else{
                        //printErrorMsg(data.error);
						$(".name-error-msg").html('');
						$(".email-error-msg").html('');
						$(".password-error-msg").html('');
						$(".role-error-msg").html('');
						
						
						if(data.error_name!=""){
						$(".name-error-msg").append('<li>'+data.error_name+'</li>');
						}
						
						
						if(data.error_password!=""){
						$(".password-error-msg").append('<li>'+data.error_password+'</li>');
						}
						
						if(data.error_email!=""){
						$(".email-error-msg").append('<li>'+data.error_email+'</li>');
						}
						
						if(data.error_role!=""){
						$(".role-error-msg").append('<li>'+data.error_role+'</li>');
						}
                    }

                }

            });

       

        }); 

	});
	</script>
@endsection