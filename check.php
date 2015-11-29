<?php
session_start();
if($_POST['check']=="Yes"){
	require_once('putbook.php');
	
}else{
	require_once('no.php');
}
?>