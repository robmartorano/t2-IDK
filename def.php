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

function userLogin($emails, $passwords, $dbs)
{

$sthandler = $dbs->prepare("SELECT * FROM Users WHERE email = '$emails' ");
$sthandler->execute();
$result = $sthandler->fetch(PDO::FETCH_ASSOC);
$hash = $result['password'];

if (password_verify($passwords, $hash))
{
echo "Hello, {$result['firstname']}";
$_SESSION['user_id'] = $sthandler['user_id'];
$_SESSION['logged_in'] = true;
$return = true;
}
else
{
$return = false;
}
return $return;

}

$emailx = $_POST['NetID'];
$passwordx = $_POST['password'];

if(userLogin($emailx, $passwordx, $db) != true)
{
	$errors[] = 'Username/password mismatch';
}

if(count($errors) > 0)
{
	$status = 0;
	$message = implode('<br />', $errors);
}
else
{
	$status = 1;
	$message = 'login successful';
}

echo $message;
?>