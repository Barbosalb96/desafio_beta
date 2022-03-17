<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0;
            background: #cbd5e0;

        }

        .container {
            max-width: 1980px;
            min-height: 100vh;
            width: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .card {
            height: 400px;
            width: 500px;
            background: white;
            border-radius: 7px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 12px 9px #ededed;
        }

        .btn-facebook {
            padding: 10px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            background: blue;
            width: 206px;
            transition: ease-in 600ms;
            text-align: center;
            border-radius: 4px;
            font-size: 21px;
        }

        .title-login-facebook {
            color: blue;
        }

        .btn-facebook:hover {
            background: cornflowerblue;
            transition: ease-in 600ms;
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2 class="title-login-facebook">Fazer login com o facebook</h2>
        <a href="{{route('facebook')}}"  class="btn-facebook">facebook</a>


    </div>
</div>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '507068054361193',
            cookie: true,
            xfbml: true,
            version: '{api-v7.0}'
        });

        FB.AppEvents.logPageView();

    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });

    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }
</script>
</body>
</html>
