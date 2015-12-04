<?php
session_start();
	#Used to save the email for emailing client written by Jerry
	$_SESSION['sending'] = $_POST['name'];

 ?>