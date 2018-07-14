<?php
if(isset($_POST['submit'])){
	include_once 'dbh.php';

	$uid = mysqli_real_escape_string($con,$_POST['u_id']);
	$uname = mysqli_real_escape_string($con,$_POST['u_name']);
	$uemail = mysqli_real_escape_string($con,$_POST['u_email']);
	$uquestionn = mysqli_real_escape_string($con,$_POST['q_no']);
	$newpass1 = mysqli_real_escape_string($con,$_POST['newpass1']);
	$newpass2 = mysqli_real_escape_string($con,$_POST['newpass2']);

	if(empty($uid) || empty($uname) ||empty($uemail) || empty($uquestionn)|| empty($newpass1)|| empty($newpass2)){
		header("Location: ../loginsystem/Forgot.html?values_empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_email='$uemail'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		if($uid != $row['user_id'] || $uname != $row['user_name'] || $uquestionn != $row['question_no']){
			header("Location: ../loginsystem/Forgot.html?value_incorrect");
			exit();	
		}else{
			if($newpass1 != $newpass2){
				header("Location: ../loginsystem/Forgot.html?password_mismatch");
				exit();
			}else{
				$hashedPwd = password_hash($newpass1,PASSWORD_DEFAULT);
				echo'$newpass1';
				$sql = "UPDATE users SET user_pass = '$hashedPwd' WHERE user_email='$uemail'";
				$result = mysqli_query($con,$sql);
				header("Location: ../loginsystem/Forgot.html?password_changed");
				exit();
			}
		}
	}
}else{
	echo 'something went wrong';
}
?>