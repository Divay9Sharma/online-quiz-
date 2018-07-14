<?php

session_start();
  if(isset($_SESSION['u_id'])){

    include_once 'dbh.php';
    $question_no = $_SESSION['u_question'];

    $sql = "SELECT * FROM questions WHERE q_no='$question_no'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

echo '<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <link rel="stylesheet prefetch" href="https://fonts.googleapis.com/css?family=Open+Sans:600">

      <link rel="stylesheet" href="css/style.css">
     


  
   <style>
body {
    background-image: url("img.jpg");
}
#butt{
	border-radius:3px;
	margin-right: 4px;
	border:none;
}
#butt:hover{
	cursor:pointer;
  color: blue;
}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Holmes 17</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-lg-0" action="logout.inc.php" method="POST">
        	<ul class="navbar-nav mr-auto">
        		<li class="nav-item">
        			<button type="submit" id="butt" name ="submitleader">Leaderboard</button>
        		</li>
        		<li class="nav-item">
            		<button type="submit" id="butt"><a href="https://www.facebook.com/TeamImpetus/" style="text-decoration:none;">Forum</a></button>
        		</li>
        		<li class="nav-item">
            		<button type="submit" id="butt" name ="submitrules">Rules</button>
          		</li>
          		<li class="nav-item">
            		<button type="submit" id="butt" name ="submitlogout">Logout</button>
          		</li>
    		</ul>
        </form>
      </div>
    </nav>
	<div class="jumbotron">
		<div id="imagediv" style="text-align:center;">
			<h1 class="display-6" id="Dquestion"></h1>
			<h4 id="userinfo">User</h4>
    		<img src="" alt="Image" id="image" height ="300px" width = "550px">
        <form id="form" name="form" action="questions.inc.php" method="POST">
        	<input type="text" name="answer" placeholder="submit your answer" style="border-radius:3px;"/>
        
        <button class="btn btn-outline-success my-2 my-sm-0" name ="done" type="submit">Submit</button>
        </form>
    	</div>
    </div>
    <div id= "footer">
		<div id= "copyright">
			copyright by &copy; impetus student society
		</div>
		<div id= "developed">
				developed and designed by divay sharma , shivarth kumar 
		 </div>
	</div>
</body>';
}else{
  echo 'Something went wrong. Please Sign In again';
}
?>
<script>
  var q ="<?php echo $question_no; ?>";
  document.getElementById("Dquestion").innerHTML ="Question " + q;
  document.getElementById("image").src = "<?php echo $row['q_path']; ?>";
  document.getElementById("userinfo").innerHTML = "User No. "+"<?php echo $_SESSION['u_id'] ?>"+"  User: " + "<?php echo $_SESSION['u_name'] ?>";
</script>