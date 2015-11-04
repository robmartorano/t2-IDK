<DOCTYPE! HTML>
<?php  session_start() ?>
<html>
	<head>
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="style.css">
		<title>Duke Textbook Exchange</title>
	</head>


<body>
	<header>
		<?php require_once('navcontrol.php'); ?>
	</header>
	
	<!-- BLURRED BACKGROUND IMAGE -->
	<div class="blur">
		<img src="duke.jpg" id="backgroundpic">
		</div>
	
	<!-- TEXT ON HOME PAGE -->
	<div id="intro_text">
		<p>Need a textbook for your class?</p>
		<p>Can't afford the Campus Bookstore's crazy prices?</p>
		<p>Welcome to the Duke Textbook Exchange.</p>
		</div>

	<!-- SEARCH BAR FORMATTING -->
	<?php require_once 'searchbar.php';?>
		
</body>
</html>