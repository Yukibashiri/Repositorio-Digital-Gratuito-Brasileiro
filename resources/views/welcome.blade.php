<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Repositório Digital</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
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
            font-size: 2.16em;
            font-weight: bold;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            align-content: center;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 2em;
        }
        .m-b-img {
            margin-bottom: 5px;
        }




        form > .textbox {
            outline: 0;
            height: 3.6em;
            width: 50em;
            line-height: 42px;
            padding: 0 16px;
            background-color: rgba(255, 255, 255, 1);
            color: #212121;
            border: 0;
            float: left;
            -webkit-border-radius: 1px 0 0 1px;
            border-radius: 1px 0 0 1px;
        }

        form > .textbox:focus {
            outline: 0;
            background-color: #FFF;
        }

        form > .button {
            outline: 0;
            background: url("{!! asset('assets/images/lupa.png') !!}") no-repeat scroll ;
            background-size: 100% 100%;
            height: 3.6em;
            width: 4.2em;
            padding: -2px 16px;
            line-height: 42px;
            border: 0;
            -webkit-border-radius: 1px 0 0 1px;
            border-radius: 1px 0 0 1px;
        }

        form > .button:hover {
            background-color: rgba(0, 150, 136, 0.8);
        }
    </style>

    <style>
        body {
            background: #b20053;
            background: -moz-linear-gradient(45deg, #b20053 0%, #ff262f 22%, #ba007c 69%, #7b075e 100%);
            background: -webkit-linear-gradient(45deg, #b20053 0%,#ff262f 22%,#ba007c 69%,#7b075e 100%);
            background: linear-gradient(45deg, #b20053 0%,#ff262f 22%,#ba007c 69%,#7b075e 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b20053', endColorstr='#7b075e',GradientType=1 );
        }

        .text-color {
            color: #edeef0 !important;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">

            @auth
                <a href="{{ url('/') }}" class="text-color">Inicio</a>
                @if(auth()->user()->categoria_id != 3)
                    <a href="{{ url('/dashboard') }}" class="text-color">Dashboard</a>
                @endif
            @else
                <a href="{{ url('/dashboard') }}" class="text-color">Dashboard</a>
                <a href="{{ url('/compartilhar') }}" class="text-color">Form Item</a>
                <a href="{{ route('login') }}" class="text-color">Login</a>
                <a href="{{ route('registrar') }}" class="text-color">Cadastrar</a>
            @endauth
        </div>
    @endif

    <div class="content">

        <div class="m-b-img">
            <img height="26%" width="26%" src="{!! asset('assets/images/logo-intro.png') !!}" alt="logo-ies" class="dark-logo" />
        </div>

        <div class="title m-b-md text-color">
            {{ config('app.name') }}
        </div>
        <div class="flex-center" >
            <form >
                <input type="text" class="textbox" placeholder="Digite o que procura..">
                <input title="Search" value="" type="submit" class="button" style="display:inline-block">
            </form>
        </div>
    </div>
</div>
</body>
</html>
