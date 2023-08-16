<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('assets/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/simple-datatables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <title>Document</title>
</head>

<body>
    @include('layouts.header')
    @include('layouts.sidebar')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @yield('content')
    @include('layouts.footer')
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/js/quill.min.js') }}"></script>
    <script src="{{ asset('assets/js/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
