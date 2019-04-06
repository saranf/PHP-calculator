<?php
session_start();
$test = $_POST['7'];

$_SESSION['test']=$test;

header('location:./index.php');
?>
