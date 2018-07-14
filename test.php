<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST">
	<button type="submit" name="submit">d</button>
</form>
<p id="a"></p>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		echo "
<script>
	document.getElementById('a').innerHTML ='Question';
</script>";
	}
?>