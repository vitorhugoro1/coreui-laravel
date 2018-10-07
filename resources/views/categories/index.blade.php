<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>{{ config('app.name') }}</title>

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Styles required by this views -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="container-fluid">
    <nav class="navbar navbar-light">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
        </a>
        <div>
            <form action="">
                <div>
                    <label for="">search</label>
                    <input type="search">
                </div>
            </form>
        </div>
    </nav>
    <div class="app-body">
        <main class="main" id="app">

        </main>
    </div>

    @yield('scripts')
</body>
</html>