<header>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/home/about">Про нас</a></li>
                <li><a href="/home/contact">Контакты</a></li>
            </ul>
            <?php if($_COOKIE['login'] == ''): ?>
                <p class="user-btn"><a href="/user/auth">Войти</a></p>
            <?php else: ?>
                <p class="user-btn"><a href="/user">Личный кабинет</a></p>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <div class="logo">
            <a href="/"><img src="/public/img/logo.png" alt="Логотип сайта"></a>
            <h2>Сокращай вместе с нами</h2>
        </div>
    </div>
</header>