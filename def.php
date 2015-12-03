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
function userLogin($emails, $passwords, $dbs) {
	$sthandler = $dbs->prepare("SELECT * FROM Users WHERE email = '$emails' ");
	$sthandler->execute();
	$result = $sthandler->fetch(PDO::FETCH_ASSOC);
	$hash = $result['password'];
	$activation = $result['activation'];

	if (password_verify($passwords, $hash) && is_null($activation)){
		$_SESSION['logged_in'] = true;
		$return = true;
		$_SESSION['name']=$result['firstname'];
		$_SESSION['email']=$result['email'];
		$_SESSION['userid']=$result['userid'];
		header("Location: dashboard.php");
		exit;
	}
	else {
		
		$_SESSION["Login.Error"] = 'Invalid Login/Password or have not activated ';
		header("Location: login.php");
		exit();
	}
	return $return;
	}
	

$emailx = $_POST['NetID'];
$emailx = mysql_real_escape_string($emailx);
$passwordx = $_POST['password'];
$passwordx = mysql_real_escape_string($passwordx);
userLogin($emailx, $passwordx, $db);
?>
