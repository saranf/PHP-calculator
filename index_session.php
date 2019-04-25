<?php
session_start();

if (empty($_SESSION['number']))
	$_SESSION['number']=$_POST['four'];

else
	$_SESSION['number']=$_SESSION['number']."".$_POST['five'];


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
