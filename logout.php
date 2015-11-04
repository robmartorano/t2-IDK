<?php
session_start(); # NOTE THE SESSION START
$_SESSION = array(); 
session_unset();
session_destroy();
header("Location: index.php");
exit();
?>