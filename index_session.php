<?php
session_start();

error_log(print_r($_SESSION),0);
if (isset($_SESSION['number'])){

	//$_SESSION['number']= $_SESSION['number']."".$_POST['0']."".$_POST['1']."".$_POST['2']."".$_POST['3']."".$_POST['4']."".$_POST['5']."".$_POST['6']."".$_POST['7']."".$_POST['8']."".$_POST['9'];
	$_SESSION['number']= $_SESSION['number']."".$_POST['number'][0];

	}
else{
//	$_SESSION['number']= $_POST['0']."".$_POST['1']."".$_POST['2']."".$_POST['3']."".$_POST['4']."".$_POST['5']."".$_POST['6']."".$_POST['7']."".$_POST['8']."".$_POST['9'];


	$_SESSION['number']= $_POST['number'][0];
}

if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
