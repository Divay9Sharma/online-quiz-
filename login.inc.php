<?php

session_start();

if(isset($_POST['submit1'])){

	include 'dbh.php';

	$uemail = mysqli_real_escape_string($con,$_POST['uid']);
	$pwd = mysqli_real_escape_string($con,$_POST['Epwd']);

	if(empty($uemail) || empty($pwd)){
		$_SESSION['error'] = "ALERT!! Empty Field";
		header("Location: ../loginsystem/index.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_email='$uemail'";
		$result = mysqli_query($con,$sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck < 1){
			$_SESSION['error'] = "ALERT!! Sign In Error";
			header("Location: ../loginsystem/index.php?login=error");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				$hashCheck = password_verify( $pwd, $row['user_pass']);
				if($hashCheck == false){
					$_SESSION['error'] = "ALERT!! Password Incorrect";
					header("Location: ../loginsystem/index.php?login=password_incorrect");
					exit();
				}elseif ($hashCheck == true) {
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_name'] = $row['user_name'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_question'] = $row['question_no'];
					$_SESSION['error'] = "";
					header("Location: ../loginsystem/dashboard.php?login=success");
					exit();
				}
			}
		}
	}
}else{
	header("Location: ../loginsystem/index.php?login=error");
	exit();
}