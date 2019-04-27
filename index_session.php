<?php
session_start();

$test = $_POST['number'];
error_log(count($test),0);
if (isset($_SESSION['number'])){

	if($_SESSION['number']==0){
		unset($_SESSION['number']);
		$_SESSION['number']=$_POST['number'][0];
	}
	else{
		$_SESSION['number']= $_SESSION['number']."".$_POST['number'][0];
	}
}
else{
	$_SESSION['number']= $_POST['number'][0];

		
}

if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
