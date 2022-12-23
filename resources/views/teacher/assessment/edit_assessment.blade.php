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
            /* width: 70%; */
            margin: auto;
        }

        .error {
            border-color: red;
        }
    </style>

    <div style="padding: 0px 40px;">
        <h1 class="h3 mb-2 text-gray-800">Edit Peer Assessment</h1>
        @if (Session::has('success'))
            <p style="color: rgb(0, 255, 21); font-weight: 600; background-color: rgb(255, 255, 255);">
                {{ Session::get('success') }}</p>
        @endif
        <form method="post" action="{{ url('teacher/doupdate_assessment', $assessment->id) }}">
            @method('PATCH')
            @csrf
            <ul style="color:red;margin-left: -25px;" id="empty_topic_error"></ul>
            <div class="form-group">
                <label for="assessment_name"> Assessment Title </label>
                <input type="text" name="assessment_name" class="form-control @error('assessment_name') error @enderror"
                    id="assessment_name" placeholder="Assessment Title..." value="{{ $assessment->asessment_title }}">
                @error('assessment_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <ul class='name-error-msg' style='color:red'></ul>
            </div>
            <div class="form-group">
                <label for="assessment_name"> Is Active? </label>
                <input type="checkbox" name="is_active" class=" @error('is_active') error @enderror" id="is_active"
                    {{ $assessment->status ? 'checked' : '' }}>
                @error('is_active')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div id="add_on_click">

            </div>



            <input type="hidden" name="week_id" value="{{ $week->id }}" />
            <input type="hidden" name="course_id" value="{{ $course->id }}" />
            <input type="submit" class="btn btn-primary" value="Update" />
        </form>

        <div style="display:none" id="assessment_div">
            <div class="form-group" data-id="" style="border: 1px solid grey;padding: 15px;border-radius: 7px;">
                <input type="hidden" name="type[]" value="V" />
                <label for="instructions"> Instruction : </label>
                <textarea style="max-width:100%" name="instructions[]" class="form-control" id="instructions" rows="8"
                    placeholder="Insertuctions..."></textarea>
                <br>
                <br>
                <button type="button" class="btn btn-danger remove_div"> Remove </button>
            </div>
        </div>



    </div>
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

@section('js')
@endsection
