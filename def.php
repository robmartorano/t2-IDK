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
function userLogin($emails, $passwords, $dbs)
{
$sthandler = $dbs->prepare("SELECT * FROM Users WHERE email = '$emails' ");
$sthandler->execute();
$result = $sthandler->fetch(PDO::FETCH_ASSOC);
$hash = $result['password'];
$_SESSION['name']=$result['firstname'];
if (password_verify($passwords, $hash))
{

$_SESSION['logged_in'] = true;
$return = true;
header("Location: dashboard.php");
exit;

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

?>
