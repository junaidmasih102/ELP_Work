@extends('teacher/layout/master_templete')

@section('title')
    <title> View Topic </title>
@endsection

@section('nav')
    @include('teacher/include/nav')
@endsection

@section('sidebar')
    @include('teacher/include/sidebar')
	<style>
		
		
		.tf_div span {
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
	
		.tf_div span:first-child {
			background-color: #5cb85c;
		}
		
		#add_tf_option_button,#remove_tf_option_button {
			margin-top:10px
		}
	</style>
@endsection

@section('page_content')
		<!-- Begin Page Content -->
		
        <div class="container-fluid">
          <!-- Page Heading -->
          <div style=""><h1 class="h3 mb-2 text-gray-800" style=""> Edit Question </h1> </div>
			<hr style="margin: 0px;">
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
			<div class="row">
				<div class="col-sm-12">
					</br>
							<form method="POST" action="{{ url('do_update_quiz_question') }}">
							
							@csrf
							
							@if($question!=null)
									<textarea style='max-width:100%' class='form-control question' name="question" rows='8' placeholder='Question'>{{ $question->q_title }}</textarea>
									
									@if($question->question_type==1)
										@php
											$q_option_counter='a';
										@endphp
											
										<div style='margin-top: 8px;' class='ft_option_area'> 
											 
												
										@foreach($question_options as $options)
											<div style='margin-top:15px'>
											<p style='margin: 0px;width: fit-content;'>
												<b> ({{ $q_option_counter }}) </b>
											</p>
											
											
											<input type='text' style='float:left;width:80%' name='tf_qst_{{ $q_option_counter }}' id='tf_qst_{{ $q_option_counter }}'  value='{{ $options->o_title }}' class='form-control'>
											
												
											<div style="margin:0px 0px 20px 0px" width="20%">						
												
												<div class="tf_div">
														&nbsp;&nbsp;
														<span>
															<input type="radio" @if($options->sub_answer==1) checked @endif  id="tf_ans_{{ $q_option_counter }}" name="tf_ans_{{ $q_option_counter }}" value="1">  
															<label for="tf_ans_{{ $q_option_counter }}">True</label> 
														</span>
														&nbsp;&nbsp;<span>
															<input type="radio" @if($options->sub_answer==0) checked @endif  name="tf_ans_{{ $q_option_counter }}" id="f_tf_ans_{{ $q_option_counter }}" value="0">  
															<label for="f_tf_ans_{{ $q_option_counter }}">False</label> 
														</span>
												</div>
											</div>
											
												</div>
											@php
												$q_option_counter++;
											@endphp
										@endforeach
										
										</div>
									@elseif($question->question_type==2)
										@php
											$q_option_counter='a';
											$q_option_counter_c='A';
											$q_option_counter_no=1;
										@endphp
										
										<div class='baq_q_option' style="margin-top:10px">
										
										@foreach($question_options as $options)
											
											
											<div>
												<label for='baq_ans_{{ $q_option_counter }}'> Option <span class='q_option_counter'> {{ $q_option_counter_c }} </span> : </label>
												&nbsp;&nbsp;
												<input @if($q_option_counter_no==$question->correct_answer) checked @endif style='position: relative;top: 35px;left: -75px;' type='radio' name='baq_ans' id='baq_ans' value='{{ $q_option_counter_no }}' /> 
												<input type='text' name='baq_ans_{{ $q_option_counter }}' id='baq_ans_{{ $q_option_counter }}' style='padding-left: 30px;' value='{{ $options->o_title }}' class='form-control'>
											</div>
											
											@php
												$q_option_counter++;
												$q_option_counter_c++;
												$q_option_counter_no++;
											@endphp
										@endforeach
										</div>
									@elseif($question['question_type']==3)
										<div style="margin-top: 8px;margin-left: 10px;margin-right: 20px;">
											<textarea  disabled spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" style="max-width:100%" name="seq_ans_{{ $q_counter }}" class="form-control content" id="q_seq_1" rows="8" placeholder="Write Answer here...">{{ $answer }}</textarea>
										</div>
									@endif
									
									@php
										$question_id=$question->q_id;
										$topic_id=$question->topic_id;
									@endphp
									<input type="hidden" name="topic_id" value="{{ $topic_id }}" />
									<input type="hidden" name="question_id" value="{{ $question_id }}" />
									<input type="hidden" name="q_option_counter" id="q_option_counter" value="{{ $q_option_counter }}" />
									<div style='margin-bottom:10px'>
										<a class="btn btn-primary" href="javascript:void(0)" id="add_tf_option_button" data-option="{{ $q_option_counter }}" > + Add Option </a> 
										<a class="btn btn-danger" href="javascript:void(0)" id="remove_tf_option_button" data-option="{{ $q_option_counter }}" @if($q_option_counter<='d') disabled @endif > Remove Option </a>
									</div>
									<input type="hidden" id="question_type" name="question_type" value="{{ $question->question_type }}" />
									<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Update Question </button> 
							@endif
							
							</form>
						</div>
					
			</div>
			
          </div>

        </div>
		
		
        <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('teacher/include/footer')
	
	<script>
			var question_type=$('#question_type').val();
			if(question_type==2){
				var q_option_counter="{{ $q_option_counter??'' }}";
				var q_option_counter_c="{{ $q_option_counter_c??'' }}";
				var q_option_counter_no="{{ $q_option_counter_no??'' }}";
			}
		
			$('#add_tf_option_button').click(function(){
				
				if(question_type==1){
					var a_option=$(this).attr('data-option');
					$('#remove_tf_option_button').attr('disabled',false);
					var q_option_name=a_option;
					$(this).attr('data-option',String.fromCharCode(a_option.charCodeAt(0) + 1));
					$('#remove_tf_option_button').attr('data-option',String.fromCharCode(a_option.charCodeAt(0) + 1));
					$('#q_option_counter').val(String.fromCharCode(a_option.charCodeAt(0) + 1));
					$(this).parent().prev().prev().prev().prev().append("<div style='margin-top:15px'><p style='margin: 0px;width: fit-content;'><b> ("+q_option_name+") </b></p> <input type='text' style='float:left;width:80%' name='tf_qst_"+q_option_name+"' id='tf_qst_"+q_option_name+"'  value='' class='form-control'> <div class='tf_div' style='margin:0px 0px 20px 0px' width='20%' >&nbsp;&nbsp;<span><input type='radio' id='tf_ans_"+q_option_name+"' name='tf_ans_"+q_option_name+"' value='1'>  <label for='tf_ans_"+q_option_name+"'>True</label> </span>&nbsp;&nbsp; <span><input type='radio'  name='tf_ans_"+q_option_name+"' id='f_tf_ans_"+q_option_name+"' value='0'><label for='f_tf_ans_"+q_option_name+"'>False</label> </span>&nbsp;&nbsp;</div>");
				}
				else if(question_type==2){
					$('.baq_q_option').append("<div><label for='baq_ans_'"+q_option_counter+"'> Option <span class='q_option_counter'> "+q_option_counter_c+" </span> : </label>&nbsp;&nbsp;<input style='position: relative;top: 35px;left: -65px;' type='radio' name='baq_ans' id='baq_ans' value='"+q_option_counter_no+"' /> <input type='text' name='baq_ans_"+q_option_counter+"' id='baq_ans_"+q_option_counter+"' style='padding-left: 30px;' value='' class='form-control'></div>");
					$('#q_option_counter').val(String.fromCharCode(q_option_counter.charCodeAt(0) + 1));
					q_option_counter=String.fromCharCode(q_option_counter.charCodeAt(0) + 1);
					q_option_counter_c=String.fromCharCode(q_option_counter_c.charCodeAt(0) + 1);
					q_option_counter_no++;
					$('#remove_tf_option_button').attr('disabled',false);
				}
			});
			
			
			
			$('#remove_tf_option_button').click(function(){
				
				
				
				if(question_type==1){
					var a_option=$(this).attr('data-option');
					
					var q_option_name=a_option;
					$('#add_tf_option_button').attr('data-option',String.fromCharCode(a_option.charCodeAt(0) - 1));
					$('#q_option_counter').val(String.fromCharCode(a_option.charCodeAt(0) - 1));
					$(this).attr('data-option',String.fromCharCode(a_option.charCodeAt(0) - 1));
					
					a_option=$(this).attr('data-option');
					
					if(a_option<='d'){
						$(this).attr('disabled','disabled');
					}
					
					$('.ft_option_area').children().last().remove();
				}
				else if(question_type==2){
					q_option_counter=String.fromCharCode(q_option_counter.charCodeAt(0) - 1);
					q_option_counter_c=String.fromCharCode(q_option_counter_c.charCodeAt(0) - 1);
					q_option_counter_no--;
					
					
					$('#q_option_counter').val(q_option_counter);
					
					$('.baq_q_option').children().last().remove();
					
					if(q_option_counter_no<=4){
						$(this).attr('disabled','disabled');
					}
				}
			});
		
		
		
	</script>
@endsection

@section('js')
	
	
	
@endsection