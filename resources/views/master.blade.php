<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

        <!-- Bootstrap core C SS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
        <link href="{{asset('css/style.css')}}" rel="stylesheet" >




        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="blog.css" rel="stylesheet">
    </head>


<body>
    <div class="container">

     @include('partial.navbar')
     @includeWhen(request()->is('/'),'partial.slide')

</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

      @yield('content')

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
        @include('partial.sidebar')
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

@include('partial.footer')
