<!DOCTYPE html>
<html lang="en">
<head>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bookshelf</title>

  <!-- FAVICON -->
{{--  <link href="{{ asset('assets/img/favicon.png')}}" rel="shortcut icon">--}}
  <!-- PLUGINS CSS STYLE -->
{{--  <link href="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">--}}
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{ asset('assets/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{ asset('assets/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
{{--<!--  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->--}}
{{--<!--  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->--}}
  <![endif]-->

</head>

<body class="body-wrapper">
@include('visitor.layouts.partials._header')
@section('content')
@show
@include('visitor.layouts.partials._footer')
<!-- JAVASCRIPTS -->
<script src="{{asset('assets/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
<!-- tether js -->
<script src="{{asset('assets/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{asset('assets/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{asset('assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('assets/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('assets/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{asset('assets/plugins/google-map/gmap.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>

</body>
</html>
