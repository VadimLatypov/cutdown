<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'vendor/autoload.php';

    class PostModel {
        private $name;
        private $email;
        private $age;
        private $message;

        public function __construct($name, $email, $age, $message) {
            $this->name = trim(filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS));
            $this->email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));
            $this->age = trim(filter_var($age, FILTER_SANITIZE_SPECIAL_CHARS));
            $this->message = trim(filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        public function verifyMessage() {
            if(strlen($this->name) < 2)
                return 'Имя слишком короткое (не менее 2 символов)';
            else if(strlen($this->email) < 6)
                return 'Email слишком короткий (не менее 6 символов)';
            else if(!is_numeric($this->age) || $this->age <= 0 || $this->age >= 100)
                return 'Введите возраст положительным числом';
            else if(strlen($this->message) < 3)
                return 'Сообщение слишком короткое';
            else
                return 'Проверка данных выполнена успешно';
        }

        // Отправка обратной связи
        public function sendMessage() {
            $mail = new PHPMailer(true);

            try {
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = Config::$SMTP_EMAIL;
                $mail->Password = Config::$SMTP_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                $mail->CharSet = "utf-8";

                $mail->setFrom(Config::$SMTP_EMAIL, $this->name);
                $mail->addAddress(Config::$ADMIN_EMAIL);

                $mail->isHTML(true);
                $mail->Subject = "=?utf-8?B?".base64_encode("Сообщение с сайта 'cutdown.ltvi.site'")."?=";
                $mail->Body = "Имя: $this->name;<br>
                    Возраст: $this->age;<br>
                    Email: $this->email;<br>
                    Текст сообщения: <i>$this->message</i>";
        
                $mail->send();
                return 'Сообщение успешно отправлено';
            } catch (Exception $e) {
                return 'Сообщение не было отправлено. Ошибка: ' . $mail->ErrorInfo;
            }
        }
    }