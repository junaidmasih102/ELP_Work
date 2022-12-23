@extends('admin/layout/master_templete')

@section('title')
    <title> Quiz </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
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
	</style>
@endsection

@section('page_content')
		<!-- Begin Page Content -->
		
        <div class="container-fluid">
          <!-- Page Heading -->
          <div style=""><h1 class="h3 mb-2 text-gray-800" style=""> Quiz </h1> </div>
			<hr style="margin: 0px;">
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
			<div class="row">
				<div class="col-sm-12">
					</br>
					<h1 class="h5 mb-2 text-gray-800" style="display: inline-block;"><b> Topic : </b></h1>
					<p style="display: inline-block;">{{ $topic_name }}</p>
					
					
						 
							<form method="post" action="{{ url('doupdate_quiz_time') }}" >
							@csrf
							<br>
							<input type="number" class="form-control col-sm-6 time_mint" style="width:49%" name="time_mint" value="@if(($data->time/60)<10)0{{ (integer)($data->time/60)}} @else{{ (integer)($data->time/60) }}@endif" min="0" placeholder="Enter Mintues" />
							<span style="font-size: xx-large;width: 2%;padding: 0px 6px;position: relative;top: -8px;color: grey;">:</span>
							<input type="number" class="form-control col-sm-6 time_sec" style="width:49%;float: right;" name="time_sec" value="@if(($data->time%60)<10)0{{ (integer)($data->time%60)}}@else{{ (integer)($data->time%60)}}@endif" min="0" placeholder="Enter Seconds"/>
							
							<input type="hidden" name="topic_data_id" value="{{ $data->id }}" />
 							<button type="submit" class="btn btn-success">Update Time</button>
							
							</form>
							<hr>
							@if($quiz_question!=null)
								@php
									$q_counter=0;
								@endphp
								@foreach($quiz_question as $question)
									@php
										$q_counter++
									@endphp
									
									<p><b>Q.{{ $q_counter }}: </b>{{ $question['q_title'] }}</p>
									
									@if($question['question_type']==1)
										@php
											$q_option_counter='a';
										@endphp
										@foreach($question['question_options'] as $options)
											@php 
												$sub_answer=""
											@endphp
												
											@if($options['question_options_attempt']!=null)
												@php 
													$sub_answer=$options['question_options_attempt']['sub_answer']
												@endphp
											@endif
											
											<div style="margin:0px 50px 10px 50px">						
												<div>
												   <p style='margin: 0px;'><br> Q.{{ $q_counter }} ({{ $q_option_counter }})</b> {{ $options['o_title'] }}</p> 
												</div>
												<div class="tf_div">
													<span>
														<input type="radio" @if($options['sub_answer']==1) checked @endif disabled id="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" value="1">  
														<label for="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">True</label> 
													</span>&nbsp;&nbsp; 
													<span>
														<input type="radio" @if($options['sub_answer']==0) checked @endif  disabled name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" id="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" value="0">  
														<label for="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">False</label> 
													</span>&nbsp;&nbsp;
												</div>
											</div>
											
											@php
												$q_option_counter++;
											@endphp
										@endforeach
									@elseif($question['question_type']==2)
										@php
											$q_option_counter=0;
										@endphp
										@foreach($question['question_options'] as $options)
											@php
												$q_option_counter++;
											@endphp
											
											<div style="margin:10px 50px 10px 50px">
												<span>
													<input @if($q_option_counter==$question['correct_answer']) checked @endif disabled type="radio"  id="baq_ans_{{ $q_counter.'_'.$q_option_counter }}" name="baq_ans_{{ $q_counter }}" value="{{ $q_option_counter }}">  
													<label for="baq_ans_{{ $q_counter.'_'.$q_option_counter }}" style="margin-left: 5px;">{{ $options['o_title'] }}</label> 
												</span>&nbsp;&nbsp; 
											</div>
										@endforeach
									@elseif($question['question_type']==3)
										<div style="margin-top: 8px;margin-left: 10px;margin-right: 20px;">
											<textarea  disabled spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" style="max-width:100%" name="seq_ans_{{ $q_counter }}" class="form-control content" id="q_seq_1" rows="8" placeholder="Write Answer here...">{{ $answer }}</textarea>
										</div>
									@endif
									
									@php
										$question_id=$question['q_id'];
										$topic_id=$question['topic_id'];
									@endphp
									
									<a class="btn btn-primary" href='{{ url("admin/view_added_courses/edit_quiz_question/$topic_id/$question_id") }}' ><i class="fa fa-edit"></i> Edit </a> 
									<a class="btn btn-danger" onclick='return confirm("Are you Sure! You want Delete Question?")' href='{{ url("admin/view_added_courses/delete_quiz_question/$topic_id/$question_id") }}' ><i class="fa fa-trash"></i> Delete </a>
									<hr/>
								@endforeach
							@endif
								
						</div>
			</div>
          </div>
        </div>
        <!-- /.container-fluid -->
@endsection
@section('footer')
    @include('admin/include/footer')
@endsection
@section('js')
	<style>
		table.dataTable thead .sorting:after {
			content: "";
		}
	</style>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#dataTable').DataTable();
		});
	</script>
@endsection