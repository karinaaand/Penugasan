<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title ?? 'SIMBAT' }}</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>

    <body class="flex min-h-screen flex-col items-center justify-center">
        <img src="{{ asset('assets/logo simbat.png') }}" class="w-18" alt="" />
        @yield('container')
    </body>
</html>
