<?php
session_start(); # Script to log user out, written by Jerry 
$_SESSION = array(); 
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>