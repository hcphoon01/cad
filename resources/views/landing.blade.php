<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        html,
        body {
            color: #eee;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .bg-image {
            background: url('img/landing.png') no-repeat;
            overflow: hidden;
            width: 100%;
            height: 100%;
            position: relative;
            background-size:cover
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .text-links>a {
            padding: 0 25px;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            -webkit-text-stroke: 0.5px #eee;
        }

        .icon-links>a {
            color: #ccc;
            margin: 0 25px;
            font-size: 15px;
            font-weight: 800;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a href="{{route('landing')}}" class="pull-left"><img class="navbar-logo" src="img/1logo.png"></a>
    </nav>
    <div class="bg-image">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Welcome to City of London RP
                </div>

                <div class="text-links">
                    <div class="row justify-content-md-center">
                        <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Apply Now</a>
                    </div>
                    <br>
                    <div class="row justify-content-md-center">
                        <a class="btn btn-primary" href="{{route('login')}}" role="button">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>