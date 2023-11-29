<?php
    class Home extends Controller {
        public function index() {
            $data = [];
            $user = $this->model('UserModel');

            // Регистрация
            if(isset($_POST['login'])) {
                $user->setData($_POST['login'], $_POST['email'], $_POST['password'], $_POST['re_password'], $_POST['check']);

                $isValid = $user->validRegForm();
                if($isValid == 'Проверка данных выполнена успешно')
                    $user->regUser();
                else
                    $data['message'] = $isValid;
            }

            // Сокращение ссылки
            if(isset($_POST['long_url'])) {
                $user = $this->model('UserModel');
                $user_info = $user->getUser($_COOKIE['login']);
                
                $link = $this->model('LinkModel');
                $data['message'] = $link->addLink($user_info['id'], trim($_POST['long_url']), trim($_POST['token']));
            }

            // Вывод ссылок пользователя
            $author_id = $user->getUser($_COOKIE['login']);

            $link = $this->model('LinkModel');
            $data['links'] = $link->getLinks($author_id['id']);

            $this->view('home/index', $data);

        }

        public function about() {
            $this->view('home/about');
        }

        public function contact() {
            $data = [];
            if(isset($_POST['name'])) {
                $mess = $this->model('PostModel', $_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                $isValid = $mess->verifyMessage();
                if($isValid == 'Проверка данных выполнена успешно') {
                    $data['message'] = $mess->sendMessage();
                } else {
                    $data['message'] = $isValid;
                }
            }

            $this->view('home/contact', $data);
        }
    }