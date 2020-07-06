<?php 
require 'db.php';
if (isset($_POST['recordUpdate'])) {
	$obj->debug($_POST);
	$data = $obj->updateFormData($_POST);
if ($data) {

	header('location:records.php');
}
else{
	echo "not inserted";

}
}
?>