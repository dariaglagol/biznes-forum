<?php
include_once 'class.pop3.php';
include_once 'class.smtp.php';
include_once 'phpmailer.class.php';


function mail_new($to, $subj, $body, $attach = false){
	$mail = new PHPMailer(true);
	$body = preg_replace('/\\\\/', '', $body);
	$body = nl2br($body);

	$mail->IsSMTP(); 
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->Host = "smtp.yandex.ru";
	$mail->CharSet = 'utf-8';
	$mail->Username = "forum@fondtomsk.ru";
	$mail->Password = "JHF65g&4G5%";

	$mail->From = "forum@fondtomsk.ru";
	$mail->SetFrom('forum@fondtomsk.ru', '');
	$mail->FromName = "Региональная программа «Томск Месторождение успеха»";

	if ($attach && file_exists($attach)) {
		$mail->AddAttachment($attach);
	}

	$to = explode(',', $to);
	for ($i = 0; $i < count($to); $i++) {
		$mail->AddAddress($to[$i]);
	};

	$mail->Subject = $subj;
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
	$mail->MsgHTML($body);
	$mail->IsHTML(true);
	$mail->Send();
}

function forms($n, $form1, $form2, $form5) {
    $n = abs($n) % 100;
    $n1 = $n % 10;
    if ($n > 10 && $n < 20) {
        return $form5;
    } else if ($n1 > 1 && $n1 < 5) {
        return $form2;
    } elseif ($n1 == 1) {
        return $form1;
    }
    return $form5;
}

function sendFirstStep($mail){
	$subject = "Регистрация на событии «V РЕГИОНАЛЬНЫЙ ФОРУМ МОЛОДЫХ ПРЕДПРИНИМАТЕЛЕЙ»";
	$body = "<p>Текст письма: Здравствуйте! </p>";
	$body .= '<p>Вы только что зарегистрировались на событие «<a href="http://'.$_SERVER['HTTP_HOST'].'/">V РЕГИОНАЛЬНЫЙ ФОРУМ МОЛОДЫХ ПРЕДПРИНИМАТЕЛЕЙ</a>». </p>';
	$body .= '<p>Подтверждаем, что Ваша регистрация прошла успешно.</p>';
	$body .= '<p><b>Информация о событии</b><br>Название: V РЕГИОНАЛЬНЫЙ ФОРУМ МОЛОДЫХ ПРЕДПРИНИМАТЕЛЕЙ<br>Дата и время: <b>27 октября 2017</b><br>Место проведения: Инженерный центр ОЭЗ, пр. Развития 3, конференц-зал (6 этаж) </p>';
	$body .= '<p>Вступайте в группы и следите за нашими новостями: <a href="https://vk.com/biznesbattle">vk.com</a> | <a href="https://www.instagram.com/bb_battl/">instagram.com</a></p>';
	$body .= '<hr>';
	$body .= '<p>С уважение администрация V Регионального форума молодых предпринимателей <br>Телефон: +7 (3822) 979-335 <br><a href="http://'.$_SERVER['HTTP_HOST'].'/">форумтомск70.рф</a>. </p>';
	mail_new($mail,$subject,$body);
	sendNotify();
}

function sendNotify(){
	$mails = array('molpredtomsk@gmail.com','klava@maybah.com');
	$subject = 'Новая заявка на сайте форумтомск70';
	foreach($mails as $mail){
		mail_new($mail,$subject,$subject);
	}
}
