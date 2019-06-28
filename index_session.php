<?php
session_start();

$session_number=0;


if (isset($_SESSION['number'])){
	if($_SESSION['is_opt']){
		$_SESSION['is_opt'] = FALSE;
		$_SESSION['old_number'] = $_SESSION['number'];
		$_SESSION['number'] = '';
	}
	if(strlen($_SESSION['number']) < 5){
		//error_log("test",0);
		if($_SESSION['number']==0){
			unset($_SESSION['number']);
			$_SESSION['number']=$_POST['number'][0];
		}
		else{
			$_SESSION['number']= $_SESSION['number']."".$_POST['number'][0];
		}
	}
	else{
		header('location:./index.php');
	}
}

else{
	$_SESSION['number']= $_POST['number'][0];

		
}

if($_POST['eraser']=="eraser"){
	$session_encode = $_SESSION['number'];
	$_SESSION['number']=substr($session_encode,0,-1);

	//error_log($session_decode,0);
}
if ($_POST['+']=='+'){

	$_SESSION['sign'] ='+';
	$_SESSION['is_opt']==$_POST['+'];

	$_SESSION['is_opt'] = TRUE;

	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['-']=='-'){

	$_SESSION['sign'] = '-';
	$_SESSION['is_opt']==$_POST['-'];

	$_SESSION['is_opt'] = TRUE;

	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['-']=='-'){

	$_SESSION['sign'] = '-';
	$_SESSION['is_opt']==$_POST['-'];

	$_SESSION['is_opt'] = TRUE;

	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['-']=='-'){

	$_SESSION['sign'] = '-';
	$_SESSION['is_opt']==$_POST['-'];

	$_SESSION['is_opt'] = TRUE;

	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['*']=='*'){

	$_SESSION['sign'] = '*';
	$_SESSION['is_opt']==$_POST['*'];

	$_SESSION['is_opt'] = TRUE;

	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if( $_POST["="] == '='){

	if($_SESSION['sign'] =='+'){
		$_SESSION['number'] = $_SESSION['old_number'] + $_SESSION['number'];
	}
	if($_SESSION['sign'] == '-'){
		$_SESSION['number'] = $_SESSION['old_number'] - $_SESSION['number'];
	}
	if($_SESSION['sign'] == '*'){
		$_SESSION['number'] = $_SESSION['old_number'] * $_SESSION['number'];
	}
}


if($_POST['AC']=="AC")
	session_unset();

header('location:./index.php');

?>
