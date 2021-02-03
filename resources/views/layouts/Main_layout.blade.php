<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    Cabinet Medical
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--     Fonts and icons     -->
  <link href="{{ URL::to('/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet" />
  <link href="{{ URL::to('/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{URL::to('fonts/iconic/css/material-design-iconic-font.min.css')}}">
  <!-- CSS Files -->
  <link href="{{ URL::to('/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ URL::to('/css/main.css') }}" rel="stylesheet" />
</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
    <!--start of sidebar -->
    @include('layouts.sidebars.Sidebar')
    <div class="main-panel">
      @include('layouts.navs.navbar-row')
      @yield('contenu')
    </div>
  </div>
  <!--   Core JS Files   -->
  
  <!--  Google Maps Plugin    -->

</body>

</html>
