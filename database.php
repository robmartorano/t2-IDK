<?php
session_set_cookie_params(0);
session_start();


$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';


try {
    $db = new PDO($dsn, $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
    die();
}  	

?>