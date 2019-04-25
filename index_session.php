<?php
session_start();


$_SESSION['number']=$_POST['seven']+$_POST['eight'];


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
