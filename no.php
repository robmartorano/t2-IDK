<?php 

unset($_SESSION['author']);
unset($_SESSION['booktitle']);
unset($_SESSION['imglink']);
unset($_SESSION['isbn10']);
unset($_SESSION['isbn13']);
header("Location: dashboard.php");
exit();
?>