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
	<h1 class="h3 mb-2 text-gray-800">Update User</h1>
	<form id="add_user">
		@csrf
	  <div class="form-group">
		<label for="exampleFormControlInput1">Full Name</label>
		<input type="text" name="name" class="form-control" value="{{ $user->name }}" id="exampleFormControlInput1" placeholder="Full Name">
		<ul class='name-error-msg' style='color:red'></ul>
	  </div>

	  <div class="form-group">
		<label for="exampleFormControlInput1">Email</label>
		<input type="text" name="email" class="form-control" value="{{ $user->email }}" id="exampleFormControlInput1" placeholder="Email">
		<ul class='email-error-msg' style='color:red'></ul>
	  </div>
	  
	  
	  
	  <div class="form-group">
		<label>Role</label>
		<select name="role" class="form-control" style="width: 30%;">
			<option value=""  > Select Role </option>
			<option value="2" @if($user->role_type==2) selected @endif > Teacher </option>
			<option value="3" @if($user->role_type==3) selected @endif > Student </option>
		</select>
		<ul class='role-error-msg' style='color:red'></ul>
	  </div>
	  
	  <div class="form-group">
		<label>Student</label>
		<select name="status" class="form-control" style="width: 30%;">
			<option value="A" @if($user->status=='A') selected @endif > Active </option>
			<option value="I" @if($user->status=='I') selected @endif > Inactive </option>
		</select>
		<ul class='status-error-msg' style='color:red'></ul>
	  </div>
	  
	  <input type="hidden" name="id" value="{{ $user->id }}" >
	  <button type="submit" class="btn btn-primary">Update User</button>
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

                url: "{{ url('/admin/doedituser') }}",

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
						$(".role-error-msg").html('');
						$(".status-error-msg").html('');
						
						
						if(data.error_name!=""){
							$(".name-error-msg").append('<li>'+data.error_name+'</li>');
						}
						
						
						if(data.error_status!=""){
							$(".status-error-msg").append('<li>'+data.error_status+'</li>');
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