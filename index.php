<html >
<head>
  <meta charset="UTF-8">
  <title>Quiz Portal</title>
  
  <?php session_start();?>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="css/style.css">
     


  
   <style>
body {
    background-image: url("img.jpg");


}
</style>
  
</head>

<body>
<div id="newDiv">
  		<div id="div1" style= "background-image: url(''); background-repeat: no-repeat;" ></div>
  		<div id="div2"></div>
  		<div id="div3"></div>
  	</div>
  <div class="login-wrap">
  	
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form action="login.inc.php" method="POST">
				<div class="group">
					<label for="user" class="label">Email-id</label>
					<input id="user"  name="uid" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name ="Epwd" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<button type="submit" name = "submit1" class="button" value="Sign In">sign in</button>
				</div>
				<br>
				<div class="group" align="center" style=" margin: 0px 10% 0px 10%;padding: 1px 0px 1px 0px; border-radius: 15px;">
					<p id="message"></p>
				</div>
				<br>
				<div class="foot-lnk">
					<a href="Forgot.html">Forgot Password?</a>
				</div>
				<div class="hr"></div>
				</form>
			</div>
			<div class="sign-up-htm">
			<form action="signup.inc.php" class="signup-form" method="POST">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="user_name" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="pwd" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" name="repwd" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" name="email" type="text" class="input">
				</div>
				<div class="group">
					<button type="submit" name="submit2" class="button" value="Sign Up">sign up</button>
				</div>

				<div class="hr"></div>
				
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<footer id= "footer">
		<div id= "copyright">
			
		</div>
		<div id= "developed"> 
			
		 </div>
	</footer> 
</html>
<script>
  var z="<?php echo $_SESSION['error']; ?>";
  document.getElementById("message").innerHTML =z;
</script>