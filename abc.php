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



$firstname = $_POST["firstname"]; 
$firstname = mysql_real_escape_string($firstname);
$lastname = $_POST["lastname"]; 
$lastname = mysql_real_escape_string($lastname);
$email = $_POST["NetID"];   
$email = mysql_real_escape_string($email);
$password = $_POST["password"]; 
$password = mysql_real_escape_string($password);
$password1 = $_POST["confirmpassword"];
$password1 = mysql_real_escape_string($password1);
$ip = $_SERVER["REMOTE_ADDR"];
$email = strtolower($email) ;
$jk = "duke";


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
    $error = "Enter a valid email";
}


if(!strpos($email, $jk))
{
	$error = "Enter a duke email";
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
    $_SESSION['rsuccess'] = "Success";
    header('Location: login.php');
    }
}else{
	$_SESSION['rsuccess'] = $error;
    header('Location: register.php');
    exit();
}
?>

