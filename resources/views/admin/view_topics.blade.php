@extends('admin/layout/master_templete')

@section('title')
    <title> Courses </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
		            <!-- Begin Page Content -->
        
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Topics({{ $course_name }})({{ $week_name }})</h1>
		  <h6 class="m-0 font-weight-bold text-primary">Topics</h6>
			
			
			
			<div class="col-lg-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive" style="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th class="txt-10-normal" ><b>S.no</b></th>
						<th class="txt-10-normal"><b>Topic</b></th>
						<th class="txt-10-normal"><b>Author Name</b></th>
						<th class="txt-10-normal"><b>Status</b></th>
						<th class="txt-10-normal"><b>Action</b></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php $counter=1; ?>
					
					@if($topics!=null)
					@foreach($topics as $data)
                    <tr>
					  <td align="center" >{{ $counter }}</td>
                      <td>{{ $data->topic }}</td>
                      <td>{{ $data->name }}</td>
                      <td>@if($data->status=="UA") Under-Approval @elseif($data->status=="R") Rejected @elseif($data->status=="A") Approved @endif</td>
					  <td align="center">
						<a href='{{ url("/admin/view_added_courses/view_topic/$data->id") }}' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-primary' > View Topic </span></a> 
					  </td>
                    </tr>
					
					<?php $counter++; ?>
					@endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
	</div>
        
		
		<form name="delete_week_form" action="{{ url('/admin/view_added_courses/view_weeks/delete_week') }}" method="post">
			@csrf
			<input type="hidden" name="week_id" value="" />
			<input type="hidden" name="course_id" value="" />
		</form>
		
        <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
	<script>
		function delete_week(id,course_id){
			if(confirm('Do you want Delete Week!')){
				document.delete_week_form.week_id.value=id;
				document.delete_week_form.course_id.value=course_id;
				document.delete_week_form.submit();
			}
		}
	</script>
	
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