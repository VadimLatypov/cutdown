<?php
    class Controller {
        protected function model($model, ...$params) {
            require_once 'app/models/' . $model . '.php';
            return new $model(...$params);
        }

        protected function view($view, $data = []) {
            require_once 'app/views/' . $view . '.php';
        }
    }