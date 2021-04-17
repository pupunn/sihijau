<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'GSR') }}</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-style></x-style>
</head>

<body>
    <x-sidebar_admin></x-sidebar_admin>
    <div id="right-panel" class="right-panel">
        <x-navbar></x-navbar>
        <div class="content">
            <div class="animated fadeIn">
                @yield('content')
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- <x-footer></x-footer> --}}
    </div>
    @stack('script')
    <script src="{{ asset('js/backend.js') }}"></script>
    <x-script></x-script>
    <!-- Scripts -->
</body>

</html>
