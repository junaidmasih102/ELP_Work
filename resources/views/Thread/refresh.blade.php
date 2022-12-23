<br>
@foreach ($discussion as $item)
    <div id="data_">
        <div class="col-md-10">
            <span style="font-size: 20px; font-weight: 900; color: black;"
                class="General-Discussion-div-1-p1"><span>{{ $item->msg_text }}</span> </span> <br>
            <span style="font-size: 14px; font-weight: 900; color: black;">By :
                {{ App\Models\User::where('id', '=', $item->msg_by)->pluck('name')->first() }}</span><br>
            <sub>{{ $item->post_time }}</sub><br>
            <hr>
        </div>
        <div class="col-md-2">
            <a href="/view_thread/{{ $item->msg_id }}"
                style="font-size: 14px; color: blue; float:">{{ count(App\Models\Threadmsg::where('reply_to', '=', $item->msg_id)->get()) > 0 ? 'see ' . count(App\Models\Threadmsg::where('reply_to', '=', $item->msg_id)->get()) : '0 Reply' }}</a>
            <a href="/view_thread/{{ $item->msg_id }}" style="font-size: 16px; color: blue; float:">Reply</a>
        </div>
    </div>
@endforeach
