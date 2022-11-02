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

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!--[if lt IE 9]>
 <script src="js/html5shiv.js"></script>
 <script src="js/respond.min.js"></script>
 <![endif]-->
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')
    {{-- SIDEBAR --}}
    @include('partials.sidebar')
    {{-- CONTENT --}}
    @yield('container')

    <script src="{{ asset('style/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/js/chart.min.js') }}"></script>
    <script src="{{ asset('style/js/chart-data.js') }}"></script>
    <script src="{{ asset('style/js/easypiechart.js') }}"></script>
    <script src="{{ asset('style/js/easypiechart-data.js') }}"></script>
    <script src="{{ asset('style/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('style/js/custom.js') }}"></script>
    <script>
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html>
