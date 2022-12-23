@extends('teacher/layout/master_templete')

@section('title')
    <title> Peer Assessments </title>
@endsection

@section('nav')
    @include('teacher/include/nav')
@endsection

@section('sidebar')
    @include('teacher/include/sidebar')
@endsection

@section('page_content')
    <style>
        .quiz>li {
            margin-left: 20px;
        }

        .quiz>li>a {
            font-size: 25px;
            font-weight: 600;
            color: black;
        }

        ul {
            margin: auto;
        }

        .error {
            border-color: red;
        }
    </style>
    <div style="padding: 0px 40px;">
        <h1 class="h3 mb-2 text-gray-800">Add Peer Assessment</h1>
        <form method="post" action="{{ url('teacher/doadd_assessment') }}">
            @csrf
            <ul style="color:red;margin-left: -25px;" id="empty_topic_error"></ul>
            <div class="form-group">
                <label for="assessment_name"> Assessment Title </label>
                <input type="text" name="assessment_name" class="form-control @error('assessment_name') error @enderror"
                    id="assessment_name" placeholder="Assessment Title...">
                @error('assessment_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <ul class='name-error-msg' style='color:red'></ul>
            </div>

            <div id="add_on_click">

            </div>

            <input type="hidden" name="week_id" value="{{ $week->id }}" />
            <input type="hidden" name="course_id" value="{{ $course->id }}" />

            <button type="button" class="btn btn-success add_assessment">+ Add Graded Assessment </button>
            <input type="submit" class="btn btn-primary" Create Graded Assessment />
        </form>
    </div>
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var a = 0;
            $('.add_assessment').click(function() {
                $('#add_on_click').append(
                    "<div class='form-group' data-id='' style='border: 1px solid grey;padding: 15px;border-radius: 7px;'> <input type='hidden' name='count[]' value='i' /> <label> Instructions : </label> <textarea style='max-width:100%' name='instructions_" +
                    a +
                    "' class='form-control' id='instructions' rows='8' placeholder='Instuctions...'></textarea> <label> Words Limit : </label> <input type='number' name='word_limit_" +
                    a +
                    "' class='form-control' value='50'> <br> <div id='add_point'> <button type='button' class='btn btn-primary add_point_btn' value='" +
                    a +
                    "'> Add Point </button> </div> <br> <button type='button' class='btn btn-danger remove_div'> Remove </button> </div>"
                );
                a += 1;
            });
            $(document).on('click', '.remove_div', function() {
                $(this).parent().remove();
                a -= 1;
            });
            $(document).on('click', '.add_point_btn', function() {
                var index = $(this).val()
                $(this).parent().append("<div> <input type='number' name='point_" + index +
                    "[]' id='point' min='0' width='10' placeholder='Point' value='0' size='5'> <label for='means'> It Means : </label> <input placeholder='Description' type='text' name='means_" +
                    index +
                    "[]' id='means' style='width: 500px;'> <button type='button' class='btn btn-danger remove_point'> - </button> </div>"
                );
            });

            $(document).on('click', '.remove_point', function() {
                $(this).parent().remove();
            });
        });
    </script>
@endsection
