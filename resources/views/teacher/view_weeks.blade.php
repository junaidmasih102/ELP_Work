@extends('teacher/layout/master_templete')

@section('title')
    <title> Courses </title>
@endsection

@section('nav')
    @include('teacher/include/nav')
@endsection

@section('sidebar')
    @include('teacher/include/sidebar')
@endsection

@section('page_content')
		            <!-- Begin Page Content -->
        
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Weeks({{ $course_name }})</h1>
		  <h6 class="m-0 font-weight-bold text-primary">Weeks</h6>
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
			
			
			
			
			
			<div class="col-lg-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div align="right" class="card-header py-3">
              
			</div>
            <div class="card-body">
              <div class="table-responsive" style="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th class="txt-10-normal"><b>S.no</b></th>
						<th class="txt-10-normal"><b>Week Name</b></th>
						<th class="txt-10-normal"><b>Action</b></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php $counter=1; ?>
					@if($courses_weeks!=null)
					@foreach($courses_weeks as $data)
                    <tr>
					  <td width="15%"> {{ $counter }} </td>
                      <td> {{ $data->week_name }} </td>
					  <td width="30%">
						<a href='{{ url("/teacher/view_courses/view_topics/$course_id/$data->id") }}' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-success' > Add/View Topics </span></a> 
						<!--<a href='{{ url("/teacher/view_courses/view_quiz/$course_id/$data->id") }}' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-success' > Add/View Quiz </span></a>--> 
					  </td>
                    </tr>
					<?php $counter++ ?>
					@endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
	</div>
        
		
		
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
	
	
	<style>
	table.dataTable thead .sorting:after {
		content: "";
	}
	#dataTable_filter{
		float:left;
		margin-left:25px
	}
	</style>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	
	<script>
		$(document).ready( function () {
			$('#dataTable').DataTable();
			//$('.table-responsive').css({'margin-top':'-30px'});
		});
	</script>
@endsection