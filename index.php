<DOCTYPE! HTML>
<?php  session_start() ?>
<html>
	<head>
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="stylenav.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
		$("#Login").click(function(){
        $("#popup").toggle();
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
		<form action="putbook.php"  method="post">

		<input type="text" name="Email" placeholder="Email"><br>
		<input type="text" name="Password" placeholder="Password"><br>




			<input type="submit">
		</div>
	<!-- TEXT ON HOME PAGE -->
	<div id="intro_text">
		<p class="line_text">Need a textbook for your class?</p>
		<p class="line_text">Can't afford the Campus Bookstore's crazy prices?</p>
		<p class="line_text">Welcome to the Duke Textbook Exchange.</p>
	</div>

	<!-- SEARCH BAR -->
	<?php require_once 'searchbar.php';?>


		
</body>
</html>