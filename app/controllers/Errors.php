<?php
    class Errors extends Controller {
        public function error($var) {
            $this->view('404', $var);
        }
    }