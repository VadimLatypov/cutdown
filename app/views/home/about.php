<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $head_title = 'Про нас';
        $head_desc = 'О проекте';
        require_once 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>

    <main class="container">
        <h1>Про нас</h1>
        <div class="about">
            <h3>Для чего нужен сервис?</h3>
            <p><b>Экономия длины сообщения</b><br>Сокращение URL помогает создавать более короткие адреса. В Twitter, SMS или IM-программах даже 60-символьный URL может быть слишком длинным (например, в Twitter размер сообщения был изначально ограничен 140 символами).</p>
            <p><b>Чтение вслух</b><br>Сокращённые URL могут быть полезны при чтении вслух.</p>

            <h3>Как это работает?</h3>
            <p>Каждому длинному URL-адресу присваивается ключ, который добавляется после http://domain.tld/. К примеру, http://ltvi.com/m3q2xt имеет ключ m3q2xt. Короткий URL-адрес обычно состоит из случайного набора символов, но может быть настроен для использования более легко запоминающихся комбинаций символов.</p>
        </div>
    </main>

    <?php require_once 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c0c3afc1db.js" crossorigin="anonymous"></script>
</body>
</html>