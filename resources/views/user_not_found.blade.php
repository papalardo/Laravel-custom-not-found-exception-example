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
                font-size: 3rem;
            }

            .links > a {
                color: #636b6f;
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
            <div class="content">
                <div>
                    <img src="data:image/png;base64,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"/>
                </div>
                <div class="title m-b-md">
                    We didnt find the user with id [{{ $ids }}]
                </div>
                <div>
                    Default message -> {{ $message }}
                </div>
            </div>
        </div>
    </body>
</html>
