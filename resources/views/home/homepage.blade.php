<x-web-layout>
    {{-- Import the CSS file --}}
    <head>
        <link rel="stylesheet" href="{{ asset('\public\css\style.css') }}">
    </head>

    {{-- Services section start --}}
    @include('home.services')
    {{-- Services section end --}}

    {{-- About section start --}}
    @include('home.about')
    {{-- About section end --}}
</x-web-layout>
