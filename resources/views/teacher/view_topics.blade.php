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
    <h1 class="h3 mb-2 text-gray-800">View Topics({{ $course_name }})({{ $week_name }})</h1>
    @if (Session('msg'))
        <p align="center" class="alert alert-danger"> {{ Session('msg') }} </p>
    @endif
    <div class="col-lg-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="">
                <h6 style="display:inline-block;float:left" class="m-0 font-weight-bold text-primary">Topics</h6>
                <div style="" align="right">

                    @isset($discussion)
                        <a href='{{ url("teacher/edit_discussion/$course_id/$week_id") }}' id="show_hide_add_week_form"
                            style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span id="add_week_button"
                                class='btn btn-info' style="margin-top: -8px;margin-bottom: 8px;"> Edit Discussion </span></a>
                    @else
                        <a href='{{ url("/teacher/view_courses/view_topics/add_discussion/$course_id/$week_id") }}'
                            id="show_hide_add_week_form" style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                id="add_week_button" class='btn btn-primary' style="margin-top: -8px;margin-bottom: 8px;"> Add
                                Discussion </span></a>
                    @endisset

                    @isset($assessment)
                        <a href='{{ url("/teacher/view_courses/view_topics/edit_assessment/$course_id/$week_id") }}'
                            id="show_hide_add_week_form" style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                id="add_week_button" class='btn btn-primary' style="margin-top: -8px;margin-bottom: 8px;"> Edit
                                Peer Assessment </span></a>
                    @else
                        <a href='{{ url("/teacher/view_courses/view_topics/add_assessment/$course_id/$week_id") }}'
                            id="show_hide_add_week_form" style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                id="add_week_button" class='btn btn-primary' style="margin-top: -8px;margin-bottom: 8px;"> Add
                                Peer Assessment </span></a>
                    @endisset
                    <a href='{{ url("/teacher/view_courses/view_topics/add_topic/$course_id/$week_id") }}'
                        id="show_hide_add_week_form" style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                            id="add_week_button" class='btn btn-primary' style="margin-top: -8px;margin-bottom: 8px;"> Add
                            Topic </span></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="txt-10-normal"><b>S.No</b></th>
                                <th class="txt-10-normal"><b>Topic</b></th>
                                <th class="txt-10-normal"><b>Status</b></th>
                                <th class="txt-10-normal"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            @if ($topics != null)
                                @foreach ($topics as $data)
                                    <tr>
                                        <td width="15%">{{ $counter }}</td>
                                        <td>{{ $data->topic }}</td>
                                        <td>
                                            @if ($data->status == 'UA')
                                                Under-Approval
                                            @elseif($data->status == 'R')
                                                Rejected
                                            @elseif($data->status == 'A')
                                                Approved
                                            @elseif($data->status == 'P')
                                                Pending(Send for Approval)
                                            @endif
                                        </td>
                                        <td width="30%">
                                            <a href='{{ url("/teacher/view_courses/view_topic/$data->id") }}'
                                                style='color: #cc0000;font-family: Verdana;font-size: 10px;'><span
                                                    class='btn btn-success'> View Topic </span></a>
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


    <form name="delete_week_form" action="{{ url('/teacher/view_courses/view_weeks/delete_week') }}" method="post">
        @csrf
        <input type="hidden" name="week_id" value="" />
        <input type="hidden" name="course_id" value="" />

    </form>
    <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
    <script>
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

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
