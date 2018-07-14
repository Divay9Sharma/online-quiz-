<?php
session_start();
if(isset($_POST['submit2'])){
	
	include_once 'dbh.php';

	$name = mysqli_real_escape_string($con,$_POST['user_name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$password = mysqli_real_escape_string($con,$_POST['pwd']);
	$repassword = mysqli_real_escape_string($con,$_POST['repwd']);

	if(empty($name) || empty($email) ||empty($password) || empty($repassword)){
		$_SESSION['error'] = "ALERT!! Empty Field";
		header("Location: ../loginsystem/index.php?signup=empty");
		exit();
	}else{
		if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
			$_SESSION['error'] = "ALERT!! Invalid Unsername";
			header("Location: ../loginsystem/index.php?signup=invlaid");
			exit();
		}else{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$_SESSION['error'] = "ALERT!! Invalid Email";
				header("Location: ../loginsystem/index.php?signup=email");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_email='$email'";
				$result = mysqli_query($con,$sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck>0){
					$_SESSION['error'] = "ALERT!! User Taken";
					header("Location: ../loginsystem/index.php?signup=usertaken");
					exit();
				}else{
					if($password != $repassword){
						$_SESSION['error'] = "ALERT!! Password Mismatch";
						header("Location: ../loginsystem/index.php?signup=passwordmismatch");
						exit();
					}else{
						$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
						$sql = "INSERT INTO users (user_name,user_email,user_pass) VALUES ('$name','$email','$hashedPwd');";
						$result = mysqli_query($con,$sql);
						$_SESSION['error'] = "Signup Done";
						header("Location: ../loginsystem/index.php?signup=done");
						exit();
					}
				}
			}
		}
	}

}else{
	header("Location: ../loginsystem/index.php");
	exit();
}
?>