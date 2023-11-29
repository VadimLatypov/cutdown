<?php
    require 'DB_connect.php';
    
    class UserModel {
        private $login;
        private $email;
        private $password;
        private $re_password;
        private $checkbox;
        private $_db = null;

        public function __construct() {
            $this->_db = DB_connect::getInstance();
        }

        public function setData($login, $email, $password, $re_password, $checkbox) {
            $this->login = trim($login);
            $this->email = trim($email);
            $this->password = $password;
            $this->re_password = $re_password;
            $this->checkbox = $checkbox;
        }

        // Валидация формы регистрации
        public function validRegForm() {
            if(strlen($this->login) < 4)
                return 'Логин не может быть меньше 4 символов в длину';
            else if(strlen($this->login) > 70)
                return 'Логин не может быть больше 70 символов в длину';
            else if($this->login != filter_var($this->login, FILTER_SANITIZE_SPECIAL_CHARS))
                return 'Логин не может содержать специальные символы';
            else if($this->login == $this->getUser($this->login)['login'])
                return 'Пользователь с таким логином уже существует';
            else if(strlen($this->email) < 6)
                return 'Email не может быть меньше 6 символов в длину';
            else if(strlen($this->email) > 100)
                return 'Email не может быть больше 100 символов в длину';
            else if($this->email != filter_var($this->email, FILTER_SANITIZE_EMAIL))
                return 'Email не может содержать иные символы, кроме букв, цифр и !#$%&\'*+-=?^_`{|}~@.[]';
            else if(strlen($this->password) < 5)
                return 'Пароль не может быть меньше 5 символов в длину';
            else if(strlen($this->password) > 255)
                return 'Пароль не может быть больше 255 символов в длину';
            else if($this->password != $this->re_password)
                return 'Пароли не совпадают';
            else if($this->checkbox != 'checked')
                return 'Поле "Согласие на обработку персональных данных" является обязательным';
            else
                return 'Проверка данных выполнена успешно';
        }

        // Регистрация пользователя
        public function regUser() {
            $pass = password_hash($this->password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO users (login, email, pass, agreement) VALUES (:login, :email, :pass, :agreement)';

            $query = $this->_db->prepare($sql);
            $query->execute([':login' => $this->login, ':email' => $this->email, ':pass' => $pass, ':agreement' => 1]);

            $this->setAuth($this->login);
        }

        // Авторизация пользователя
        public function authUser($login, $password, $remember) {
            $result = $this->getUser($login);

            if($result['login'] == '')
                return 'Пользователь с таким логином не существует';
            else if(password_verify($password, $result['pass']))
                if($remember == 'remember')
                    return $this->setAuth($login, true);
                else
                    return $this->setAuth($login);
            else
                return 'Введен неверный пароль';
        }

        // Установка Cookie
        public function setAuth($login, $long = false) {
            if($long == true)
                setcookie('login', $login, time() + 3600 * 24 * 30, '/');
            else
                setcookie('login', $login, time() + 3600 * 24, '/');
            header("Location: /");
        }

        // Получить данные пользователя
        public function getUser($login) {
            $result = $this->_db->query("SELECT * FROM users WHERE login = '$login'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Выйти из аккаунта
        public function logout() {
            setcookie('login', $this->login, time() - 3600 * 24 * 30, '/');
            unset($_COOKIE['login']);
            header("Location: /user/auth");
        }
    }