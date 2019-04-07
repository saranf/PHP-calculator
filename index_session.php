<?php
session_start();
$number = $_POST['number'];


$_SESSION['number']=$number;

header('location:./index.php');
?>
