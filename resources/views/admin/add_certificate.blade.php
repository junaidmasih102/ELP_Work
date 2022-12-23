@extends('admin/layout/master_templete')

@section('title')
    <title> Add Certificate </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
    <div style="padding: 0px 40px;">
        <h1 class="h3 mb-2 text-gray-800">Add Certificate</h1>
        <form id="add_certificate">
            @csrf
            <div class="form-group" style="margin-top:20px;">
                <label for="exampleFormControlInput1">Course Name</label>
                <input type="text" name="course_name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $course->name }}" disabled>
                <ul class='course-name-error-msg' style='color:red'></ul>
            </div>
            <div class="form-group" style="margin-top:20px;">
                <label for="exampleFormControlInput1">Description</label>
                <textarea name="desc" class="form-control" rows="5"></textarea>
                <ul class='desc-error-msg' style='color:red'></ul>
            </div>


            <div class="row" style="margin-top:30px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="simpleFormEmail">Left Side Instructor Name</label>
                        <select class="form-control col-md-12" name="sp_one">
                            <option value="">Select Instructor</option>
                            @foreach ($instructor_list as $inst)
                                <option value="{{ $inst->id }}}">{{ $inst->instructor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Left Side Instructor Title</label>
                        <input type="text" name="lefttitle" class="form-control" id="exampleFormControlInput1"
                            placeholder="Left Side Instructor Title">
                        <ul class='left-title-error-msg' style='color:red'></ul>
                    </div>
                </div>

                <div class="row" style="margin-top:30px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="simpleFormEmail">Right Side Instructor Name</label>
                                <select class="form-control col-md-12" name="sp_one">
                                    <option value="">Select Instructor</option>
                                    @foreach ($instructor_list as $inst)
                                        <option value="{{ $inst->id }}}">{{ $inst->instructor_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Right Side Instructor Title</label>
                            <input type="text" name="righttitle" class="form-control" id="exampleFormControlInput1"
                                placeholder="Right Side Instructor Title">
                            <ul class='right-title-error-msg' style='color:red'></ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Certificate</button>
                </div>
            </div>
        </form>
    </div>
    <div>
    @endsection

    @section('footer')
        @include('admin/include/footer')
    @endsection

    @section('js')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#add_certificate").unbind("submit").submit(function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        url: "{{ url('/admin/doaddcertificate') }}",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                alert("sdsads");
                                // window.location.href = "{{ url('/admin/view_added_courses') }}";
                            } else {
                                //printErrorMsg(data.error);
                                $(".course-name-error-msg").html('');
                                $(".left-name-error-msg").html('');
                                $(".left-title-error-msg").html('');
                                $(".left-image-error-msg").html('');
                                $(".right-name-error-msg").html('');
                                $(".right-title-error-msg").html('');
                                $(".right-image-error-msg").html('');


                                if (data.error_course_name != "") {
                                    $(".course-name-error-msg").append('<li>' + data
                                        .error_course_name +
                                        '</li>');
                                }

                                if (data.error_left_name != "") {
                                    $(".left-name-error-msg").append('<li>' + data.error_left_name +
                                        '</li>');
                                }

                                if (data.error_left_title != "") {
                                    $(".left-title-error-msg").append('<li>' + data
                                        .error_left_title + '</li>');
                                }

                                if (data.error_left_image != "") {
                                    $(".left-image-error-msg").append('<li>' + data
                                        .error_left_image +
                                        '</li>');
                                }

                                if (data.error_right_name != "") {
                                    $(".right-name-error-msg").append('<li>' + data
                                        .error_right_name +
                                        '</li>');
                                }

                                if (data.error_right_title != "") {
                                    $(".left-title-error-msg").append('<li>' + data
                                        .error_right_title + '</li>');
                                }

                                if (data.error_right_image != "") {
                                    $(".left-image-error-msg").append('<li>' + data
                                        .error_right_image +
                                        '</li>');
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
