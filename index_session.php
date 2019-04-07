<?php
session_start();
$number = $_POST['number'][0];


$_SESSION['number']=$number;

header('location:./index.php');
?>
