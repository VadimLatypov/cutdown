<?php
    require_once 'DB_connect.php';

    class LinkModel {
        private $_db = null;

        public function __construct() {
            $this->_db = DB_connect::getInstance();
        }

        // Получение всех ссылок текущего пользователя
        public function getLinks($authorID) {
            $result = $this->_db->query("SELECT * FROM links WHERE author_id = '$authorID' ORDER BY id DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Добавление ссылки в БД
        public function addLink($authorID, $longURL, $token) {
            if($longURL == '')
                return 'Поле ссылки не должно быть пустым';
            else if(strlen($longURL) < 10)
                return 'Поле ссылки не может быть короче 10 символов';
            else if(strlen($token) < 3)
                return 'Поле сокращенного названия не может быть короче 3 символов';
            else if(strlen($token) > 70)
                return 'Поле сокращенного названия не может быть больше 70 символов';
            else if($this->isExistsTokenByUser($token, $authorID)['count'] == '1')
                return 'Такое сокращение уже используется';
            else {
                $sql = "INSERT INTO links (author_id, long_url, token) VALUES (:author_id, :long_url, :token)";

                $query = $this->_db->prepare($sql);
                $query->execute([':author_id' => $authorID, ':long_url' => $longURL, ':token' => $token]);
    
                header("Location: /");
            }
        }

        // Получение полной ссылки по токену
        public function getOneLinkByToken($token) {
            $result = $this->_db->query("SELECT long_url FROM links WHERE token = '$token'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Проверка существования токена в БД для текущего пользователя
        public function isExistsTokenByUser($token, $authorID) {
            $result = $this->_db->query("SELECT count(id)>0 AS count FROM links WHERE token = '$token' AND author_id = '$authorID'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Удаление ссылки из БД
        public function removeLink($id) {
            $sql = "DELETE FROM links WHERE id = :id";

            $query = $this->_db->prepare($sql);
            $query->execute([':id' => $id]);

            header("Location: /");
        }
    }