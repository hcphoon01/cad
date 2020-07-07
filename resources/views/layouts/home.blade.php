<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'City of London RP') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a href="{{route('landing')}}" class="pull-left"><img class="navbar-logo" src="{{asset('img/1logo.png')}}" height="75"></a>
    </nav>
    <main class="py-4 container">
        @yield('content')
    </main>
</body>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@yield('scripts')
</html>