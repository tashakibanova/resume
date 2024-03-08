<?php    
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$name = urldecode($name);
$email = urldecode($email);
$name = trim($name);
$email = trim($email);

mail("ov.nattie@gmail.com", "Заявка с сайта", "ФИО:".$name.". E-mail: ".$email ,"From: example2@mail.ru \r\n");

if (mail("ov.nattie@gmail.com", "Заказ с сайта", "ФИО:".$name.". E-mail: ".$email ,"From: example2@mail.ru \r\n"))
 {
    echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}
?>

<!-- Вместо example@mail.ru должен быть email адрес на который нужно отправить письмо, а вместо example2@mail.ru должен быть существующий email данного сайта. Например для сайта webriz.ru это будет info@webriz.ru.  Только в этом случае письмо с данными из формы будет отправлено. -->