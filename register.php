<?php session_set_cookie_params(0); session_start() ?>
<html>
	<head>
		<link rel="stylesheet" href="styleregister.css">
		<link rel="stylesheet" href="stylenav.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script> 
			$(document).ready(function(){
				$('#blackfilter').hide().delay(200).fadeIn(1000);
			});
		</script>
		<script>
			function checkTextField(field) {
				if (field.value == '') {
				alert("Field is empty");
			}
		</script>
	</head>

<body id="backgroundregister">
	
	<header>
		<?php require_once('navcontrol.php'); ?>
	</header>
	
	<div id="blackfilter">
	<div class="text">
		Register to buy textbooks from classmates at low prices. 
			<br>
		<!--<img class="loginpic" src="dukelogo.jpg" alt="Login"></img>-->
	</div>	
	
	<div class="register">
	<?php if(isset($_SESSION['rsuccess']))
			{
			echo $_SESSION['rsuccess'];
			unset($_SESSION['rsuccess']);
			}?>
		<form action="abc.php" method="post">
			<br><br>
			<div class="entry">
			<span class="left">First Name:</span>
				<input class="typehere" id="fname" type="text" name="firstname" onblur="checkTextField(this);"><br>
				</div>
				
			<div class="entry">
			<span class="left">Last Name:</span>
				<input class="typehere" id="lname" type="text" name="lastname"><br>
				</div>
				
			<div class="entry">
			<span class="left">Password:</span>
				<input class="typehere" id="pw" type="password"  name="password"><br>
				</div>
				
			<div class="entry">
			<span class="left">Re-type Password:</span>
				<input class="typehere" id="rpw" type="password"  name="confirmpassword"><br>
				</div>
				
			<div class="entry">
			<span class="left">Duke E-mail:</span>
				<input class="typehere" id="email" type="text" name="NetID"><br><br>
				</div>
				
			<input id="registerButton" type="submit" value="Sign Up" onclick = checkTextField(entry)>
		</form>
	</div>
	</div>

</body>
</html>