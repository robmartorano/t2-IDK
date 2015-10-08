
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
$sqlq = "INSERT INTO myTable (USERNAME, PASSWORD) VALUES (:user, :password)";
// $sql = "UPDATE Test SET stuff=:stuff WHERE id=:id";

$usernames = $_POST["firstname"];
$password = $_POST["password"];
$getready = $db->prepare($sqlq);
$getready->execute(array(':user' => $usernames, ':password' => $password));

echo "Entered data successfully\n";
?>





