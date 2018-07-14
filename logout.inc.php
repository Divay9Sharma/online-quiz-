<?php
	if(isset($_POST['submitlogout'])){
		session_start();
		session_unset();
		session_destroy();
		header("Location: ../loginsystem/index.php");
		exit();
	}elseif(isset($_POST['submitrules'])){
		header("Location: ../loginsystem/rules.html");
		exit();
	}elseif(isset($_POST['submitforum'])){
		echo'<a href="https://www.facebook.com/TeamImpetus/"></a>';
		exit();
	}elseif(isset($_POST['submitleader'])){
		header("Location: ../loginsystem/leaderboard.php");
		exit();
	}
?>	