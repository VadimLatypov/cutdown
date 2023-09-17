<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $head_title = 'Главная';
        $head_desc = 'Главная страница сайта';
        require_once 'public/blocks/head.php';
    ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>

    <main class="container">
        <div class="reg">
            <h1>CUT.DOWN</h1>
            <?php if($_COOKIE['login'] == ''): ?>
                <p>Для использования сервиса сначала необходимо зарегистрироваться</p>
                <form action="/" method="post" class="form-control">
                    <input type="text" name="login" placeholder="Введите логин" value="<?=$_POST['login']?>" required>
                    <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>" required>
                    <input type="password" name="password" placeholder="Введите пароль" value="<?=$_POST['password']?>" required>
                    <input type="password" name="re_password" placeholder="Подтвердите пароль" value="<?=$_POST['re_password']?>" required>
                    <div class="checkbox">
                        <input type="checkbox" name="check" value="checked" checked>
                        <label for="check">Согласие на обработку персональных данных</label>
                    </div>
                    <div class="error">
                        <?=$data['message']?>
                    </div>
                    <button type="submit" class="btn">Зарегистрироваться</button>
                </form>
                <p>У меня уже есть
                    <a href="/user/auth">
                        аккаунт
                        <svg viewBox="0 0 70 36">
                            <path d="M6.9739 30.8153H63.0244C65.5269 30.8152 75.5358 -3.68471 35.4998 2.81531C-16.1598 11.2025 0.894099 33.9766 26.9922 34.3153C104.062 35.3153 54.5169 -6.68469 23.489 9.31527" />
                        </svg>
                    </a>
                </p>
            <?php endif; ?>
        </div>

        <?php if($_COOKIE['login'] != ''): ?>
            <div class="links">
                <p>Здесь Вы можете сократить любую ссылку</p>
                <form action="/" method="post" class="form-control">
                    <input type="url" name="long_url" placeholder="Введите длинную ссылку" value="<?=$_POST['long_url']?>" required>
                    <input type="text" name="token" placeholder="Введите скоращенное название" value="<?=$_POST['token']?>" required>
                    <div class="error">
                        <?=$data['message']?>
                    </div>
                    <div>
                        <button type="submit" class="btn">Выполнить сокращение ссылки</button>
                        <button type="button" class="btn" onclick="genToken()">Сгенерировать сокращенную ссылку</button>
                    </div>
                </form>

                <?php if(count($data['links']) > 0): ?>
                    <br><hr><br>
                    
                    <?php foreach ($data['links'] as $item): ?>
                        <div class="link">
                            <p>Сокращенная ссылка: 
                                <b><a href="/link/<?=$item['token']?>" target="_blank">cutdown.ltvi.site/link/<?=$item['token']?></a></b>
                                <button type="button" class="btn btn-small" onclick="copyLink(`<?=$item['token']?>`)" title="Скопировать ссылку">Копировать <i class="fa-solid fa-copy"></i></button>
                            </p>
                            <p>Полная ссылка: <i><?=$item['long_url']?></i></p>
                            <form action="/link/remove" method="post">
                                <input type="hidden" name="remove_link" value="<?=$item['id']?>">
                                <button type="submit" class="btn" title="Удалить ссылку"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php require_once 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c0c3afc1db.js" crossorigin="anonymous"></script>
    <script src="/public/js/options.js"></script>
</body>
</html>