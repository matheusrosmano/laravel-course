<html>
    <head>
        <link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Cadastro</title>
        <style type="text/css">
            body {
                padding: 5%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <main role="main">
                @hasSection('body')
                    @yield('body')
                @endif
            </main>
        </div>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    </body>
</html>
