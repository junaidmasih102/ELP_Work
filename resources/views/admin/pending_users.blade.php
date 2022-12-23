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
          <h1 class="h3 mb-2 text-gray-800">Pending Users</h1>
			@if(Session('msg'))<p align="center" class="alert alert-danger"> {{ Session('msg') }} </p> @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pending Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive" >
				
				
				<table class="table table-bordered" id="jQueryTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
						<th class="txt-10-normal"><b>ID</b></th>
						<th class="txt-10-normal"><b>Full Name</b></th>
						<th class="txt-10-normal"><b>Email</b></th>
						<th class="txt-10-normal"><b>Role Type</b></th>
						<th class="txt-10-normal"><b>Action</b></th>
                    </tr>
                  </thead>
                  
                  <tbody>
					@if($users!=null)
					@foreach($users as $data)
                    <tr>
					  <td>{{ $data->id }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->email }}</td>
                      <td>
						@if($data->role_type==2)
							Teacher
						@else
							Student
						@endif
					  </td>
					  <td>
						<a href='javascript:doApproveUser({{ $data->id }});' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-primary' style="width: 85px;" > Approve </span></a> <a href='javascript:doRejectUser({{ $data->id }});' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-danger'> Reject </span></a>
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
		
		<form name="approve_reject_form" method="post" action="{{url('/admin/approve_reject_user')}}">
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
		function doRejectUser(id){
			if(confirm("Do you want Reject User!")){
				document.approve_reject_form.id.value = id;
				document.approve_reject_form.status.value = "R";
				document.approve_reject_form.submit();
			}
		}
		
		function doApproveUser(id){
			if(confirm("Do you want Approve User!")){
				document.approve_reject_form.id.value = id;
				document.approve_reject_form.status.value = "A";
				document.approve_reject_form.submit();
			}
		}
	</script>
	
	<style>
	table.dataTable thead .sorting:after {
		content: "";
		float: right;
		font-family: fontawesome;
		color: rgba(50,50,50,.5);
	}
	</style>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
	
	<script>
		$(document).ready( function () {
			$('#jQueryTable').DataTable();
		});
	</script>
@endsection