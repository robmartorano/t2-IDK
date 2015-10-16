<html>
	<head>
<link rel="stylesheet" href="styleregister.css">
	</head>

<body>
	<header>
		<?php require_once 'nav.php';?>
	</header>
<div class="text">
Register to buy textbooks from your classmates at an extremely low price. 
<br>
<img class="loginpic" src="dukelogo.jpg" alt="Login" ></img>
</div>	
<div class="register">
<form action="abc.php" method="post">

<br><br>
First Name:<br> <input class="fname" type="text" name="firstname"><br>
Last Name:<br> <input class='lname'type="text" name="lastname"><br>
Password:<br> <input class='pw' type="text" name="password"><br>
Re-type Password:<br> <input class='rpw' type="text" name="confirmpassword"><br>

Duke E-mail:<br> <input class='email' type="text" name="NetID"><br><br>
<input type="submit">
</div>
</form>

</body>
</html>