<?php
session_start();

error_log(print_r($_SESSION),0);
if (isset($_SESSION['number'])){
		$_SESSION['number'] =$_SESSION['number']."".$_POST['1'];
	}
else{
	$_SESSION['number']= $_POST['0'];
}

if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
