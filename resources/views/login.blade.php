<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('new/css/login.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <style>
        body {
            background: url({{ '/images/Login-bg.png' }});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            padding: 50px 0;
        }
    </style>

    <div class="st-login-body">
        <div class="white-panel">
            <div class="login-show">
                <div class="login-body">
                    <img src="{{ asset('images/Login-login.png') }}">
                    <h2 style="margin-top: 20px;"><b>LOGIN</b></h2>
                    @if (Session::has('message'))
                        <p style="color:red">{{ Session::get('message') }}</p>
                    @endif
                    <span style="color:red" id="msg_register"></span>
                    <form style="margin-top: 30px;" action="login" method="post">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="submit" value="Login">
                        <a class="fotget-btn" href="">Forgot password?</a>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="register-box">
            <h2>Don't have an account?</h2>
            <a href="{{ url('/register') }}">
                <label id="label-login" for="log-login-show">Register</label>
            </a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.login-info-box').fadeOut();
            $('.login-show').addClass('show-log-panel');
        });
    </script>

</body>

</html>
