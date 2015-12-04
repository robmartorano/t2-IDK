<?php session_start();
echo hi;
#intermediate step that serves no purpose 
$_SESSION['author']=$_POST['Authors'];
$_SESSION['booktitle']=$_POST['Title'];
$_SESSION['isbn10']=$_POST['ISBN10'];
$_SESSION['isbn13']=$_POST['ISBN13'];
$_SESSION['imglink']=$_POST['Image'];
header('Location: putbook.php');
exit();
?>