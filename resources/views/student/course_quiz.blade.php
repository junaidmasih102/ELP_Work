@extends('student/layout/master_templete')

@section('title')
    <title> Quiz </title>
@endsection

@section('nav')
    @include('student/include/nav')
    <style>
        #page-wrapper {
            margin-left: 0px;
        }

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
    <div>
        <h2>Quiz - {{ $topics[0]['topic'] }}</h2>
        <hr>
        @if ($quiz_result)
            <div style="padding:5px">

                <div style="width:100%">
                    <div style="padding:5px 30px;display:inline-block;width: 50%;">
                        <h3><b>Result : </b>
                            @if ($quiz_result->status == 'P')
                                "Not Announce"
                            @elseif($quiz_result->status == 'A')
                                {{ $quiz_result->result . ' %' }}
                            @endif
                        </h3>
                    </div>
                    <div style="padding:5px 50px;float: right;">
                        @if ($quiz_result->status == 'A')
                            <h3><b>Grade : </b>
                                @if ($quiz_result->result >= 50)
                                    PASS
                                @else
                                    Fail
                                    @php
                                        $topic_id = $topics[0]['id'];
                                    @endphp
                                    <a id="retake_button" href='{{ url("course/$course_id/$week_/retake_quiz/$topic_id") }}'
                                        class="btn btn-primary" style="margin-left: 20px;"> Retake </a>
                                @endif
                            </h3>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
            <span style="clear:both"></span>
        @endif
        <form action="{{ url('dosubmit_quiz') }}" method="POST">
            @php
                $q_counter = 0;
            @endphp
            @foreach ($questions as $question)
                @php
                    $q_counter++;
                @endphp
                <div style="margin:30px;">
                    <input type="hidden" name="q_id_{{ $q_counter }}" value="{{ $question['q_id'] }}" />
                    <input type="hidden" name="q_type_{{ $q_counter }}" value="{{ $question['question_type'] }}" />
                    <p><b>Q.{{ $q_counter }}: </b>{{ $question['q_title'] }}</p>
                    @php
                        $answer = '';
                    @endphp
                    @if (isset($question['attempt_question'][0]['answer']))
                        @php
                            $answer = $question['attempt_question'][0]['answer'];
                        @endphp
                    @endif
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
                            <input type="hidden" name="sub_q_id_{{ $q_option_counter }}_{{ $q_counter }}"
                                value="{{ $options['o_id'] }}" />
                            <div style="margin:10px 50px 10px 50px">
                                <div>
                                    <p style='margin: 0px;'><br> Q.{{ $q_counter }} ({{ $q_option_counter }})</b>
                                        {{ $options['o_title'] }}</p>
                                </div>
                                <div class="tf_div">
                                    <span>
                                        <input type="radio" @if ($sub_answer == 1) checked @endif
                                            @if ($quiz_result) disabled @endif
                                            id="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                            name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" value="1">
                                        <label for="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">True</label>
                                    </span>&nbsp;&nbsp;
                                    <span>
                                        <input type="radio" @if ($sub_answer === 0) checked @endif
                                            @if ($quiz_result) disabled @endif
                                            name="tf_ans_{{ $q_option_counter }}_{{ $q_counter }}"
                                            id="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}" value="0">
                                        <label for="f_tf_ans_{{ $q_option_counter }}_{{ $q_counter }}">False</label>
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
                                    <input type="radio" @if ($answer == $q_option_counter) checked @endif
                                        @if ($quiz_result) disabled @endif
                                        id="baq_ans_{{ $q_counter . '_' . $q_option_counter }}"
                                        name="baq_ans_{{ $q_counter }}" value="{{ $q_option_counter }}">
                                    <label for="baq_ans_{{ $q_counter . '_' . $q_option_counter }}"
                                        style="margin-left: 5px;">{{ $options['o_title'] }}</label>
                                </span>&nbsp;&nbsp;
                            </div>
                        @endforeach
                    @elseif($question['question_type'] == 3)
                        <div style="margin-top: 8px;margin-left: 10px;margin-right: 20px;">
                            <textarea @if ($quiz_result) disabled @endif spellcheck="false" autocomplete="off" autocorrect="off"
                                autocapitalize="off" style="max-width:100%" name="seq_ans_{{ $q_counter }}" class="form-control content"
                                id="q_seq_1" rows="8" placeholder="Write Answer here...">{{ $answer }}</textarea>
                        </div>
                    @endif
                </div>
            @endforeach
            @if ($quiz_result == null)
                @csrf
                <input type="hidden" name="total_questions" value="{{ $q_counter }}" />
                <input type="hidden" name='topic_id' value="{{ $topics[0]['id'] }}" />
                <div style="margin:30px;" align="right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-arrow-circle-right fa-lg"></i> Submit
                        Answers </button>
                </div>
            @endif
        </form>
    </div>
@endsection

@section('footer')
    @include('student/include/footer')

    <script>
        //{{-- url("course/$course_id/$week_/retake_quiz/$topic_id") --}}
        //{{-- url("check_retake/$topic_id") --}}
        $('#retake_button1111').click(function() {
            $.ajax({
                url: '',
                success: function(result) {
                    //$("#div1").html(result);
                    alert(result.id);
                }
            });
        });
    </script>
@endsection
