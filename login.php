<?php session_start() ?>
<html>

<head>
	<link rel="stylesheet" href="stylelogin.css">
	<link rel="stylesheet" href="stylenavnew.css">
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
	$(document).ready(function(){
		$('#blackfilter').hide().delay(200).fadeIn(1000);
		});
	</script>
</head>

<body id="backgroundlogin">

	<header>
		<?php require_once('navcontrol.php'); ?>
	</header>	
	
	<div id="blackfilter">

	
	<div class="welcometext">Sign In to buy textbooks</div>
	<div class="forms">

		<form action="def.php"  method="post">
			<img class="loginpic" src="login.png" alt="Login"/>

			<input class="typehere" type="text" name="NetID" placeholder="Duke E-mail"><br>
			<input class="typehere" type="password" name="password" placeholder="Password"><br>
			<input type="submit" value="Sign In">
		</form>
	</div>
	<div class="errorFeedback">
		<?php 
		if(isset($_SESSION['Login.Error'])){
			echo $_SESSION['Login.Error'];
			unset($_SESSION['Login.Error']);
		} 
		if(isset($_SESSION['rsuccess'])){
			echo $_SESSION['rsuccess'];
			unset($_SESSION['rsuccess']);
		}
		?>
	</div>
	</div>

</body>


</html>