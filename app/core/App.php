<?php
    class App {
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct() {
            // Получение данных из url
            $url = $this->parseUrl();

            // Проверка названия контроллера
            if(file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                $tmp = $url[0];
                unset($url[0]);
            } elseif (ucfirst($url[0]) != 'Home' && ucfirst($url[0]) != '') {
                require_once 'app/controllers/Errors.php';
                $this->controller = new Errors();
                $this->controller->error($url[0]);
            }

            require_once 'app/controllers/' . $this->controller . '.php';

            $this->controller = new $this->controller;

            // Проверка названия метода
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                } elseif ($url[1] != 'index' && $url[1] != '' && $tmp != 'link') {
                    require_once 'app/controllers/Errors.php';
                    $this->controller = new Errors();
                    $this->controller->error($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/',
                    filter_var(
                    rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_STRING));
            }
        }
    }