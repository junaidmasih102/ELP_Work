<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')



    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/startmin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    @yield('css')

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @yield('nav')


        <!-- Sidebar -->
        @yield('sidebar')

        @yield('sidebarcourses');


        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">


                <!-- Page Content start -->
                <div class="inner-page-wrapper">
                    @yield('page_content')
                </div>

                <!-- Page Content end -->

            </div>
        </div>
    </div>
    <!-- Footer -->
    @yield('footer')
    @yield('js')
</body>

</html>
