<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? "SIMBAT" }}</title>
  @vite('resources/css/app.css')
</head>
<body>
    @include('components.sidebar')
    @yield('container')
    <h1>MAIN</h1>
</body>
</html>