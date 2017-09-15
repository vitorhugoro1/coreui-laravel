<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.6
 * @link http://coreui.io
 * Copyright (c) 2017 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <title>RVD | @yield('title')</title>

    <!-- Icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    @yield('stylesheet')

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    @include('layout.header')

    <div class="app-body">

        <!-- Sidebar -->
            @include('layout.sidebar')
        <!-- End of Sidebar -->

        <!-- Main content -->
        <main class="main">

            <!-- Breadcrumb -->
                @include('layout.breadcrumb')                
            <!-- End of Breadcrumb -->

            <!-- Content -->
            <div class="container-fluid">   
                <div class="animated fadeIn">   
        
                    @yield('content')

                </div>
            </div>
            <!-- Content -->


        </main>

        <!-- Aside Menu -->
            @include('layout.asidemenu')
        <!-- End of Aside Menu -->



    </div>
    
    <!-- Footer -->
        @include('layout.footer')  
    <!-- End of Footer -->

    <!-- Scripts -->
        @include('layout.scripts')
        @yield('scripts')
    <!-- End of Scripts -->
    

</body>

</html>