<?php 
require 'db.php';
if (isset($_POST['formId'])) {
	// $data = $obj->debug($_POST);
	$data = $obj->FormDelete($_POST);
}
if (isset($_POST['FormQuestionId'])) {
	// $data = $obj->debug($_POST);
	
	$data = $obj->deleteFormAddedQuestion($_POST);
	
}

if (isset($_POST['QOptionId'])) {
	// $data = $obj->debug($_POST);
	
	$data = $obj->deleteFormAddedOption($_POST);
}

 ?>