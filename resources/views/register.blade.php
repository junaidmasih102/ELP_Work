<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('new/css/register.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <style>
        body {
            font-family: 'Mukta', sans-serif;
            height: 100vh;
            min-height: 550px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            overflow-y: hidden;
            background: url({{ '/images/Login-bg.png' }});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            padding: 50px 0;
        }
    </style>



    <div class="white-panel">
        <div class="register-show">
            <div class="login-body">
                <img src="{{ asset('images/Login-login.png') }}">
                <h2><b>REGISTER</b></h2>
                <p style="color:red" id="msg"></p>
                <form id="register">
                    <input style="margin-top: -12px;" type="text" name="name" id="name" placeholder="Name">
                    <ul style="margin: -12px;color:red" class="name-error-msg"></ul>
                    <input type="text" name="email" id="email" placeholder="Email">
                    <ul style="margin: -12px;color:red" class="email-error-msg"></ul>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <ul style="margin: -12px;color:red" class="password-error-msg"></ul>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    <ul style="margin-top: -12px;margin-bottom:-0px;color:red" class="confirm_password-error-msg"></ul>
                    @csrf
                    <input type="submit" name="submit" value="Register">
                </form>
            </div>
        </div>
    </div>
    <div class="login-reg-panel-box">
        <div class="register-box">
            <h2>Have an account?</h2>
            <a href="{{ url('/login') }}">
                <label id="label-login" for="log-login-show">Login</label>
            </a>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('.register-info-box');
            $('.register-show').addClass('show-log-panel');
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#register").unbind("submit").submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: "{{ url('/register') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if ($.isEmptyObject(data.error)) {
                            $('#name').val('');
                            $('#email').val('');
                            $('#password').val('');
                            $('#confirm_password').val('');
                            $(".name-error-msg").html('');
                            $(".email-error-msg").html('');
                            $(".password-error-msg").html('');
                            $(".confirm_password-error-msg").html('');
                            // $('#msg').html(data.msg);
                            // alert(data.msg)
                            window.location.href = "/";
                        } else {
                            $(".name-error-msg").html('');
                            $(".email-error-msg").html('');
                            $(".password-error-msg").html('');
                            $(".confirm_password-error-msg").html('');
                            if (data.error_name != "") {
                                $(".name-error-msg").append('<li>' + data.error_name + '</li>');
                            }
                            if (data.error_email != "") {
                                $(".email-error-msg").append('<li>' + data.error_email +
                                    '</li>');
                            }
                            if (data.error_password != "") {
                                $(".password-error-msg").append('<li>' + data.error_password +
                                    '</li>');
                            }
                            if (data.error_confirm_password != "") {
                                $(".confirm_password-error-msg").append('<li>' + data
                                    .error_confirm_password + '</li>');
                            }
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>
