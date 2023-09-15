<?php
    class Link extends Controller {
        public function index(...$params) {
            if(count($params) == 0) {
                header("Location: /");
                exit();
            }
            
            $token = implode('/', $params);
            $link = $this->model('LinkModel');
            $longURL = $link->getOneLinkByToken($token)['long_url'];
            header("Location: $longURL");
            exit();
        }

        // Удаление ссылки
        public function remove() {
            if(isset($_POST['remove_link'])) {
                $link = $this->model('LinkModel');
                $link->removeLink($_POST['remove_link']);
            }
            
            header("Location: /");
            exit();
        }
    }