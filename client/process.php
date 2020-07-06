<?php 
require 'db.php';
if (isset($_POST['ad_reg'])) {
	// $obj->debug($_POST);
	$data = $obj->registerClientwithLocation($_POST);
	if ($data) {
		header('location:index.php');
	}
	else{
		echo "not register";
	}
}

if (isset($_POST['clientLogin'])) {
	// var_dump($_POST);
	// $obj->debug($_POST);

	$data = $obj->client_login($_POST);

	if($data){
		$obj->create_session($data);
		header("location:feedback.php");
	
	}else{
	 	header("location:index.php?login=faild");
	}
}

if (isset($_POST['Feedback'])) {
	$obj->debug($_POST);
	$data = $obj->adddUserFeedback($_POST);
if ($data) {
	header('location:feedback.php');
}
else{
	echo "not inserted";
}
}
 ?>