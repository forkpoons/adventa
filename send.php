<?php
if(@$_POST["hidden"])
{
$dt=date("d F Y, H:i:s"); // дата и время
$mail="info@asbadventa.ru"; // e-mail куда уйдет письмо
$title="Письмо с сайта"; // заголовок(тема) письма
$fnm=$_POST["fnm"];
$fnm=htmlspecialchars($fnm); // обрабатываем

$text=$_POST["comment"];
$text=htmlspecialchars($text); // обрабатываем
$text=str_replace("\r\n","<br>",$text); // обрабатываем

$email=$_POST["email"];
$phone=$_POST["phone"];

$mess="<b>Имя:</b> " .$fnm. "<br>";
$mess.="<b>Сообщение:</b> " .$text. "<br>";
// ссылка на e-mail
$mess.="<b>E-Mail:</b> <a href=\"mailto:".$email."\">".$email."</a><br>";
$mess.="<b>Телефон:</b> " . $phone . "<br>";
$mess.="<b>Дата и Время:</b> " .$dt. "";

$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n"; //кодировка
$headers.="From: info@asbadventa.ru\r\n"; // откуда письмо (необязательнакя строка)
mail($mail, $title, $mess, $headers); // отправляем

// выводим уведомление и перезагружаем страничку
print"
<script language=\"Javascript\" type=\"text/javascript\">
alert (\"Ваше сообщение отправлено! Наш менеджер свяжется с Вами в ближайшее время!\");
function reload(){
	location = \"./index.html\"
};
setTimeout(\"reload()\", 0);
</script>";
}
?>