<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $head_title = 'Авторизация';
        $head_desc = 'Страница авторизации';
        require_once 'public/blocks/head.php';
    ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>

    <main class="container">
        <div class="reg">
            <h1>CUT.DOWN</h1>
            <p>Для использования сервиса сначала необходимо авторизоваться</p>
            <form action="/user/auth" method="post" class="form-control">
                <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>" required>
                <input type="password" name="password" placeholder="Введите пароль" value="<?=$_POST['password']?>" required>
                <div class="checkbox">
                    <input type="checkbox" name="remember" value="remember">
                    <label for="remember">Запомнить меня на 30 дней</label>
                </div>
                <div class="error">
                    <?=$data['message']?>
                </div>
                <button type="submit" class="btn">Выполнить вход</button>
            </form>
            <p>Хочу создать новый
                <a href="/">
                    аккаунт
                    <svg viewBox="0 0 70 36">
                        <path d="M6.9739 30.8153H63.0244C65.5269 30.8152 75.5358 -3.68471 35.4998 2.81531C-16.1598 11.2025 0.894099 33.9766 26.9922 34.3153C104.062 35.3153 54.5169 -6.68469 23.489 9.31527" />
                    </svg>
                </a>
            </p>
        </div>
    </main>

    <?php require_once 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c0c3afc1db.js" crossorigin="anonymous"></script>
</body>
</html>