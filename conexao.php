<?php 
	$db = new mysqli('localhost', 'root', '', 'rht');
	if(mysqli_connect_errno()){
 		echo mysqli_connect_error();
	} 
?>