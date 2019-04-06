<?php
session_start();
$number = $_POST['7'];

$_SESSION['number']=$number;

header('location:./index.php');
?>
