<?php
/*checks if user wants to put the book found by api in the database, written by jerry */
session_start();
if($_POST['check']=="Yes"){
	require_once('putbook.php');
	
}else{
	require_once('no.php');
}
?>