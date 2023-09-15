<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Error 404 (Not Found)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404 (Not Found)</title>
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/css/error404.css">
</head>
<body>
    <div class="error404">
        <!-- Цифра 4 -->
        <div class="col-1">
            <div class="square square-1"></div>
            <div class="square square-1"></div>
            <div class="square square-1"></div>
        </div>
        <div class="col-1-1">
            <div class="square square-1"></div>
        </div>
        <div class="col-2">
            <div class="square square-2"></div>
            <div class="square square-2"></div>
            <div class="square square-2"></div>
            <div class="square square-2"></div>
        </div>
        
        <!-- Цифра 0 -->
        <div class="col-3 el1">
            <div class="square square-4"></div>
        </div>
        <div class="col-3 el2">
            <div class="square square-3"></div>
            <div class="square square-3"></div>
            <div class="square square-3"></div>
        </div>
        <div class="col-4 el1">
            <div class="square square-4"></div>
        </div>
        <div class="col-4 el2">
            <div class="square square-3"></div>
        </div>
        <div class="col-5">
            <div class="square square-1"></div>
            <div class="square square-1"></div>
            <div class="square square-1"></div>
            <div class="square square-1"></div>
        </div>

        <!-- Цифра 4 -->
        <div class="col-6">
            <div class="square square-2"></div>
            <div class="square square-2"></div>
            <div class="square square-2"></div>
        </div>
        <div class="col-6-1">
            <div class="square square-2"></div>
        </div>
        <div class="col-7">
            <div class="square square-4"></div>
            <div class="square square-4"></div>
            <div class="square square-4"></div>
            <div class="square square-4"></div>
        </div>
    </div>

    <div class="info">
        <h3>Когда Вы заходите сюда, где-то плачет один программист...</h3>
        <p>Страница ".../<?=$data?>" отсутствует или была перенесена.</p>
        <p>Если ранее эта страница была доступна, пожалуйста, <a href="/contact">сообщите нам здесь</a>.</p>
        <a href="/"><button class="btn">На главную</button></a>
    </div>

    <script src="/public/js/error404.js"></script>
</body>
</html>