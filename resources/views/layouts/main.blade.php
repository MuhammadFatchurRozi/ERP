<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP</title>
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/animated.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')
    {{-- SIDEBAR --}}
    @include('partials.sidebar')
    {{-- CONTENT --}}
    @yield('container')

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/js/chart.min.js') }}"></script>
    <script src="{{ asset('style/js/chart-data.js') }}"></script>
    <script src="{{ asset('style/js/easypiechart.js') }}"></script>
    <script src="{{ asset('style/js/easypiechart-data.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('style/js/custom.js') }}"></script>
    <script src="{{ asset('style/js/animation.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('style/js/jquery.min.js') }}"></script> --}}
</body>

</html>
