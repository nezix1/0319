<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'https://cdnjs.cloudflare.com/ajax/libs/phpmailer/6.5.0/PHPMailer.php';
require 'https://cdnjs.cloudflare.com/ajax/libs/phpmailer/6.5.0/SMTP.php';
require 'https://cdnjs.cloudflare.com/ajax/libs/phpmailer/6.5.0/Exception.php';


// Инициализация объекта PHPMailer
$mail = new PHPMailer(true);

try {
    // Настройки SMTP-сервера GMAIL
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'goncharovilya228@gmail.com'; // Укажите ваш адрес электронной почты GMAIL
    $mail->Password   = 'laggerfeed'; // Укажите пароль от вашей учетной записи GMAIL
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Укажите адрес электронной почты, на который вы хотите получать сообщения
    $mail->setFrom('goncharovilya228@gmail.com', 'Ilya'); // Укажите ваш адрес электронной почты и имя

    $toEmail = 'goncharovilya228@gmail.com'; // Укажите адрес получателя
    $toName = 'SUI'; // Укажите имя получателя

    // Добавление адреса получателя
    $mail->addAddress($toEmail, $toName);

    // Установка языка сообщения
    $mail->setLanguage('ua', 'language/phpmailer.lang-uk.php'); // Укажите путь к папке с файлами языков (например, 'language/')


    // Установка темы письма
    $mail->Subject = 'Нове повідомлення з форми сайту';

    // Формирование тела письма
    $name = $_POST['name'];
    $service = $_POST['service'];
    $contact = $_POST['contact'];

    $body = "Ім'я: $name<br><br>";
    $body .= "Інтересуюча послуга: $service<br><br>";
    $body .= "Контакти: $contact<br><br>";

    // Установка формата контента как HTML
    $mail->isHTML(true);
    $mail->Body = $body;

    // Отправка письма
    $mail->send();

    echo 'Ваше повідомлення успішно надіслано.';
} catch (Exception $e) {
    echo 'Помилка при відправці повідомлення: ' . $mail->ErrorInfo;
}
?>