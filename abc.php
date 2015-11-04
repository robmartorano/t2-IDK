<?php
session_start();
error_reporting(E_ALL);

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';


try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}



$firstname = $_POST["firstname"]; 
$lastname = $_POST["lastname"]; 
$email = $_POST["NetID"];   
$password = $_POST["password"]; 
$password1 = $_POST["confirmpassword"];
$ip = $_SERVER["REMOTE_ADDR"];


//Verifcation 
if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($password1)){
    $error = "Complete all fields";
}

// Password match
if ($password != $password1){
    $error = "Passwords don't match";
}

// Email validation

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = "Enter a  valid email";
}

// Password length
if (strlen($password) <= 6){
    $error = "Choose a password longer then 6 character";
}

if(!isset($error)){
//no error
$sthandler = $db->prepare("SELECT * FROM Users WHERE email = :email");
$sthandler->bindParam(':email', $email);
$sthandler->execute();

if($sthandler->rowCount() > 0){
    echo "exists! cannot insert";
} else {
    
    $sql = 'INSERT INTO Users (firstname ,lastname, email, password, ip) VALUES (:firstname,:lastname,:email,:password,:ip)';    
    $query = $db->prepare($sql);
    $password_check = password_hash($password, PASSWORD_DEFAULT);
    $query->execute(array(

    ':firstname' => $firstname,
    ':lastname' => $lastname,
    ':email' => $email,
    ':password' => $password_check,
    ':ip' => $ip

    ));
    echo "success";
    require_once('login.php');
    }
}else{
    echo "error occured: ".$error;
    require_once('register.php');
    exit();
}
?>

