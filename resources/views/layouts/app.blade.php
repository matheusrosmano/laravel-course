<html>
    <head>
        <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Cadastro</title>
        <style type="text/css">
            body {
                padding: 2%;
            }
            .navbar {
                margin: 1%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <x-navbar current="{{$current}}" />
            <main role="main">
                @hasSection('body')
                    @yield('body')
                @endif
            </main>
        </div>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        @hasSection('javascript')
            @yield('javascript')
        @endif
    </body>
</html>
