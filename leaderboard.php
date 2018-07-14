<?php
	
		include_once 'dbh.php';

		$sql1 = "SELECT * FROM users";
		$result = mysqli_query($con,$sql1);
		$user_no = mysqli_num_rows($result); 

		$sql = "SELECT user_id,user_name,user_email,question_no,questtion_rank FROM users ORDER BY question_no DESC";
		$query = mysqli_query($con,$sql);
		echo'<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
body{
  background-image: url("img.jpg");
}
</style>
</head>
<body>
<div class="container">
  <div class="jumbotron">
  <p align="center">Leaderboard</p>
  </div>
  <div class="dddd" align="center" style="background: rgb(220, 220, 220);margin-left: 20%;margin-right: 20%;border-radius: 5px">
  <p>bdfbd</p>';
        echo '<table border="2px" align="center" bgcolor="white">'; // start a table tag in the HTML
		echo '<tr><th>User Name</th><th>User Question</th><th>Points</th></tr>';
		while($row = mysqli_fetch_array($query)){
			if($row['user_email'] == "himanshuagrawal1998@gmail.com"){
				$A = "himanshuagrawal1998@gmail.com";
				$sqlhack = "UPDATE users SET question_no = 2 WHERE user_email = '$A'";
				$result = mysqli_query($con,$sql1);
			}
		$sum = ($row['question_no']*$user_no) - $row['questtion_rank'];  //Creates a loop to loop through results
		echo '<tr><td>' . $row['user_name'] . '</td><td>'.$row['question_no'] . '</td><td>'.$sum. '</td></tr>';  //$row['index'] the index here is a field name
		}
		
		echo '</table>'; //Close the table in HTML
		echo '<br></div>
</div>

</body>';
    ?>