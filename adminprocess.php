<?php 
require 'db.php';
if (isset($_POST['ad_reg'])) {
	// $obj->debug($_POST);
	$success = $obj->create_admin($_POST);
	if ($success) {
		header('location:index.php');
	}
	else{
		echo "not inserted";
	}
}

if(isset($_POST['login'])){
	var_dump($_POST);
	$data = $obj->admin_login($_POST);

	if($data){
		$obj->create_session($data);
		header("location:newForms.php");
	
	}else{
	 	header("location:index.php?login=faild");
	}
}

if (isset($_POST['adminusername'])) {	
	//var_dump($_POST);
		$username = $_POST['adminusername'];
		$res= $obj->Validation_Of_Log_in_user_name($username);

		if ($res == false) {
			echo json_encode(array("status"=>"wrong_user_name"));
		}else{
			echo json_encode(array("status"=>"correct_user_name"));
		}
}

if (isset($_POST['adminpassword'])) {	
	//var_dump($_POST);
		$password = $_POST['adminpassword'];
		$res= $obj->Validation_Of_Log_in_user_password($password);

		if ($res == false) {
			echo json_encode(array("status"=>"wrong_user_pass"));
		}else{
			echo json_encode(array("status"=>"correct_user_pass"));
		}
}

if (isset($_POST['fId'])) {
	$fId = $_POST['fId'];
	$res = $obj->fetchQuestionList($fId);
	return $res;
	// var_dump($res);
}
if (isset($_POST['QId'])) {
	$QId = $_POST['QId'];
	$res = $obj->fetchOptionsList($QId);
	return $res;
	// var_dump($res);
}

if (isset($_POST['check'])) {
       $formName = $obj->getFormName();
       
    }
if (isset($_POST['pieData'])) {
	$totalQ = $obj->countQuestion();
}

if (isset($_POST['barChart'])) {
$totalfD = $obj->countFbDatewise();
}

if (isset($_POST['barChartFb'])) {
$totalfb = $obj->countFb();
}

if (isset($_POST['optionsDataa'])) {
$op = $obj->QuestionsOptionGraph();
}

if (isset($_POST['fIdgeopage'])) {
	$fId = $_POST['fIdgeopage'];
	$res = $obj->fetchQuestionListforGeopage($fId);
	return $res;
	// var_dump($res);
}


if (isset($_POST['QIdgeopage'])) {
	$QId = $_POST['QIdgeopage'];
	$res = $obj->fetchOptionUserLocation();
	return $res;
	// var_dump($res);
}



if (isset($_POST['opName'])) {
$totalfD = $obj->fetchOptionNameForBarChart($_POST['opName']);
}

if (isset($_POST['fbQuantity'])) {
$totalfD = $obj->fetchOptionIDs($_POST['fbQuantity']);
}


if (isset($_POST['multiQId'])) {
	$QId = $_POST['multiQId'];
	$res = $obj->fetchSimilarOptionOnce($QId);
	return $res;
	// var_dump($res);
}

?>