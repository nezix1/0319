<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'goncharovilya38@gmail.com';
$mail->Password = 'bkuhyonscwilsglg';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 587;

$mail->setFrom('goncharovilya38@gmail.com', 'Илья');
$mail->addAddress('goncharovilya228@gmail.com');
$mail->Subject = 'Привет!';

$body = '<h1>Письмо с сайта 0319</h1>';

if (!empty($_POST['email'])) {
    $body .= "<p>Email: <strong>" . $_POST['email'] . "</strong></p>";
}

if (!empty($_POST['service'])) {
    $body .= "<p>Service: <strong>" . $_POST['service'] . "</strong></p>";
}

if (!empty($_POST['contact'])) {
    $body .= "<p>Contact: <strong>" . $_POST['contact'] . "</strong></p>";
}

/*
if (!empty($_FILES['image']['tmp_name'])) {
    $filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name'];
    if (copy($_FILES['image']['tmp_name'], $filePath)) {
        $fileAttach = $filePath;
        $body .= '<p><strong>Фото в приложении</strong>';
        $mail->addAttachment($fileAttach);
    }
}
*/

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Успешно отправлено!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>