<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $head_title = 'Контакты';
        $head_desc = 'Обратная связь';
        require_once 'public/blocks/head.php';
    ?>
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>

    <main class="container">
        <div class="contact">
            <h1>Форма обратной связи</h1>
            <form action="/home/contact" method="post" class="form-control">
                <input type="text" name="name" placeholder="Ваше имя" value="<?=$_POST['name']?>"><br>
                <input type="email" name="email" placeholder="Email для связи" value="<?=$_POST['email']?>"><br>
                <input type="text" name="age" placeholder="Ваш возраст" value="<?=$_POST['age']?>"><br>
                <textarea name="message" placeholder="Напишите сообщение здесь"><?=$_POST['message']?></textarea>
                <div class="error"><?=$data['message']?></div>
                <button type="submit" class="btn">Отправить</button>
            </form>
        </div>
    </main>

    <?php require_once 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c0c3afc1db.js" crossorigin="anonymous"></script>
    <script src="/public/js/contact.js"></script>
</body>
</html>