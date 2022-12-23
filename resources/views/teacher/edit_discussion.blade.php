@extends('teacher/layout/master_templete')

@section('title')
    <title> Edit Topic </title>
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
        <h1 class="h3 mb-2 text-gray-800">Edit Discussion Board</h1>
        @if (Session::has('success'))
            <p style="color: rgb(0, 255, 21); font-weight: 600; background-color: rgb(255, 255, 255);">
                {{ Session::get('success') }}</p>
        @endif
        <form method="post" action="{{ url('teacher/doupdate_discussion', $discussion[0]->thread_id) }}">
            @csrf
            @method('PATCH')
            <ul style="color:red;margin-left: -25px;" id="empty_topic_error"></ul>
            <div class="form-group">
                <label for="topic_name"> Discussion Topic </label>
                <input type="text" name="topic_name" class="form-control @error('topic_name') error @enderror"
                    id="topic_name" placeholder="Topic" value="{{ $discussion[0]->thread_title }}">
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
