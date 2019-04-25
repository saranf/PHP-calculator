<?php
session_start();


$_SESSION['number']=$seven;


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
