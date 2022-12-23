@extends('admin/layout/master_templete')

@section('title')
    <title> Home </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
		            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Teachers in Course({{ $courses[0]->name }})</h1>
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				<form method="post" action="{{ url('/admin/selected_teachers_add_to_course') }}" onsubmit="return add_to_course()">
				@csrf
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th class="txt-10-normal" style="padding: 8px 10px;" width="10%" ><b><input type="checkbox" class="check_all"/> Select All </b></th>
						<th class="txt-10-normal"><b>ID</b></th>
						<th class="txt-10-normal"><b>Teacher Name</b></th>
						<th class="txt-10-normal"><b>Email</b></th>
                    </tr>
                  </thead>
                  <tbody>
					@if($teachers!=null)
					@foreach($teachers as $data)
						<?php $cond=true; ?>
						
						@foreach($teachers_courses as $teachers_course)
							
							@if($teachers_course->user_id==$data->id)
								
								@if($teachers_course->status==1)
									<?php $cond=false; ?>
								@endif
								
							@endif
						@endforeach
						
						@if($cond)
						<tr>
						  <td> <input type="checkbox" name="selected_teachers[]" class="selected_students" value="{{ $data->id }}" /> </td>
						  <td>{{ $data->id }}</td>
						  <td>{{ $data->teacher }}</td>
						  <td>{{ $data->email }}</td>
						</tr>
						@endif
					@endforeach
                    @endif
                  </tbody>
                 </table>
					<input type="hidden" name="course_id" value="{{ $course_id }}" />
					<button type="submit" style="" class="btn btn-primary">Add Teachers</button>
				</form>
              </div>
            </div>
          </div>
        </div>
		
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
	<script>
	$('.check_all').click(function(){
		var prop=$('.check_all').prop('checked');
		$('.selected_students').prop('checked',prop);
	});
	</script>
	
	<script>
		function add_to_course(){
			if(confirm("Are you Sure, You want Add?")){
				return true;
			}
			return false;
		}
	</script>
	
	<style>
	table.dataTable thead .sorting:after {
		content: "";
	}
	</style>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	
	<script>
		$('#dataTable').DataTable({
			"columnDefs": [
				{ "orderable": false, "targets": [0] },
			]
		});
		$('th').removeClass('sorting_asc');
	</script>
@endsection