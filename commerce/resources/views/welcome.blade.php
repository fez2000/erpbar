<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image: url('/img/beer.jpeg');
                background-size: 100%;
                color: #fff;
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
                color: #ffb;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
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
        <div class="flex-center position-ref full-height">
          
            <div class="top-right links">
                    
                        <a href="{{ url('/home') }}">Home</a>
                    
                        <a href="{{ url('admin') }}">Admin</a>

                    
                    
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Bar-managemnt
                </div>
                <div class="subtitle m-b-md">
                    gagner en performance avec votre logiciel de gestion bar
                </div>
                <div class="links">
                    <a href="/admin/comptabilite">Comptabitite</a>
                    <a href="/admin/paie">Paie</a>
                    <a href="/admin/stock">Stock</a>

                </div>
            </div>
        </div>
        <script src="/js/app.js">
        
        </script>
    </body>
</html>
