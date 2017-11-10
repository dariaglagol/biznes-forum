<?php
//ini_set('dipslay_errors',1);
include_once 'dbconnect.php';
include_once 'functions.php';


$required = array(
	'user-name',
	'user-birthdate',
	'sex',
	'user-phone',
	'user-email',
);

$fiz_type = array(
	'worker' => 'Работающий',
	'student' => 'Студент',
);

foreach($required as $row){
	if(!$_POST[$row]){
		$data['error'][] = $row;
	}
}

if(!$data['error']){
	$date = date('Y-m-d H:i:s');
	$fio = mysql_real_escape_string($_POST['user-name']);
	$date_birthday = mysql_real_escape_string($_POST['user-birthdate']);
	$sex = mysql_real_escape_string($_POST['sex']);
	$phone = mysql_real_escape_string($_POST['user-phone']);
	$mail = mysql_real_escape_string($_POST['user-email']);
	$org = mysql_real_escape_string($_POST['org_form']);
	$company = mysql_real_escape_string($_POST['org_name']);
	if($_POST['type'] == 'fiz'){
		$fiz_type_ = $fiz_type[mysql_real_escape_string($_POST['fiz_type'])];
		if($_POST['fiz_type'] == 'worker'){
			$fiz_company = mysql_real_escape_string($_POST['fiz_company']);
			$fiz_role = mysql_real_escape_string($_POST['fiz_role']);
		}
	}
	$inn = mysql_real_escape_string($_POST['org-individual-tax-num']);
	$hash = md5(time());
	
	mysql_query("INSERT INTO `lider__forumtomsk` 
				(`date`,`fio`,`date_birthday`,`sex`,`phone`,`mail`,`org`,`company`,`inn`,`hash`,`fiz_type`,`fiz_company`,`fiz_role`) VALUES 
				('$date','$fio','$date_birthday','$sex','$phone','$mail','$org','$company','$inn','$hash','$fiz_type_','$fiz_company','$fiz_role')
				");
	$data['mysql_error'] = mysql_error();
	$data['hash'] = $hash;
	
	
	if($company && $inn){
		$data['company'] = true;
	}
	sendFirstStep($mail);
}


die(json_encode($data));

