<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
        $head_title = 'Личный кабинет';
        $head_desc = 'Личный кабинет';
        require_once 'public/blocks/head.php';
    ?>
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>

    <main class="container">
        <div class="dashboard">
            <h1>Личный кабинет</h1>
            <p>Привет, <b><?=$data['login']?></b></p>
            <p><small>Здесь могла быть какая-то информация.</small></p>
            <p><?php
                include_once 'config.php';
                echo $DB_HOST; 
            ?></p>
            <form action="/user" method="post">
                <input type="hidden" name="exit_btn">
                <button type="submit" class="btn">Выйти</button>
            </form>
        </div>
    </main>

    <?php require_once 'public/blocks/footer.php' ?>

    <script src="https://kit.fontawesome.com/c0c3afc1db.js" crossorigin="anonymous"></script>
</body>
</html>