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
        <h1 class="h3 mb-2 text-gray-800">Added Courses</h1>
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
                    <table class="table table-bordered" id="jQueryTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="txt-10-normal"><b>ID</b></th>
                                <th class="txt-10-normal"><b>Image</b></th>
                                <th class="txt-10-normal"><b>Course</b></th>
                                <th class="txt-10-normal"><b>Summary</b></th>
                                <th class="txt-10-normal"><b>Skills</b></th>
                                <th class="txt-10-normal" width="25%"><b>Action</b></th>
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
                                        <td>{{ Str::limit($data->summary, 150, ' ...') }}</td>
                                        <td>{{ $data->skills }}</td>
                                        <td style="padding:3px">
                                            <a href='{{ url("/admin/view_added_courses/view_weeks/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-success'> View Weeks </span></a> <a
                                                href='{{ url("/admin/view_added_courses/edit_course/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-primary' style="width: 71px;"> Edit </span></a> <a
                                                href='javascript:doDeleteStudent({{ $data->id }});'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-danger'> Delete </span></a>
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

    <form name="delform" method="post" action="{{ url('/admin/delcource') }}">
        @csrf
        <input type="hidden" name="id" value="" />
    </form>
    <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('admin/include/footer')
@endsection

@section('js')
    <script>
        function doDeleteStudent(id) {
            if (confirm("Do you want delete Course!")) {
                document.delform.id.value = id;
                document.delform.submit();
            }
        }
    </script>

    <style>
        table.dataTable thead .sorting:after {
            content: "";
            float: right;
            font-family: fontawesome;
            color: rgba(50, 50, 50, .5);
        }
    </style>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#jQueryTable').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endsection
