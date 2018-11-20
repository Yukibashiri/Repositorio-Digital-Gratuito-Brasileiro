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
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        form {
            outline: 0;
            float: left;
            margin-left: 150px;
            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }

        form > .textbox {
            outline: 0;
            height: 42px;
            width: 244px;
            line-height: 42px;
            padding: 0 16px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #212121;
            border: 0;
            float: left;
            -webkit-border-radius: 4px 0 0 4px;
            border-radius: 4px 0 0 4px;
        }

        form > .textbox:focus {
            outline: 0;
            background-color: #FFF;
        }

        form > .button {
            outline: 0;
            background: none;
            background-color: rgba(38, 50, 56, 0.8);
            float: left;
            height: 42px;
            width: 70px;
            text-align: center;
            line-height: 42px;
            border: 0;
            color: #FFF;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: 16px;
            text-rendering: auto;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
            -webkit-transition: background-color .4s ease;
            transition: background-color .4s ease;
            -webkit-border-radius: 0 4px 4px 0;
            border-radius: 0 4px 4px 0;
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
        <div class="title m-b-md text-color">
            Repositório Digital
        </div>

        <div class="links" align="center">
            <form >
                <input type="text" class="textbox" placeholder="Digite o que procura..">
                <input title="Search" value="Buscar" type="submit" class="button">
            </form>
        </div>
    </div>
</div>
</body>
</html>
