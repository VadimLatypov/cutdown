<?php
    class User extends Controller {
        public function index() {
            $user = $this->model('UserModel');

            if(isset($_POST['exit_btn'])) {
                $user->logout();
                exit();
            }
            if($_COOKIE['login'] == '') {
                header("Location: /user/auth");
                exit();
            } else {
                $user_info = $user->getUser($_COOKIE['login']);
                $this->view('user/index', $user_info);
            }
        }

        public function auth() {
            $user = $this->model('UserModel');
            $data = [];
            
            if(isset($_POST['login']))
                $data['message'] = $user->authUser($_POST['login'], $_POST['password'], $_POST['remember']);

            $this->view('user/auth', $data);
        }
    }