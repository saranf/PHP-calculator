<?php
session_start();

$session_number=0;

if (isset($_SESSION['number'])){ //number 문자가 들어올 경우에

	if($_SESSION['is_opt']){ //부호 값이 들어올시 그 전 숫자 저장 그 후 숫자 초기화
		$_SESSION['is_opt'] = FALSE;
		$_SESSION['old_number'] = $_SESSION['number'];
		$_SESSION['number'] = '';
	}

	if(strlen($_SESSION['number']) < 5){ //숫자가 5자 미만이면
		if($_SESSION['number'] == null){ //null 값이 있는 상태로 0이 들어오면 다시 들어온다.
			if($_SESSION['number']==0){
				unset($_SESSION['number']);
				$_SESSION['number']=$_POST['number'][0];
			}
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
}

if ($_POST['+']=='+'){

	if(isset($_SESSION['sign'])){//부호가 활성화 되면
		$_SESSION['number'] = func_plus($_SESSION['old_number'], $_SESSION['number']); // 더하기를 하고 number에 넣는다.
		$_SESSION['old_number'] = null;
	}else{
		$_SESSION['sign'] ='+';
		$_SESSION['is_opt'] = TRUE;
		$session_number = $_SESSION['old_number'] =  $_POST['number'];
	}


}


if ($_POST['-']=='-'){
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
	if($_SESSION['sign'] =='+'){
		$_SESSION['number'] = $_SESSION['old_number'] + $_SESSION['number'];
		$_SESSION['sign'] = null;  // 연산자 초기화
		//$_SESSION['equal'] = TRUE;
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
