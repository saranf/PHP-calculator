<?php
session_start();

error_log(print_r($_SESSION),0);
if (empty($_SESSION['number'])){
		$_SESSION['number'] =$_POST['0'];
		error_log("에러레요",0);
	}
else{
	$_SESSION['number']=$_SESSION['number']."". $_POST['1']."".$_POST['2']."".$_POST['3']."".$_POST['4']."".$_POST['5'];
	error_log("에러레염",0);
}

if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
