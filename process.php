<?php 
require 'db.php';

$obj->debug($_POST);
$data = $obj->addForm($_POST);
// var_dump($data);

if ($data) {
	header('location:newForms.php');

}
else{
	echo "not inserted";
} ?>
