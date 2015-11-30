<?php

session_start();


$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';


try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}



$name = $_SESSION["booktitle"]; 
$price = $_POST["price"]; 
$isbn10 = $_SESSION["isbn10"];   
$isbn13 = $_SESSION["isbn13"];  
$author = $_SESSION["author"]; 
$img = $_SESSION["imglink"]; 
$additional = $_POST["additional"];



//Verifcation 



if(!isset($error)){


    
    $sql = 'INSERT INTO Books (BookName ,Price, ISBN10,ISBN13, author, addition) VALUES (:BookName,:Price,:ISBN10,:ISBN13,:author,:addition)';    
    $query = $db->prepare($sql);
    $query->execute(array(

    ':BookName' => $name,
    ':Price' => $price,
    ':ISBN10' => $isbn10,
	':ISBN13' => $isbn13,
    ':author' => $author,
    ':addition' => $additional
	

    ));
  
    $sqls = 'SELECT * FROM Books WHERE BookName = :BookName AND Price = :Price AND ISBN = :ISBN AND author = :author AND addition = :addition';    
    $query1 = $db->prepare($sqls);
    $query1->execute(array(

    ':BookName' => $name,
    ':Price' => $price,
    ':ISBN' => $isbn,
    ':author' => $author,
    ':addition' => $additional

    ));
    $idd;
	while($row = $query1 -> fetch(PDO::FETCH_ASSOC)){
		$idd = $row['id'];
	}
    
	$sql2 = 'INSERT INTO ownedBooks (user_id , book_id) VALUES (:userid,:bookid)';    
    $query = $db->prepare($sql2);
    $query->execute(array(

    ':userid' => $_SESSION['userid'],
    ':bookid' => $idd
    ));
    
       $sthandler = $db->prepare("SELECT BookName FROM Books ");
	$sthandler->execute();
	$arr = array();
	$counter = 0;
	while($row = $sthandler -> fetch(PDO::FETCH_ASSOC)){
		$arr[$counter] = $row;
		$counter = $counter +1;	
	}
	
	$_SESSION['bookname'] = $arr;
	header("Location: dashboard.php");

    }
    
else{
    echo "error occured: ".$error;
    require_once('register.php');
    exit();
}
?>
