<?php

	if(isset($_POST['done'])){
		session_start();
		include_once 'dbh.php';
		
		$Uanswer = mysqli_real_escape_string($con,$_POST['answer']);
		$username = $_SESSION['u_email'];
		
		$sql = "SELECT * FROM users WHERE user_email='$username'";
		$result = mysqli_query($con,$sql);
		$row1 = mysqli_fetch_assoc($result);
		$questionNo = $row1['question_no'];


		$sql = "SELECT * FROM questions WHERE q_no='$questionNo'";
		$result = mysqli_query($con,$sql);
		if($row = mysqli_fetch_assoc($result)){

			$questionImage = $row['q_path'];
			$correctAnswer = $row['q_answer'];

			if($Uanswer == $correctAnswer){
				$questionNo = $questionNo + 1;
				$sql = "UPDATE users SET question_no = '$questionNo' WHERE user_email = '$username'";
				$result = mysqli_query($con,$sql);
				$_SESSION['u_question'] = $questionNo;

				//ranking system
				$sql = "SELECT * FROM questions WHERE q_no ='$questionNo'";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($result);
				$temp = $row['user_on_question'] + 1;

				$sql = "UPDATE questions SET user_on_question = '$temp' WHERE q_no = '$questionNo'";
				$result = mysqli_query($con,$sql);

				$sql = "UPDATE users SET questtion_rank = '$temp' WHERE user_email = '$username'";
				$result = mysqli_query($con,$sql);

				header("Location: ../loginsystem/dashboard.php?answer=correct");
				exit();
			}else{
				header("Location: ../loginsystem/dashboard.php?answer=incorrect");
				exit();
			}
		}else{
			echo 'something is wrong';
		}
	}
?>