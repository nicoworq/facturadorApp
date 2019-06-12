<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panel</title>

        <link rel="stylesheet" href="{{asset('css/uikit.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/nico.css')}}" />
        <script src="{{asset('/js/uikit.min.js')}}"></script>
        <script src="{{asset('/js/uikit-icons.min.js')}}"></script>
    </head>
    <body>

        @include('header')

        <br/>
        <br/>
        <br/>
        <div class="uk-container">
            @yield('content')
        </div>


    </body>
</html>
