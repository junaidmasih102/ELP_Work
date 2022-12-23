@extends('admin/layout/master_templete')

@section('title')
    <title> Edit Topic </title>
@endsection

@section('nav')
	
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
	<style>
	
	.q_cat {
		margin-bottom: 13px;
	}
	
	.q_cat span, .tf_div span {
		width: 59px;
		display: inline-block;
		background-color: #4aabe1;
		color: #fff;
		text-align: center;
		border-radius: 10px;
		padding: 1px 0px;
		cursor: pointer;
		
	}
	
	.tf_div span{
		width: 75px;
		text-align: left;
		padding-left: 10px;
		height: 29px;	
		padding-top: 2px;
		background-color: #d9534f;
		cursor: default;
	}
	
	.tf_div span label{
		cursor: pointer;
	}
	
	
	.tf_div span:first-child{
		background-color: #5cb85c;
	}
	
	.q_cat .active{
		background-color: red;
		cursor: default;
	}
	</style>
	
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
				<label for="exampleFormControlTextarea1"> Time : </label>
				<br>
				<input type="number" class="form-control col-sm-6 time_mint" style="width:49%" name="time_mint[]" min="0" value="@if(($data['time']/60)<10)0{{(integer)($data['time']/60)}}@else{{(integer)($data['time']/60)}}@endif" placeholder="Enter Mintues" />
				<span style="font-size: xx-large;width: 2%;float: left;padding: 0px 6px;margin-top: -8px;color: grey;">:</span>
				<input type="number" class="form-control col-sm-6 time_sec" style="width:49%;" name="time_sec[]" min="0"  value="@if(($data['time']%60)<10)0{{(integer)($data['time']%60)}}@else{{(integer)($data['time']%60)}}@endif" placeholder="Enter Seconds"/>
				</br>
				</br>
				<button type="button" class="btn btn-danger remove_video"> Remove </button>
			  </div>
			@elseif($data['type']=="R")
			  <div class="form-group" data-id="{{ $data['id'] }}" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
				<input type="hidden" name="type[]" value="R" />
				<input type="hidden" name="video_url[]" value="" />
				<label for="exampleFormControlInput1"> Reading Title </label>
				<input type="text" name="video_title[]" value="{{ $data['video_title'] }}" class="form-control video_title" id="exampleFormControlInput1" placeholder="Reading Title">
				<label for="exampleFormControlTextarea1">Reading content</label>
				<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Reading Content">{{ $data['content'] }}</textarea>
				<br>
				<input type="number" class="form-control col-sm-6 time_mint" style="width:49%" name="time_mint[]" min="0" value="@if(($data['time']/60)<10)0{{(integer)($data['time']/60)}}@else{{(integer)($data['time']/60)}}@endif" placeholder="Enter Mintues" />
				<span style="font-size: xx-large;width: 2%;float: left;padding: 0px 6px;margin-top: -8px;color: grey;">:</span>
				<input type="number" class="form-control col-sm-6 time_sec" style="width:49%;" name="time_sec[]" min="0"  value="@if(($data['time']%60)<10)0{{(integer)($data['time']%60)}}@else{{(integer)($data['time']%60)}}@endif" placeholder="Enter Seconds"/>
				</br>
				</br>
				<button type="button" class="btn btn-danger remove_video"> Remove </button>
			  </div>
			  
			@endif
		@endforeach
	  
		<div id="add_on_click">
			
		</div>
	  
	  	<button type="button" class="btn btn-success add_video">+ Add Video Content </button>
		<button type="button" class="btn btn-success add_reading">+ Add Reading Content </button>
		@if(isset($select_quiz))
			<a href='{{ url("admin/view_added_courses/edit_quiz/$topic_id") }}' class="btn btn-primary" ><i class="fa fa-edit"></i> Edit Quiz </a>
		@else
			<button type="button" class="btn btn-success add_quiz" onclick="appendText();">+ Add Quiz </button>
		@endif
	  <input type="hidden" name="week_id" value="{{ $topic[0]['week_id'] }}" />
	  <input type="hidden" name="topic_id" value="{{ $topic[0]['id'] }}" />
	  <input type="hidden" name="quiz_len" id="quiz_len" value="0" />
	  </br>
	  </br>
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
		<label for="exampleFormControlTextarea1"> Time : </label>
		<br>
		<input type="number" class="form-control col-sm-6 time_mint" style="width:49%" name="time_mint[]" min="0" value="" placeholder="Enter Mintues" />
		<span style="font-size: xx-large;width: 2%;float: left;padding: 0px 6px;margin-top: -8px;color: grey;">:</span>
		<input type="number" class="form-control col-sm-6 time_sec" style="width:49%;" name="time_sec[]" min="0"  value="" placeholder="Enter Seconds"/>
		</br>
		</br>
		<button type="button" class="btn btn-danger remove_video"> Remove </button>
	  </div>
	</div>
	
	<div style="display:none" id="reading_content" >
	  <div class="form-group" data-id="" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
		<input type="hidden" name="type[]" value="R" />
		<input type="hidden" name="video_url[]" value="" />
		<label for="exampleFormControlInput1"> Reading Title </label>
		<input type="text" name="video_title[]" class="form-control video_title" id="exampleFormControlInput1" placeholder="Reading Title">
		<label for="exampleFormControlTextarea1">Reading content</label>
		<textarea style="max-width:100%" name="content[]" class="form-control content" id="exampleFormControlTextarea1" rows="8" placeholder="Reading Content"></textarea>
		<label for="exampleFormControlTextarea1"> Time : </label>
		<br>
		<input type="number" class="form-control col-sm-6 time_mint" style="width:49%" name="time_mint[]" min="0" value="" placeholder="Enter Mintues" />
		<span style="font-size: xx-large;width: 2%;float: left;padding: 0px 6px;margin-top: -8px;color: grey;">:</span>
		<input type="number" class="form-control col-sm-6 time_sec" style="width:49%;" name="time_sec[]" min="0"  value="" placeholder="Enter Seconds"/>
		</br>
		</br>
		<button type="button" class="btn btn-danger remove_video"> Remove </button>
	  </div>
	</div>
	
	</div>
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
	<script>
	var a = 0;
	var q_counter=0;
	function appendText() {
		a = 1;
		q_counter++;
		$("#add_on_click").append("<div class='form-group' data-id='' style='border: 1px solid grey;padding: 15px;border-radius: 7px;'><div><h2 class='' style='margin-top: 0px;'> Quiz </h2><hr style='margin-top: -3px;margin-bottom: 10px;'> <div style='padding: 13px 0px;'><label for='exampleFormControlTextarea1'> Estimated Time : </label><br><input type='number' class='form-control col-sm-6 time_mint' style='width:49%' name='quiz_time_mint' min='0' value='' placeholder='Enter Mintues' /><span style='font-size: xx-large;width: 2%;float: left;padding: 0px 6px;margin-top: -8px;color: grey;'>:</span><input type='number' class='form-control col-sm-6 time_sec' style='width:49%;' name='quiz_time_sec' min='0'  value='' placeholder='Enter Seconds'/></div> </br> <div style='width: 100%;float: left;padding-bottom:0px'><input style='margin: 0px;' type='checkbox' checked='checked' name='quiz_result_auto_announce'/> <span><b>Result Auto Announce?</b></span><input type='hidden' name='quiz_is_added' value='true'/>  <hr></div>   </div> <div><div class='q_cat'> <span class='active'>TF</span> <span class='baq_cat'>BAQ</span> <!--<span class='seq_cat'>SEQ</span>--> <input type='hidden' class='q_no_id' value='"+a+"' /></div> <label for=''>Question <span class='q_counter'>"+q_counter+"</span>: </label> <textarea style='max-width:100%'  class='form-control content' id='tf_qst_"+a+"' name='tf_qst_"+a+"' rows='8' placeholder='Question'></textarea> <div style='margin-top: 8px;' class='ft_option_area'> <div style='margin-top:15px'> <p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (A)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_a_"+a+"' id='tf_qst_a_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_a_"+a+"' name='tf_ans_a_"+a+"' value='1'>  <label for='tf_ans_a_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_a_"+a+"' id='f_tf_ans_a_"+a+"' value='0'><label for='f_tf_ans_a_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div>   <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (B)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_b_"+a+"' id='baq_qst_b_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_b_"+a+"' name='tf_ans_b_"+a+"' value='1'>  <label for='tf_ans_b_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_b_"+a+"' id='f_tf_ans_b_"+a+"' value='0'><label for='f_tf_ans_b_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div>     <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (C)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_c_"+a+"' id='tf_qst_c_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_c_"+a+"' name='tf_ans_c_"+a+"' value='1'>  <label for='tf_ans_c_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_c_"+a+"' id='f_tf_ans_c_"+a+"' value='0'><label for='f_tf_ans_c_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div> </div> <div style='width: fit-content;'><button type='button' class='btn btn-primary add_tf_option_button' data-id='"+a+"'>+ Add Option</button> <button type='button' data-length='3' disabled class='btn btn-danger tf_remove_option_button'><i class='fa fa-trash'></i> Remove Option</button> <input type='hidden' class='q_options_value' value='3' /><input type='hidden' name='q_options_"+a+"' class='q_option_name' value='c' /> </div> <br> <input type='hidden' name='q_type_"+a+"' value='1'/> <button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr></div><button type='button' class='btn btn-primary add_question'>+ Add More Question</button> <button type='button' class='btn btn-danger remove_quiz'><i class='fa fa-trash' aria-hidden='true'></i> Remove Quiz </button></div>");
		$('#quiz_len').val(a);
		
		$('.add_quiz').attr('disabled','disabled');
		
	}
	

	$(document).on('click','.add_question',function(){
		a++;
		q_counter++;
		//$(this).before("<div><div class='q_cat'> <span class='active'>TF</span> <span class='baq_cat'>BAQ</span> <!--<span class='seq_cat'>SEQ</span>--> <input type='hidden' class='q_no_id' value='"+a+"' /></div> <label for=''>Question <span class='q_counter'>"+q_counter+"</span>: </label> <textarea style='max-width:100%'  class='form-control content' id='tf_qst_"+a+"' name='tf_qst_"+a+"' rows='8' placeholder='Question'></textarea> <div style='margin-top: 8px;' class='tf_div'><span><input type='radio' id='tf_ans_"+a+"' name='tf_ans_"+a+"' value='1'>  <label for='tf_ans_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_"+a+"' id='f_tf_ans_"+a+"' value='0'>  <label for='f_tf_ans_"+a+"'>False</label> </span>&nbsp;&nbsp;</div> <br> <input type='hidden' name='q_type_"+a+"' value='1'/><button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr></div>");
		$(this).before("<div><div class='q_cat'> <span class='active'>TF</span> <span class='baq_cat'>BAQ</span> <!--<span class='seq_cat'>SEQ</span>--> <input type='hidden' class='q_no_id' value='"+a+"' /></div> <label for=''>Question <span class='q_counter'>"+q_counter+"</span>: </label> <textarea style='max-width:100%'  class='form-control content' id='tf_qst_"+a+"' name='tf_qst_"+a+"' rows='8' placeholder='Question'></textarea> <div style='margin-top: 8px;' class='ft_option_area'> <div style='margin-top:15px'> <p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (A)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_a_"+a+"' id='tf_qst_a_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_a_"+a+"' name='tf_ans_a_"+a+"' value='1'>  <label for='tf_ans_a_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_a_"+a+"' id='f_tf_ans_a_"+a+"' value='0'><label for='f_tf_ans_a_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div>   <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (B)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_b_"+a+"' id='baq_qst_b_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_b_"+a+"' name='tf_ans_b_"+a+"' value='1'>  <label for='tf_ans_b_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_b_"+a+"' id='f_tf_ans_b_"+a+"' value='0'><label for='f_tf_ans_b_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div>     <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+a+"</span> (C)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_c_"+a+"' id='tf_qst_c_"+a+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_c_"+a+"' name='tf_ans_c_"+a+"' value='1'>  <label for='tf_ans_c_"+a+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_c_"+a+"' id='f_tf_ans_c_"+a+"' value='0'><label for='f_tf_ans_c_"+a+"'>False</label> </span>&nbsp;&nbsp;</div></div> </div> <div style='width: fit-content;'><button type='button' class='btn btn-primary add_tf_option_button' data-id='"+a+"'>+ Add Option</button> <button type='button' data-length='3' disabled class='btn btn-danger tf_remove_option_button'><i class='fa fa-trash'></i> Remove Option</button> <input type='hidden' class='q_options_value' value='3' /><input type='hidden' name='q_options_"+a+"' class='q_option_name' value='c' /> </div> <br> <input type='hidden' name='q_type_"+a+"' value='1'/> <button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr></div>");
		$('#quiz_len').val(a);
	});
	
		$(document).on('click','.seq_cat',function(){
			var q_counter_val=$(this).parent().next().children('span').html();
			var a_no=$(this).siblings('.q_no_id').val();
			$(this).parent().parent().html("<div class='q_cat'> <span class='tf_cat'>TF</span> <span class='baq_cat'>BAQ</span> <span class='active'>SEQ</span><input type='hidden' class='q_no_id' value='"+a_no+"' /> </div> <label for=''>Question <span class='q_counter'>"+q_counter_val+"</span>: </label> <textarea style='max-width:100%' name='q_seq_"+a_no+"' class='form-control content' id='q_seq_"+a_no+"' rows='8' placeholder='Question'></textarea> <br> <input type='hidden' name='q_type_"+a_no+"' value='3'/><button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr>");   			
		});
	
		$(document).on('click','.baq_cat',function(){
			var q_counter_val=$(this).parent().next().children('span').html();
			var a_no=$(this).siblings('.q_no_id').val();
			$(this).parent().parent().html("<div class='q_cat'><span class='tf_cat'>TF</span> <span class='active'>BAQ</span> <!--<span class='seq_cat'>SEQ</span>--> <input type='hidden' class='q_no_id' value='"+a_no+"' /> </div> <label for=''>Question <span class='q_counter'>"+q_counter_val+"</span>:</label><textarea style='max-width:100%' class='form-control content' id='q_baq_"+a_no+"' name='q_baq_"+a_no+"' rows='8' placeholder='Question'></textarea> <br> <div class='baq_q_option'><div><label for='baq_ans_a'> Option <span class='q_option_counter'> A </span> : </label>&nbsp;&nbsp;<input style='position: relative;top: 35px;left: -70px;' type='radio' name='baq_ans_"+a_no+"' id='baq_ans_"+a_no+"' value='1' /> <input type='text' name='baq_ans_a_"+a_no+"' id='baq_ans_a' style='padding-left: 30px;' value='' class='form-control'></div><div><label for='baq_ans_b'>Option <span class='q_option_counter'>B</span> : </label>&nbsp;&nbsp;<input type='radio' style='position: relative;top: 35px;left: -70px;' name='baq_ans_"+a_no+"' id='baq_ans_"+a_no+"' value='2' /><input type='text' style='padding-left: 30px;' name='baq_ans_b_"+a_no+"' id='baq_ans_b' value='' class='form-control'></div><div><label for='baq_ans_c'>Option <span class='q_option_counter'>C</span> : </label>&nbsp;&nbsp;<input type='radio' style='position: relative;top: 35px;left: -70px;' name='baq_ans_"+a_no+"' id='baq_ans_"+a_no+"' value='3' /><input type='text' style='padding-left: 30px;' name='baq_ans_c_"+a_no+"' id='baq_ans_c_"+a_no+"' value='' class='form-control'></div><button type='button' class='btn btn-primary add_option_button' data-id='"+a_no+"'>+ Add Option</button> <button type='button' data-length='3' disabled class='btn btn-danger remove_option_button'><i class='fa fa-trash'></i> Remove Option</button><input type='hidden' class='q_option_val' value='3' /><input type='hidden' name='q_options_"+a_no+"' class='q_option_name' value='c' /><input type='hidden' class='q_option_no' value='"+a_no+"' /> <br></div></br><input type='hidden' name='q_type_"+a_no+"' value='2'/><button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr>");   
		});
		
		$(document).on('click','.tf_cat',function(){
			var q_counter_val=$(this).parent().next().children('span').html();
			var a_no=$(this).siblings('.q_no_id').val();
			
			$(this).parent().parent().html("<div class='q_cat'> <span class='active'>TF</span> <span class='baq_cat'>BAQ</span> <!--<span class='seq_cat'>SEQ</span>--> <input type='hidden' class='q_no_id' value='"+a_no+"' /></div> <label for=''>Question <span class='q_counter'>"+q_counter_val+"</span>: </label> <textarea style='max-width:100%'  class='form-control content' id='tf_qst_"+a_no+"' name='tf_qst_"+a_no+"' rows='8' placeholder='Question'></textarea> <div style='margin-top: 8px;' class='ft_option_area'> <div style='margin-top:15px'> <p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+q_counter_val+"</span> (A)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_a_"+a_no+"' id='tf_qst_a_"+a_no+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_a_"+a_no+"' name='tf_ans_a_"+a_no+"' value='1'>  <label for='tf_ans_a_"+a_no+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_a_"+a_no+"' id='f_tf_ans_a_"+a_no+"' value='0'><label for='f_tf_ans_a_"+a_no+"'>False</label> </span>&nbsp;&nbsp;</div></div>   <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+q_counter_val+"</span> (B)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_b_"+a_no+"' id='baq_qst_b_"+a_no+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_b_"+a_no+"' name='tf_ans_b_"+a_no+"' value='1'>  <label for='tf_ans_b_"+a_no+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_b_"+a_no+"' id='f_tf_ans_b_"+a_no+"' value='0'><label for='f_tf_ans_b_"+a_no+"'>False</label> </span>&nbsp;&nbsp;</div></div>     <div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+q_counter_val+"</span> (C)</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_c_"+a_no+"' id='tf_qst_c_"+a_no+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_c_"+a_no+"' name='tf_ans_c_"+a_no+"' value='1'>  <label for='tf_ans_c_"+a_no+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_c_"+a_no+"' id='f_tf_ans_c_"+a_no+"' value='0'><label for='f_tf_ans_c_"+a_no+"'>False</label> </span>&nbsp;&nbsp;</div></div> </div> <div style='width: fit-content;'><button type='button' class='btn btn-primary add_tf_option_button' data-id='"+a_no+"'>+ Add Option</button> <button type='button' data-length='3' disabled class='btn btn-danger tf_remove_option_button'><i class='fa fa-trash'></i> Remove Option</button> <input type='hidden' class='q_options_value' value='3' /><input type='hidden' name='q_options_"+a_no+"' class='q_option_name' value='c' /> </div> <br> <input type='hidden' name='q_type_"+a_no+"' value='1'/> <button type='button' class='btn btn-danger remove_question'><i class='fa fa-trash' aria-hidden='true'></i> Remove Question </button><hr>");   
		});
		
		
		$(document).on('click','.add_option_button',function(){
			var a_id=$(this).data('id');
			$(this).next().prop('disabled','');
			var length=$(this).next().next().val();
			length=parseInt(length)+1;
			$(this).next().next().val(length);
			var q_option_name=$(this).siblings('.q_option_name').val();
			q_option_name=String.fromCharCode(q_option_name.charCodeAt(0) + 1);
			var q_option_val=$(this).siblings('.q_option_val').val();
			
			$(this).siblings('.q_option_name').val(q_option_name);
			
			var q_option_name_up=q_option_name.toUpperCase();
			
			$(this).before("<div><label for='baq_ans_"+q_option_name+"'>Option <span class='q_option_counter'>"+q_option_name_up+"</span> : </label>&nbsp;&nbsp;<input type='radio' style='position: relative;top: 35px;left: -70px;' name='baq_ans_"+a_id+"' id='baq_ans_"+a_id+"' value='"+q_option_val+"' /><input type='text' style='padding-left: 30px;' name='baq_ans_"+q_option_name+"_"+a_id+"' id='baq_ans_"+q_option_name+"_"+a_id+"' value='' class='form-control'></div>");
		});
		
		
		$(document).on('click','.add_tf_option_button',function(){
			var a_id=$(this).data('id');
			$(this).next().prop('disabled','');
			var length=$(this).next().next().val();
			length=parseInt(length)+1;
			$(this).next().next().val(length);
			var q_option_name=$(this).siblings('.q_option_name').val();
			q_option_name=String.fromCharCode(q_option_name.charCodeAt(0) + 1);
			$(this).siblings('.q_option_name').val(q_option_name);
			
			var q_option_name_up=q_option_name.toUpperCase();
			
			var c_q_no=$(this).parent().prev().children().last().find('.sub_q_no').html();
			
			//$(this).parent().parent().append("<div><label for='baq_ans_"+q_option_name+"'>Option <span class='q_option_counter'>"+q_option_name_up+"</span> : </label>&nbsp;&nbsp;<input type='radio' style='position: relative;top: 35px;left: -70px;' name='baq_ans_"+a_id+"' id='baq_ans_"+a_id+"' value='3' /><input type='text' style='padding-left: 30px;' name='baq_ans_"+q_option_name+"_"+a_id+"' id='baq_ans_"+q_option_name+"_"+a_id+"' value='' class='form-control'></div>");
			  $(this).parent().prev().append("<div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b>Q.<span class='sub_q_no'>"+c_q_no+"</span> ("+q_option_name_up+")</b></p> <input type='text' style='float:left;width:80%' name='tf_qst_"+q_option_name+"_"+a_id+"' id='tf_qst_"+q_option_name+"_"+a_id+"'  value='' class='form-control'> <div class='tf_div' style='margin-top: 2px;text-align: center;'><span><input type='radio' id='tf_ans_"+q_option_name+"_"+a_id+"' name='tf_ans_"+q_option_name+"_"+a_id+"' value='1'>  <label for='tf_ans_"+q_option_name+"_"+a_id+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_"+q_option_name+"_"+a_id+"' id='f_tf_ans_"+q_option_name+"_"+a_id+"' value='0'><label for='f_tf_ans_"+q_option_name+"_"+a_id+"'>False</label> </span>&nbsp;&nbsp;</div>")
			});
		
		
		
		$(document).on('click','.remove_option_button',function(){
			
			var length=$(this).next().val()-1;
			$(this).next().val(length);
			
			if(length<=3){
				$(this).prop('disabled','disabled');
			}
			
			var q_option_name=$(this).siblings('.q_option_name').val();
			q_option_name=String.fromCharCode(q_option_name.charCodeAt(0) - 1);
			$(this).siblings('.q_option_name').val(q_option_name);
			
			$(this).prev().prev().remove();
		});
		
		
		$(document).on('click','.tf_remove_option_button',function(){
			
			var length=$(this).next().val()-1;
			$(this).next().val(length);
			
			if(length<=3){
				$(this).prop('disabled','disabled');
			}
			
			var q_option_name=$(this).siblings('.q_option_name').val();
			q_option_name=String.fromCharCode(q_option_name.charCodeAt(0) - 1);
			$(this).siblings('.q_option_name').val(q_option_name);
			
			$(this).parent().prev().children().last().remove();
		});
		
	
	$(document).on('click','.remove_quiz',function(){
		if(confirm('Are you Sure! You want remove Quiz?')){
			q_counter=0;
			a=0;
			$(this).parent().parent().html('');
			$('.add_quiz').prop('disabled','');
		}
	});
	
	
	$(document).on('click','.remove_question',function(){
		if(confirm('Are you Sure! You want remove question?')){
			$(this).parent().remove();
			q_counter--;
			var q_counter_loop=0;
			$('.q_counter').each(function(){
				q_counter_loop++;
				$(this).html(q_counter_loop);
				
				$(this).parent().next().next().children('div').each(function(){
					$(this).find('.sub_q_no').html(q_counter_loop);
				});
			});
		}
	});
	
	
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
		
		
		var time_sec = 'time_sec';  
		$('form .' + time_sec + '').each(function (i, obj)  
		{    
			if (obj.value == '')  
			{    
				isValid = false;    
				//return isValid;    
			}    
		});
		
		
		var time_mint = 'time_mint';  
		$('form .' + time_mint + '').each(function (i, obj)  
		{    
			if (obj.value == '')  
			{    
				isValid = false;    
				//return isValid;    
			}    
		})
		
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
				if(obj.value == '')  
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
			
			
			$('form .' + time_sec + '').each(function (i, obj)  
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
			
			
			
			$('form .' + time_mint + '').each(function (i, obj)  
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