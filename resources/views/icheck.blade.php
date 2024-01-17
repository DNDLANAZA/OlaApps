<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ola Apps</title>
        <meta content="Me" name="author">

        @include('partials/check/linkCss')


      </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('partials/check/header')
        </header>
        <!-- End Header -->
        @include('partials/check/sidebar')
        <main id="main" class="main">
            @include('partials/check/topbar')

            @yield('content')
          
        </main>
        <!-- End #main -->
        @include('partials/check/footer')

        @include('partials/check/linkJs')
      
      </body>
</html>
