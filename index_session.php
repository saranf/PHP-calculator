<?php
session_start();

if($_SESSION['number']!=null)
	$_SESSION['number']=$_SESSION['number']."".$_POST['eight'];


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
