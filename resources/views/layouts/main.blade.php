<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIMBAT' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.sidebar')
    <div class="sm:ml-64">
        @include('components.header')
    </div>
    <div class="p-4 sm:ml-64">
        @yield('container')
    </div>
</body>

</html>
