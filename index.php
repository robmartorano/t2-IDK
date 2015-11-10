<DOCTYPE! HTML>
<?php  session_start() ?>
<html>
	<head>
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="stylenav.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		
		//$(document).ready(function(){$("#line1").hide().fadeIn("slow",function(){$("#line2").hide().fadeIn("slow",function(){$("#line3").hide().fadeIn("slow");});});});
		
		
		$(document).ready(function(){
		$("#Login").click(function(){
        $("#popup").show();
		});
		});
		$(document).ready(function(){
		$("#popup").click(function(e){
			if(e.target != this){
            
            return false;
        }
        $("#popup").hide();
		});
		});
		</script>
		<title>Duke Textbook Exchange</title>
	</head>


<body id="background">

	<header>
		<?php require_once('navcontrol.php'); ?>
	</header>
	<div id ="popup">
		<div id="popuplogin">
		<form action="def.php"  method="post">
<img class="loginpic" src="login.png" alt="Login" ></img>

<input type="text" name="NetID" placeholder="Duke E-mail"><br>
<input type="password" name="password" placeholder="Password"><br>


<input type="submit">
</form>
			</div>
		</div>
	<!-- TEXT ON HOME PAGE -->
	<div id="intro_text">
		<p class="line_text" id="line1">Need a textbook for your class?</p>
		<p class="line_text" id="line2">Can't afford the Campus Bookstore's crazy prices?</p>
		<p class="line_text"id="line3">Welcome to the Duke Textbook Exchange.</p>
	</div>

	<!-- SEARCH BAR -->
	<?php require_once 'searchbar.php';?>


		
</body>
</html>