<br>
@foreach ($replies as $item)
    <div id="data_">
        <div class="col-md-12">
            <span style="font-size: 20px; font-weight: 900; color: black;"
                class="General-Discussion-div-1-p1"><span>{{ $item->msg_text }}</span> </span> <br>
            <span style="font-size: 14px; font-weight: 900; color: black;">By :
                {{ App\Models\User::where('id', '=', $item->msg_by)->pluck('name')->first() }}</span><br>
            <sub>{{ $item->post_time }}</sub><br>
            <hr>
        </div>
    </div>
@endforeach
