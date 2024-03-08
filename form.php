<?php    
header('Content-Type: text/html; charset=utf-8', true); 

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";


if ($_GET['name']  != '' && $_GET["email"] != '' && $_GET["message"] != '') {
	if (isset($_GET['name'])  && isset($_GET["email"]) && isset($_GET["message"])) {

		$to  = 'ov.nattie@gmail.com';

		$subject = 'Заказ с сайта';

		$message = '<p>Пришла завяка от клиента:</p>
			<p>Имя клиента: '.$_GET["name"].'</p>
			<p>Почта клиента: '.$_GET["email"].'</p> 
            <p>Сообщение: '.$_GET["message"].'</p> ';

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		if (mail($to, $subject, $message, $headers)) {
			echo "<p>Успешно отправлено сообщение</p>";
			header("refresh: 3; url=$actual_link"); die();
		}else{
			echo "<p>Произошла ошибка при отправки формы.</p>";
			header("refresh: 3; url=$actual_link"); die();
		}
	}
}else{
	echo "<p>Не все поля заполнены!</p>";
	header("refresh: 3; url=$actual_link"); die();
}

?>

