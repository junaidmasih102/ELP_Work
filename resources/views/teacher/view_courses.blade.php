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
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">View Courses</h1>
        @if (Session('msg'))
            <p align="center" class="alert alert-danger"> {{ Session('msg') }} </p>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Courses</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="txt-10-normal"><b>ID</b></th>
                                <th class="txt-10-normal"><b>Image</b></th>
                                <th class="txt-10-normal"><b>Course</b></th>
                                <th class="txt-10-normal"><b>Summary</b></th>
                                <th class="txt-10-normal"><b>Skills</b></th>
                                <th class="txt-10-normal"><b>Action</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($courses != null)
                                @foreach ($courses as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td><img style="height:100px;width:160px"
                                                src='{{ asset("storage/$data->image") }}' /></td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ Str::limit($data->summary, 200, ' ...') }}</td>
                                        <td>{{ $data->skills }}</td>
                                        <td>
                                            <a href='{{ url("/teacher/view_courses/view_weeks/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-success'> View Weeks </span></a>
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


    <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
    <style>
        table.dataTable thead .sorting:after {
            content: "";
        }
    </style>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
