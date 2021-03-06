<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.6
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
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>CoreUI - Open Source Bootstrap Admin Template</title>

  <!-- Icons -->
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{ mix('css/coreui-standalone.css') }}" rel="stylesheet">
  <!-- Styles required by this views -->
  <link rel="stylesheet" href="{{ mix('css/custom.css') }}">
  <link rel="stylesheet" href="{{ mix('css/vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ mix('css/vendor/select2/select2-bootstrap.min.css') }}">
</head>
<!-- BODY options, add following classes to body to change options
'.header-fixed' - Fixed Header
'.brand-minimized' - Minimized brand (Only symbol)
'.sidebar-fixed' - Fixed Sidebar
'.sidebar-hidden' - Hidden Sidebar
'.sidebar-off-canvas' - Off Canvas Sidebar
'.sidebar-minimized'- Minimized Sidebar (Only icons)
'.sidebar-compact'    - Compact Sidebar
'.aside-menu-fixed' - Fixed Aside Menu
'.aside-menu-hidden'- Hidden Aside Menu
'.aside-menu-off-canvas' - Off Canvas Aside Menu
'.breadcrumb-fixed'- Fixed Breadcrumb
'.footer-fixed'- Fixed footer
-->

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden sidebar-show">
  @include('panel.navbar')

  <div class="app-body">
    @include('panel.sidebar')
    <!-- Main content -->
    <main class="main" id="app">

      <!-- Breadcrumb -->
      @include('panel.breadcrumb')

      @yield('content')
      <!-- /.container-fluid -->
    </main>

  </div>

  @include('panel.footer')

  @include('panel.scripts')
  @yield('myscript')

</body>
</html>