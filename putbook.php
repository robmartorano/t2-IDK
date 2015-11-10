<?php
session_set_cookie_params(0);
session_start();


$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';


try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}



$name = $_POST["name"]; 
$price = $_POST["price"]; 
$isbn = $_POST["ISBN"];   
$author = $_POST["author"]; 
$additional = $_POST["additional"];



//Verifcation 
if (empty($name) || empty($price) || empty($isbn) || empty($author) || empty($additional)){
    $error = "Complete all fields";
}


if(!isset($error)){


    
    $sql = 'INSERT INTO Books (BookName ,Price, ISBN, author, addition) VALUES (:BookName,:Price,:ISBN,:author,:addition)';    
    $query = $db->prepare($sql);
    $query->execute(array(

    ':BookName' => $name,
    ':Price' => $price,
    ':ISBN' => $isbn,
    ':author' => $author,
    ':addition' => $additional

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
