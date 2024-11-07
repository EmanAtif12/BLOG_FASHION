<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Fashion</title>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @include('home.homecss')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="{{ asset('js/custom.js') }}"></script>

   @include('home.homecss')


</head>
<!-- Body Content -->
<body>
    @include('layouts.header')
    <main>
       {{ $slot }}
    </main>
    @include('layouts.footer')
</body>
</html>
