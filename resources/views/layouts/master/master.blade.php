<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/apple-icon.png">
    <link rel="icon" href="img/favicon.png">
    <title>
        {{ config('app.name', 'Laravel') }} - @yield('title')
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('css/material-dashboard.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/datatables.min.css') }}">

    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <!-- Datatables js -->
    <script src="{{ asset('dataTable/datatables.min.js') }}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $('textarea').ckeditor();
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="img/sidebar-1.jpg">
            @include('layouts.master.sidebar')
        </div>

        <div class="main-panel">
            <!-- Navbar -->
                @include('layouts.master.navbar')
            <!-- Navbar end -->

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>


            @include('layouts.master.footer')
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-material-design.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{ asset('js/plugins/arrive.min.js') }}" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>


</html>



