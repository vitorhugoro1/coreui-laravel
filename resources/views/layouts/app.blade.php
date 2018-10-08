<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles required by this views -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    @include('layouts.menu')
    <div class="app-body">
        <main class="main" id="app">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
