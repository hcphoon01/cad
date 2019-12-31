<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EmergencyRP') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <div>
        @include('includes.nav')
        <main class="py-4 container-fluid">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    @yield('scripts')

    @yield('footer')
</body>
</html>
