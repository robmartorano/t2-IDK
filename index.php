<DOCTYPE! HTML>
<html>
	<head>
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="style.css">
	</head>


<body>
	<header>
		<?php require_once 'nav.php';?>
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
	<form class="searchbar">
		<input id="typehere" type="text" placeholder="Enter book's name, author, ISBN, or the class name" required="">
		<input id="button" type="button" value="Search">
		</form>
		
</body>
</html>