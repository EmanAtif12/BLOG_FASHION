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
   

</head>
<body>
    @include('layouts.header')

    <main>
       {{ $slot }}
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @stack('scripts')
   

    @include('layouts.footer')
</body>
</html>
