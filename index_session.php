<?php
session_start();

$session_number=0;


if (isset($_SESSION['number'])){
	if($_SESSION['equal']){
		$_SESSION['equal'] = FALSE;
		$_SESSION['number'] = '';
	}

	if($_SESSION['is_opt']){
		$_SESSION['is_opt'] = FALSE;
		$_SESSION['old_number'] = $_SESSION['number'];
		$_SESSION['number'] = '';
	}

	if(strlen($_SESSION['number']) < 5){
		if($_SESSION['number']==0){
			unset($_SESSION['number']);
			$_SESSION['number']=$_POST['number'][0];
		}

		else{
			if(isset($_SESSION['sign']) && !isset($_SESSION['old_number'])){
				// 연산자 연속 입력시에는 숫자가 바로 들어와야함.
				$_SESSION['old_number'] = $_SESSION['number'];
				$_SESSION['number']=$_POST['number'][0];
			}else{
				// 연산자 연속 입력이 아닐경우에는 숫자를 이어서 입력해야함.
				$_SESSION['number']= $_SESSION['number']."".$_POST['number'][0];
			}
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
//	if($_SESSION['is_opt']==FALSE){
//		$_SESSION['number'] = $_SESSION['old_number'] + $_SESSION['number'];
//	}

	if(isset($_SESSION['sign'])){
		$_SESSION['number'] = func_plus($_SESSION['old_number'], $_SESSION['number']);
		$_SESSION['old_number'] = null;
	}else{
		$_SESSION['sign'] ='+';
		$_SESSION['third'] = TRUE;
		$_SESSION['is_opt'] = TRUE;
		$session_number = $_SESSION['old_number'] =  $_POST['number'];
	}


}


if ($_POST['-']=='-'){

//	if($_SESSION['is_opt']==FALSE){
//		$_SESSION['number'] = $_SESSION['old_number'] - $_SESSION['number'];
//	}



	$_SESSION['sign'] = '-';
	$_SESSION['third'] = TRUE;
	$_SESSION['is_opt'] = TRUE;
	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}


if ($_POST['*']=='*'){
//	if($_SESSION['is_opt']==FALSE){
//		$_SESSION['number'] = $_SESSION['old_number'] * $_SESSION['number'];
//	}

	$_SESSION['sign'] = '*';
	$_SESSION['is_opt'] = TRUE;
	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['/']=='/'){
//	if($_SESSION['is_opt']==FALSE){
//		$_SESSION['number'] = $_SESSION['old_number'] / $_SESSION['number'];
//	}
	$_SESSION['sign'] = '/';
	$_SESSION['is_opt'] = TRUE;
	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}

if ($_POST['%']=='%'){
//	if($_SESSION['is_opt']==FALSE){
//		$_SESSION['number'] = $_SESSION['old_number'] % $_SESSION['number'];
//	}
	$_SESSION['sign'] = '%';
	$_SESSION['is_opt'] = TRUE;
	$session_number = $_SESSION['old_number'] =  $_POST['number'];
}


if( $_POST["="] == '='){
	$_SESSION['sign'] = null;  // 연산자 초기화
	$_SESSION['equal'] = TRUE;
	if($_SESSION['sign'] =='+'){
		$_SESSION['number'] = $_SESSION['old_number'] + $_SESSION['number'];
	}
	if($_SESSION['sign'] == '-'){
		$_SESSION['number'] = $_SESSION['old_number'] - $_SESSION['number'];
	}
	if($_SESSION['sign'] == '*'){
		$_SESSION['number'] = $_SESSION['old_number'] * $_SESSION['number'];
	}
	if($_SESSION['sign'] == '/'){
		$_SESSION['number'] = $_SESSION['old_number'] / $_SESSION['number'];
	}
	if($_SESSION['sign'] == '%'){
		$_SESSION['number'] = $_SESSION['old_number'] % $_SESSION['number'];
	}
}


if($_POST['AC']=="AC"){
	session_unset();
}

header('location:./index.php');



function func_plus($num1, $num2){
	return $num1 + $num2;
}
function func_minux($num1, $num2){
	return $num1-$num2;
}
function func_multi($num1, $num2){
	return $num1*$num2;
}
function func_div($num1, $num2){
	return $num1/$num2;
}
?>
