<?php 
require 'db.php';
if (isset($_POST['addSCQ'])) {

	$data = $obj->addSingleChoiceQuestion($_POST);
		if ($data) {
			header('location:scquestion.php?form=single');
		}
		else{
			echo "not inserted";
		}
// $obj->debug($_POST);
}
elseif (isset($_POST['addMCQ'])) {
	$data = $obj->addMultiChoiceQuestion($_POST);
	if ($data) {
			header('location:scquestion.php?form=multi');
		}
		else{
			echo "not inserted";
		}
// $obj->debug($_POST);
}
elseif (isset($_POST['addOPEN'])) {
	$data = $obj->addOpenQuestion($_POST);
	 if ($data) {
			header('location:scquestion.php?form=open');
		}
		else{
			echo "not inserted";
		}
}
elseif (isset($_POST['regUser'])) {
	$data = $obj->registerUser($_POST);
	 if ($data) {
			header('location:user.php');
		}
		else{
			echo "not inserted";
		}
// $obj->debug($_POST);
	# code...
}




 ?>