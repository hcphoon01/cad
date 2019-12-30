<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EmergencyRP') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a href="#" class="pull-left"><img class="navbar-logo" src="img/logo.png"></a> 
        <a class="navbar-brand" href="#">EmergencyRP</a>
    </nav>
    @yield('content')
</body>
</html>
