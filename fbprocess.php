<?php 
require 'db.php';
 $data = $obj->adddUserFeedback($_POST);
if ($data) {
	header('location:feedback.php');
}
else{
	echo "not inserted";
}
?>