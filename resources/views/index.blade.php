<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ola Apps</title>
        <meta content="Me" name="author">

        @include('partials/linkCss')


      </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            @include('partials/header')
        </header>
        <!-- End Header -->
        @include('partials/sidebar')
        <main id="main" class="main">
            @include('partials/topbar')

            @yield('content')
            
        </main>
        <!-- End #main -->
        @include('partials/footer')

        @include('/partials/linkJs')
      
      </body>
</html>
