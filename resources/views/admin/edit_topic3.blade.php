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
	<h1 class="h3 mb-2 text-gray-800">Edits Topic</h1>
	<form id="" method="post" action="{{ url('admin/doupdate_topic') }}" onsubmit="return Validation()">
		@csrf
		<ul style="color:red;margin-left: -25px;" id="empty_topic_error" ></ul>
	  <div class="form-group">
		<label for="topic_name"> Topic </label>
			<input type="text" value="{{ $topic[0]['topic'] }}" name="topic_name" class="form-control" id="topic_name" placeholder="Topic">
		<ul class='name-error-msg' style='color:red'></ul>
	  </div>
		@foreach($topic[0]['topics_data'] as $data)
			@if($data['type']=="V")
			  <div class="form-group" data-id="{{ $data['id'] }}" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
				<input type="hidden" name="type[]" value="V" />
				<label for="exampleFormControlInput1"> Video URL </label>
				<input type="text" name="video_url[]" value="{{ $data['video_url'] }}" class="form-control video_url" id="exampleFormControlInput1" placeholder="Video URL">
				<label for="exampleFormControlInput1"> Video Title </label>
				<input type="text" name="video_title[]" value="{{ $data['video_title'] }}" class="form-control video_title" id="exampleFormControlInput1" placeholder="Video Title">
				<label for="exampleFormControlTextarea1"> Video Content </label>
				<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Video Content">{{ $data['content'] }}</textarea>
				</br>
				<button type="button" class="btn btn-danger remove_video"> Remove </button>
			  </div>
			@else
			  <div class="form-group" data-id="{{ $data['id'] }}" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
				<input type="hidden" name="type[]" value="R" />
				<input type="hidden" name="video_url[]" value="" />
				<input type="hidden" name="video_title[]" value="" />
				<label for="exampleFormControlTextarea1">Reading content</label>
				<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Reading Content">{{ $data['content'] }}</textarea>
				</br>
				<button type="button" class="btn btn-danger remove_video"> Remove </button>
			  </div>
			@endif
		@endforeach
	  
		<div id="add_on_click">
			
		</div>
	  
	  	<button type="button" class="btn btn-success add_video">+ Add Video Content </button>
		<button type="button" class="btn btn-success add_reading">+ Add Reading Content </button>
	  
	  <input type="hidden" name="week_id" value="{{ $topic[0]['week_id'] }}" />
	  <input type="hidden" name="topic_id" value="{{ $topic[0]['id'] }}" />
	  </br>
	  </br>
		<?php $topic_id=$topic[0]["id"]; ?>
		<button type="submit" class="btn btn-primary"> Update </button>
	  </br>
	  </br>
	</form>

	<div style="display:none" id="video_content" >
	  <div class="form-group" data-id="" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
		<input type="hidden" name="type[]" value="V" />
		<label for="exampleFormControlInput1"> Video URL </label>
		<input type="text" name="video_url[]" class="form-control video_url" id="exampleFormControlInput1" placeholder="Video URL">
		<label for="exampleFormControlInput1"> Video Title </label>
		<input type="text" name="video_title[]" class="form-control video_title" id="exampleFormControlInput1" placeholder="Video Title">
		<label for="exampleFormControlTextarea1"> Video Content </label>
		<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Video Content"></textarea>
		</br>
		<button type="button" class="btn btn-danger remove_video"> Remove </button>
	  </div>
	</div>
	
	<div style="display:none" id="reading_content" >
	  <div class="form-group" data-id="" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
		<input type="hidden" name="type[]" value="R" />
		<input type="hidden" name="video_url[]" value="" />
		<input type="hidden" name="video_title[]" value="" />
		<label for="exampleFormControlTextarea1">Reading content</label>
		<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Reading Content"></textarea>
		</br>
		<button type="button" class="btn btn-danger remove_video"> Remove </button>
	  </div>
	</div>
	
	</div>
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
	<script>
	
	
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	
		$(document).on('click','.remove_video',function(){
			if(confirm('Are you sure! You want Remove?')){
				var id=$(this).parent().data('id');
				$(this).parent().remove();
				
				if(id){
					$.ajax({
						url: "{{ url('/teacher/dodeletetopicdata') }}",
						type:'POST',
						data: {id:id},
						success: function(data) {
							//alert(data);
						}
					});
				}
			}
		});
	
    

		$('.add_video').click(function(){
			$('#add_on_click').append($('#video_content').html());
		});
		
		$('.add_reading').click(function(){
			$('#add_on_click').append($('#reading_content').html());
		});


	});
	
	
	
	function Validation()  
	{    
		var isValid = true;    
		
		var classname = 'content'; 
		
		if($('#topic_name').val()==''){
			isValid = false;
			$('#topic_name').css('border','1px solid red');    
		}  
		else  
		{    
			$('#topic_name').css('border','1px solid #ccc');
			
			$('#empty_topic_error').html('');
			if($('form .' + classname + '').length==0){
				$('#empty_topic_error').html('<li>Add Reading/Video Content</li>');
				isValid = false;
			}
			
		} 
		
		
		
		
		   
		
		$('form .' + classname + '').each(function (i, obj)  
		{    
			if (obj.value == '')  
			{    
				isValid = false;    
				//return isValid;    
			}    
		});    
		
		
		var video_url = 'video_url';  
		$('form .' + video_url + '').each(function (i, obj)  
		{    
			if (obj.value == '')  
			{    
				isValid = false;    
				//return isValid;    
			}
			
			var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
			if(!obj.value.match(p)){
				isValid = false; 
			}
			
		});
		
		
		var video_title = 'video_title';  
		$('form .' + video_title + '').each(function (i, obj)  
		{    
			if (obj.value == '')  
			{    
				isValid = false;    
				//return isValid;    
			}    
		});
		//video_url
		if (!isValid)  
		{   
			
			$('form .' + video_url + '').each(function (i, obj)  
			{    
				var p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
				
				if (obj.value == '')  
				{    
					obj.style.border = '1px solid red';    
				}
				else if(!obj.value.match(p)){
					obj.style.border = '1px solid red';    
				}
				else  
				{    
					obj.style.border = '1px solid #ccc';    
				}    
			});
			
			
			$('form .' + video_title + '').each(function (i, obj)  
			{    
				if (obj.value == '')  
				{    
					obj.style.border = '1px solid red';    
				}  
				else  
				{    
					obj.style.border = '1px solid #ccc';    
				}    
			});
			
			
			$('form .' + classname + '').each(function (i, obj)  
			{    
				if (obj.value == '')  
				{    
					obj.style.border = '1px solid red';    
				}  
				else  
				{    
					obj.style.border = '1px solid #ccc';    
				}    
			});   
		}
		return isValid;    
	}   

	</script>
@endsection