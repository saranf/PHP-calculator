<?php
session_start();

error_log(count($_POST['number']),0);
if (isset($_SESSION['number'])){

	$_SESSION['number']= $_SESSION['number']."".$_POST['number'][0];

	}
else{
	$_SESSION['number']= $_POST['number'][0];
}

if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
