@extends('admin/layout/master_templete')

@section('title')
    <title> Add Instructor Signature </title>
@endsection

@section('nav')
    @include('admin/include/nav')
@endsection

@section('sidebar')
    @include('admin/include/sidebar')
@endsection

@section('page_content')
    <div style="padding: 0px 40px;">
        <h1 class="h3 mb-2 text-gray-800">Add Instructor Signature</h1>
        <form id="add_instructor_signature" style="margin-top:40px;">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Instructor Name</label>
                <input type="text" name="instructor_name" placeholder="Instructor Name" class="form-control">
                <ul class='instructor-name-error-msg' style='color:red'></ul>
            </div>
            <div class="form-group" style="margin-top:20px;">
                <label for="exampleFormControlInput1">Instructor Signature</label>
                <input type="file" name="instructor_signature" class="form-control">
                <ul class='instructor-signature-error-msg' style='color:red'></ul>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Signature</button>
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
                $("#add_instructor_signature").unbind("submit").submit(function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        url: "{{ url('/admin/doaddinstructorsignature') }}",
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if ($.isEmptyObject(data.error)) {
                                // alert("sdsads");
                                window.location.href = "{{ url('/admin/addinstructorsignature') }}";
                            } else {
                                //printErrorMsg(data.error);
                                $(".instructor-name-error-msg").html('');
                                $(".instructor-signature-error-msg").html('');

                                if (data.error_name != "") {
                                    $(".instructor-name-error-msg").append('<li>' + data
                                        .error_name +
                                        '</li>');
                                }

                                if (data.error_image != "") {
                                    $(".instructor-signature-error-msg").append('<li>' + data
                                        .error_image +
                                        '</li>');
                                }
                            }
                        }
                    });
                });
            });
        </script>
    @endsection
