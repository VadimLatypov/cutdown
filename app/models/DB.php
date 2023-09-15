<?php
    class DB {
        private static $_db = null;

        public static function getInstance() {
            if(self::$_db == null)
                self::$_db = new PDO(
                    'mysql:host='.Config::$DB_HOST.';dbname='.Config::$DB_NAME.';', 
                    Config::$DB_USER,
                    Config::$DB_PASS,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );

            return self::$_db;
        }

        private function __construct() {}
        private function __clone() {}
        private function __wakeup() {}
    }