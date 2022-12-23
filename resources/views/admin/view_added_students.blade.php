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
          <h1 class="h3 mb-2 text-gray-800">Added Students in Course({{ $courses[0]->name }})</h1>
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Students</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th class="txt-10-normal"><b>ID</b></th>
						<th class="txt-10-normal"><b>Student Name</b></th>
						<th class="txt-10-normal"><b>Email</b></th>
						<th class="txt-10-normal"><b>Action</b></th>
                    </tr>
                  </thead>
                  
                  <tbody>
					@if($students!=null)
					@foreach($students as $data)
					
                    <tr>
					  <td>{{ $data->id }}</td>
                      <td>{{ $data->student }}</td>
                      <td>{{ $data->email }}</td>
					  <td width="15%"> 
						 <a href='javascript:doDeleteStudent({{ $data->id }});' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-danger'> Remove </span></a>
					  </td>
                    </tr>
					@endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
		
		<form name="delform" method="post" action="{{ url('/admin/remove_student_from_cource') }}">
			@csrf
			<input type="hidden" name="id" value="" />
			<input type="hidden" name="status" value="" />
		</form>
        <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
	<script>
		function doDeleteStudent(id){
			if(confirm("Do you want Remove Student!")){
				document.delform.id.value = id;
				document.delform.status.value = 2;
				document.delform.submit();
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