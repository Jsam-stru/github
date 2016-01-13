<?php

	$sname=$spwd1=$spwd2=$sname_warm=$pwd_warm1=$pwd_warm2="";

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["sname"])&&empty($_POST["sign-pwd1"])&&empty($_POST["sign_pwd2"])){
			$sname_warm="账号密码不能为空";
			echo $sname_warm;
		}else{
				
		}
	}

	function test_input($data){
	$data=trim($data);
	// 去掉反斜杠
	$data=stripslashes($data);
	// 将html语言变为字符串
	$data=htmlspecialchars($data);
	return $data;
	}

?>