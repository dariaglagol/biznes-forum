<?php
include_once 'dbconnect.php';
include_once 'functions.php';


$hash = mysql_real_escape_string($_POST['hash']);
$experience = mysql_real_escape_string($_POST['user-exp']);
$learn = mysql_real_escape_string($_POST['user-info']);

$search = mysql_fetch_array(mysql_query("SELECT `id` FROM `lider__forumtomsk` WHERE `hash` != '' && `hash` = '$hash'"));
if($search){
	$id = (int)$search['id'];
	mysql_query("UPDATE `lider__forumtomsk` SET `experience` = '$experience',`learn` = '$learn' WHERE `id` = '$id'");
	$data['mysql_error'] = mysql_error();
}
$data['msg'] = '<div class="msg">Спасибо! Ваша заявка принята!</div>';
die(json_encode($data));