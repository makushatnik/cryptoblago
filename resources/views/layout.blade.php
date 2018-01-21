<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cryptoblago</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!--link rel="stylesheet" type="text/css" href="css/album.css"-->
		<script src="js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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

            .auth {
                text-align: center;
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

            .login-form,
            .register-form,
            .proposal-form {
                padding-top: 5px;
                border: 2px solid #636b6f;
                border-radius: 5px;
            }
            .form-group {
                margin-bottom: 8px;
                padding: 0 5px;
                text-align: left;
            }

            .form-group label {
                width: 150px;
                float: left;
            }

            .grid {
                width: 100%;
                margin: 20px 0;ы
            }

            .grid .card {
                display: inline-block;
                width: 300px;
            }

            .card-status {
                position: absolute;
                right: 10px; bottom: 10px;
            }

            .accept-btn {
                margin-top: 20px;
            }
        </style>
    </head>
<body>
	@include('layouts.nav')

	<div class="container">
		@yield('content')
	</div>

	@include('layouts.footer')
</body>
</html>