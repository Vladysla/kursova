<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка 404</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
</head>
<body>
<canvas id="error" width="1200" height="844"></canvas>
<div class="l-container-center l-container--tiny text-page">
    <div class="large">
        <h1 class="error__title">404</h1>
        <h2 class="error__subtitle">Ой, щось пішло не так! <span><a href="/">Перейти на головну</a></span></h2>

    </div>
</div>
<style>
    body {
        max-height: 100%;
        overflow: hidden;
        background: url(/template/media/images/thumbs.gif);
        background-size: cover;
    }

    * {
        position: relative;
        z-index: 1;
    }
    span{
        margin-left: 3%;
    }
    span a{
        color: #c13939fa;
    }
    #error {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 0;
    }

    h1.error__title {
        text-align: center;
        font-size: 10em;
        margin-top: 18vh;
        animation: flicker 3s infinite;
        -webkit-animation: flicker 3s infinite;
        font-family: 'Neucha', cursive;
    }

    h2.error__subtitle {
        margin-top: 0;
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        animation: flicker 2s infinite;
        -webkit-animation: flicker 2s infinite;
        font-family: 'Neucha', cursive;
    }

    @-webkit-keyframes flicker {
        0%, 43%, 47%, 61%, 63%, 97% {
            transform: skew(0deg, 0deg);
            opacity: 1;
        }
        45% {
            transform: rotateX(60deg) scale(.8) skew(-100deg, 60deg);
            opacity: .3;
        }
        62% {
            opacity: .3;
        }
        100% {
            transform: skew(60deg, 30deg);
        }
    }

    @keyframes flicker {
        0%, 43%, 47%, 61%, 63%, 97% {
            -moz-transform: skew(0deg, 0deg);
            transform: skew(0deg, 0deg);
            opacity: 1;
        }
        45% {
            -moz-transform: rotateX(60deg) scale(.8) skew(-100deg, 60deg);
            transform: rotateX(60deg) scale(.8) skew(-100deg, 60deg);
            opacity: .3;
        }
        62% {
            opacity: .3;
        }
        100% {
            -moz-transform: skew(60deg, 30deg);
            transform: skew(60deg, 30deg);
        }
    }


    .large{
        width: 100%;
        float: left;
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
</body>
</html>