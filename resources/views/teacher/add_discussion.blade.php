@extends('teacher/layout/master_templete')

@section('title')
    <title> Add Topic </title>
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
            width: 70%;
            margin: auto;
        }

        .error {
            border-color: red;
        }
    </style>
    <div style="padding: 0px 40px;">
        <h1 class="h3 mb-2 text-gray-800">Add Discussion Board</h1>
        <form id="" method="post" action="{{ url('teacher/doadd_discussion') }}">
            @csrf
            <ul style="color:red;margin-left: -25px;" id="empty_topic_error"></ul>
            <div class="form-group">
                <label for="topic_name"> Discussion Topic </label>
                <input type="text" name="topic_name" class="form-control @error('topic_name') error @enderror"
                    id="topic_name" placeholder="Topic">
                @error('topic_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <ul class='name-error-msg' style='color:red'></ul>
            </div>
            <input type="hidden" name="week_id" value="{{ $week_id }}">
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <button type="submit" class="btn btn-primary"> Generate Thread </button>
            </br>
            </br>
        </form>
    </div>
@endsection

@section('footer')
    @include('teacher/include/footer')
@endsection

