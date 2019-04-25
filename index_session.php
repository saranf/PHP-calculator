<?php
session_start();

if (empty($_SESSION['number']))
	$_SESSION['number']=$_POST['1']."".$_POST["2"]."".$_POST["3"]."".$_POST["4"]."".$_POST["5"];

else
	$_SESSION['number']=$_SESSION['number']."".$_POST['five'];


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
