<?php
session_start();
$dele = $_POST["mybutton"]; 
//echo $dele;
$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';


try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$sthandler = $db->prepare("DELETE FROM Books WHERE id = :id");
$sthandler->bindParam(':id', $dele);
$sthandler->execute();

$sthandler1 = $db->prepare("DELETE FROM ownedBooks WHERE book_id = :id");
$sthandler1->bindParam(':id', $dele);
$sthandler1->execute();

header("Location: dashboard.php");
?>