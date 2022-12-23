@extends('admin/layout/master_templete')

@section('title')
    <title>
        View Topic
    </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')

    <style>
        .tf_div span {
            width: 59px;
            display: inline-block;
            background-color: #4aabe1;
            color: #fff;

            text-align: center;
            border-radius: 10px;
            padding: 1px 0px;
            cursor: pointer;

        }

        .tf_div span {
            width: 75px;
            text-align: left;
            padding-left: 10px;
            height: 29px;
            padding-top: 2px;
            background-color: #d9534f;
            cursor: default;
        }

        .tf_div span:first-child {
            background-color: #5cb85c;
        }
    </style>
@endsection

@section('page_content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div style="float:left">
            <h1 class="h3 mb-2 text-gray-800" style=""> View Topic </h1>
        </div>
        <div align="right">
            <h1 class="h3 mb-2 text-gray-800" style="margin-right:30px"> Status : @if ($topic[0]['status'] == 'UA')
                    Under-Approval
                @elseif($topic[0]['status'] == 'R')
                    Rejected
                @elseif($topic[0]['status'] == 'A')
                    Approved
                @endif
            </h1>
        </div>
        <hr style="margin: 0px;">
        @if (Session('msg'))
            <p align="center" class="alert alert-danger"> {{ Session('msg') }} </p>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-sm-12">
                    </br>
                    <h1 class="h5 mb-2 text-gray-800" style="display: inline-block;"><b> Topic Name: </b></h1>
                    <p style="display: inline-block;">{{ $topic[0]['topic'] }}</p>
                    <?php $topic_id_for_edit = $topic[0]['id']; ?>
                    <h1 class="h5 mb-2 text-gray-800"><b> Topic Material: </b></h3>
                        @foreach ($topic[0]['topics_data'] as $data)
                            <div style="border: 1px solid grey;padding: 15px;border-radius: 7px;margin:10px 0px">
                                @if ($data['type'] == 'V')
                                    <iframe width="420" height="315" src='<?php echo preg_replace('/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i', "https://www.youtube.com/embed/$1", $data['video_url']); ?>' frameborder="0"
                                        allowfullscreen></iframe>
                                    <p style="padding-top:10px"><b> Video Title: </b>{{ $data['video_title'] }}</p>
                                    <h5 style="display: inline-block;margin: 0px;"><b> Video Content: </b></h5>
                                    {{ $data['content'] }}
                                    <p style="padding-top:10px"><b> Time : </b>
                                        @if ($data['time'] / 60 >= 1)
                                            @if ($data['time'] / 60 < 10)
                                                0{{ (int) ($data['time'] / 60) }}
                                            @else
                                                {{ (int) ($data['time'] / 60) }}
                                                @endif @if ((int) ($data['time'] / 60) == 1)
                                                    Minute
                                                @else
                                                    Minutes
                                                @endif
                                            @endif
                                            @if ($data['time'] % 60 > 0 || (int) ($data['time'] / 60) == 0)
                                                @if ($data['time'] % 60 < 10)
                                                    0{{ (int) ($data['time'] % 60) }}
                                                @else
                                                    {{ (int) ($data['time'] % 60) }}
                                                @endif
                                                @if ((int) ($data['time'] % 60) == 1)
                                                    Second
                                                @else
                                                    Seconds
                                                @endif
                                            @endif
                                    </p>
                                @elseif($data['type'] == 'R')
                                    <p style="padding-top:10px"><b> Reading Title: </b>{{ $data['video_title'] }}</p>
                                    <h5 style="display:inline-block;margin: 0px;"><b> Reading Content: </b></h5>
                                    {!! $data['content'] !!}
                                    <p style="padding-top:10px"><b> Time : </b>
                                        @if ($data['time'] / 60 >= 1)
                                            @if ($data['time'] / 60 < 10)
                                                0{{ (int) ($data['time'] / 60) }}
                                            @else
                                                {{ (int) ($data['time'] / 60) }}
                                            @endif
                                            @if ((int) ($data['time'] / 60) == 1)
                                                Minute
                                            @else
                                                Minutes
                                            @endif
                                        @endif
                                        @if ($data['time'] % 60 > 0 || (int) ($data['time'] / 60) == 0)
                                            @if ($data['time'] % 60 < 10)
                                                0{{ (int) ($data['time'] % 60) }}
                                            @else
                                                {{ (int) ($data['time'] % 60) }}
                                            @endif
                                            @if ((int) ($data['time'] % 60) == 1)
                                                Second
                                            @else
                                                Seconds
                                            @endif
                                        @endif
                                    </p>
                                @elseif($data['type'] == 'Q')
                                    <h2> Quiz </h2>
                                    <hr style="margin-top:0px">
                                    @if ($quiz_question != null)
                                        @php
                                            $q_counter = 0;
                                        @endphp
                                        @foreach ($quiz_question as $question)
                                            @php
                                                $q_counter++;
                                            @endphp

                                            <p><b>Q.{{ $q_counter }}: </b>{{ $question['q_title'] }}</p>

                                            @if ($question['question_type'] == 1)
                                                @php
                                                    $q_option_counter = 'a';
                                                @endphp
                                                @foreach ($question['question_options'] as $options)
                                                    @php
                                                        $sub_answer = '';
                                                    @endphp

                                                    @if ($options['question_options_attempt'] != null)
                                                        @php
                                                            $sub_answer = $options['question_options_attempt']['sub_answer'];
                                                        @endphp
                                                    @endif

                                                    <div style="margin:10px 50px 10px 50px">
                                                        <div>
                                                            <p style='margin: 0px;'><br> Q.{{ $q_counter }}
                                                                ({{ $q_option_counter }})
                                                                </b> {{ $options['o_title'] }}
                                                            </p>
                                                        </div>
                                                        <div class="tf_div">

                                                            <span>
                                                                <input type="radio"
                                                                    @if ($options['sub_answer'] == 1) checked @endif
                                                                    disabled
                                                                    id="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                                                    name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                                                    value="1">
                                                                <label
                                                                    for="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">True</label>
                                                            </span>&nbsp;&nbsp;
                                                            <span>
                                                                <input type="radio"
                                                                    @if ($options['sub_answer'] == 0) checked @endif
                                                                    disabled
                                                                    name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                                                    id="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                                                    value="0">
                                                                <label
                                                                    for="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">False</label>
                                                            </span>&nbsp;&nbsp;
                                                        </div>
                                                    </div>
                                                    @php
                                                        $q_option_counter++;
                                                    @endphp
                                                @endforeach
                                            @elseif($question['question_type'] == 2)
                                                @php
                                                    $q_option_counter = 0;
                                                @endphp
                                                @foreach ($question['question_options'] as $options)
                                                    @php
                                                        $q_option_counter++;
                                                    @endphp


                                                    <div style="margin:10px 50px 10px 50px">
                                                        <span>
                                                            <input @if ($q_option_counter == $question['correct_answer']) checked @endif
                                                                disabled type="radio"
                                                                id="baq_ans_{{ $q_counter . '_' . $q_option_counter }}"
                                                                name="baq_ans_{{ $q_counter }}"
                                                                value="{{ $q_option_counter }}">
                                                            <label for="baq_ans_{{ $q_counter . '_' . $q_option_counter }}"
                                                                style="margin-left: 5px;">{{ $options['o_title'] }}</label>
                                                        </span>&nbsp;&nbsp;
                                                    </div>
                                                @endforeach
                                            @elseif($question['question_type'] == 3)
                                                <div style="margin-top: 8px;margin-left: 10px;margin-right: 20px;">
                                                    <textarea disabled spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off" style="max-width:100%"
                                                        name="seq_ans_{{ $q_counter }}" class="form-control content" id="q_seq_1" rows="8"
                                                        placeholder="Write Answer here...">{{ $answer }}</textarea>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                    <hr style="margin-top: 3px;">
                                    <p style="padding-top:10px"><b> Time : </b>
                                        @if ($data['time'] / 60 >= 1)
                                            @if ($data['time'] / 60 < 10)
                                                0{{ (int) ($data['time'] / 60) }}
                                            @else
                                                {{ (int) ($data['time'] / 60) }}
                                                @endif @if ((int) ($data['time'] / 60) == 1)
                                                    Minute
                                                @else
                                                    Minutes
                                                @endif
                                                @endif @if ($data['time'] % 60 > 0 || (int) ($data['time'] / 60) == 0)
                                                    @if ($data['time'] % 60 < 10)
                                                        0{{ (int) ($data['time'] % 60) }}
                                                    @else
                                                        {{ (int) ($data['time'] % 60) }}
                                                        @endif @if ((int) ($data['time'] % 60) == 1)
                                                            Second
                                                        @else
                                                            Seconds
                                                        @endif
                                                    @endif <b> - Result Auto Annouce</b> :
                                                    {{ $data['quiz_result_status'] ? 'YES' : 'NO' }}
                                    </p>
                                @endif
                            </div>
                        @endforeach

                        <div>
                            <textarea style="max-width:100%" name="admin_comment" id="admin_comment" class="form-control " rows="6"
                                placeholder="Admin Comment, Write here Comment"><?php echo $topic[0]['admin_comment']; ?></textarea>
                            <p style="color:red;margin-top: 5px;" id="admin_comment_msg"></p>
                        </div>

                        <div align="right" style="margin:10px 0px 80px 0px">
                            @if ($topic[0]['status'] == 'UA')
                                <?php $topic_id_for_edit = $topic[0]['id']; ?>
                                <a href='{{ url("admin/view_added_courses/edit-topic/$topic_id_for_edit") }}'
                                    class="btn btn-success"> Edit Topic </a> <a
                                    href='{{ url("admin/view_added_courses/reject-topic/$topic_id_for_edit") }}'
                                    onclick="return confirm('Do you want Reject?')" class="btn btn-danger"> Reject </a> <a
                                    href='{{ url("admin/view_added_courses/approve-topic/$topic_id_for_edit") }}'
                                    onclick="return confirm('Do you want Approve?')" class="btn btn-primary"> Approve </a>
                            @endif
                        </div>
                </div>
            </div>

        </div>

    </div>


    <!-- /.container-fluid -->
@endsection

@section('footer')
    @include('admin/include/footer')
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
            $('#dataTable').DataTable();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        $("#admin_comment").blur(function() {
            $('#admin_comment_msg').html('');
        });

        $("#admin_comment").keyup(function() {
            var admin_comment = $(this).val();
            $('#admin_comment_msg').html('');
            //alert(admin_comment);

            $.ajax({
                url: "{{ url('/admin/doaddcommenttopic') }}",
                type: 'POST',
                data: {
                    admin_comment: admin_comment,
                    id: <?php echo $topic[0]['id']; ?>
                },
                success: function(data) {
                    $('#admin_comment_msg').html('Comment Updated');
                }
            });



        });
    </script>
@endsection
