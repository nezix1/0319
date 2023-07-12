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

	
	$mail->isSMTP();                                   //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';              //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                          //Enable SMTP authentication
	$mail->Username   = 'goncharovilya38@gmail.com';   //SMTP username
	$mail->Password   = 'bkuhyonscwilsglg';            //SMTP password
	$mail->SMTPSecure = 'ssl';                         //Enable implicit TLS encryption
	$mail->Port       = 587;                 

	//От кого письмо
	$mail->setFrom('goncharovilya38@gmail.com', 'Илья'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('goncharovilya228@gmail.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Привет!"';

	//Тело письма
	$body = '<h1>Письмо з сайту 0319</h1>';

	if(trim(!empty($_POST['email']))){
		$body = "<p>Name: <strong>".$_POST['email']."</strong></p>";
	}	

	if(trim(!empty($_POST['service']))){
		$body = "<p>Name: <strong>".$_POST['service']."</strong></p>";
	}	

	if(trim(!empty($_POST['contact']))){
		$body = "<p>Name: <strong>".$_POST['contact']."</strong></p>";
	}	
	/*
	//Прикрепить файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//путь загрузки файла
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузим файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото в приложении</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Помилка';
	} else {
		$message = 'Успiшно вiдправлено!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>