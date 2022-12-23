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
    <h1 class="h3 mb-2 text-gray-800">View Weeks({{ $course_name }})</h1>
    <h6 class="m-0 font-weight-bold text-primary">Weeks</h6>
    @if (Session('msg'))
        <p align="center" class="alert alert-danger"> {{ Session('msg') }} </p>
    @endif


    @if ($week_id == null)
        <div id='add_week_form' <?php if (!$errors->any()) {
            echo "style='display:none'";
        } ?>>
            <form name="add_test_form" action='{{ url('admin/view_added_courses/view_weeks/add_week') }}' method='post'
                onsubmit="">
                @csrf
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="week_name" type="text" class="form-control"
                            placeholder="Enter Week Name Like Week 1" value="">
                        @error('week_name')
                            <ul style='color:red;margin-left: -20px;'>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                        <input name="course_id" type="hidden" value="{{ $course_id }}">
                        <button class="btn btn-primary" type="click"> Add Week </button>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </form>
        </div>
    @else
        <div id="update_week_form">
            <form name="add_test_form" action='{{ url('admin/view_added_courses/view_weeks/update_week') }}' method='post'
                onsubmit="">
                @csrf
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="week_name" type="text" class="form-control"
                            placeholder="Enter Week Name Like Week 1" value="{{ $week_name }}">
                        @error('week_name')
                            <ul style='color:red;margin-left: -20px;'>
                                <li>{{ $message }}</li>
                            </ul>
                        @enderror
                        <input name="week_id" type="hidden" value="{{ $week_id }}">
                        <p style='margin: 2px;'></p>
                        <input name="course_id" type="hidden" value="{{ $course_id }}">
                        <a href='{{ url("/teacher/view_courses/view_weeks/$course_id") }}' class="btn btn-success"
                            type="click"> Back </a>
                        <button class="btn btn-primary" type="click"> Update Week </button>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </form>
        </div>
    @endif

    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div align="right" class="card-header py-3">
                <!--<a  href='{{ url("/teacher/view_courses/view_weeks/add_week/$course_id") }}' style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span class='btn btn-primary' style="margin-top: -8px;margin-bottom: 8px;" > Add Week </span></a>-->
                @if (!isset($week_id))
                    <a href='javascript:void(0);' id="show_hide_add_week_form"
                        style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span id="add_week_button"
                            class='btn btn-primary'
                            style="margin-top: -8px;margin-bottom: 8px;"><?php if ($errors->any()) {
                                echo 'Hide Add Week';
                            } else {
                                echo 'Add Week';
                            } ?></span></a>
                @endif

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
                            <?php $counter = 1; ?>
                            @if ($courses_weeks != null)
                                @foreach ($courses_weeks as $data)
                                    <tr>
                                        <td width="15%">{{ $counter }}</td>
                                        <td>{{ $data->week_name }}</td>
                                        <td width="30%">
                                            <a href='{{ url("/admin/view_added_courses/view_weeks/$course_id/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-primary'> Edit </span></a>
                                            <a href='javascript:void(0)'
                                                onclick="delete_week({{ $data->id }},{{ $course_id }})"
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-danger'> Delete </span></a>
                                            <a href='{{ url("/admin/view_added_courses/view_topics/$course_id/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-success'> View Topics </span></a>
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
        $('#show_hide_add_week_form').click(function() {

            var button_html = '';

            $('#add_week_form').toggle();
            button_html = $('#add_week_button').html();

            if (button_html == 'Add Week') {
                button_html = 'Hide Add Week'
            } else {
                button_html = 'Add Week'
            }

            $('#add_week_button').html(button_html);

        });

        function delete_week(id, course_id) {
            if (confirm('Do you want Delete Week!')) {
                document.delete_week_form.week_id.value = id;
                document.delete_week_form.course_id.value = course_id;
                document.delete_week_form.submit();
            }
        }
    </script>

    <style>
        table.dataTable thead .sorting:after {
            content: "";
        }

        #dataTable_filter {
            float: left;
            margin-left: 25px
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
@endsection
