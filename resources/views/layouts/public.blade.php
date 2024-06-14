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
        Guide Booking System
    </title>
    <!--     Fonts and icons     -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- <link rel="stylesheet" href="{{ asset('css/material-dashboard.css?v=2.0.0') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/mysTyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/agency.css') }}">

    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
</head>

<body class="">
                @include('layouts.navbar')


                @include('errors')

                @if(Request::is('user-detail/*') || Request::is('tour/*'))
                    @if($topAd->status == 1)
                        <div class="container">
                            @if($topAd->isBanner == 1)
                                <img src="{{asset('images/ad').'/'.$topAd->image}}" class="img-fluid">
                            @else
                                {!! html_entity_decode($topAd->adcode) !!}
                            @endif
                        </div>
                    @endif
                 @endif

                    @yield('content')



                    @if($bottomAd->status == 1)
                        <div class="container">
                            @if($bottomAd->isBanner == 1)
                                <img src="{{asset('images/ad').'/'.$bottomAd->image}}" class="img-fluid">
                            @else
                                {!! html_entity_decode($bottomAd->adcode) !!}
                            @endif
                        </div>
                    @endif


            @include('layouts.footer')
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
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{ asset('js/material-dashboard.js?v=2.0.0') }}"></script>

</html>



