<?PHP 
session_set_cookie_params(0);
session_start();
#made by wilson, copied from http://youhack.me/2010/04/01/building-a-registration-system-with-email-verification-in-php/
$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',
 $_GET['email'])) {
 $email = $_GET['email'];
}
if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
 //The Activation key will always be 32 since it is MD5 Hash
 {
 $key = $_GET['key'];
}
echo $email;
echo $key;
if (isset($email) && isset($key)) {
 // Update the database to set the "activation" field to null
 $sql = "UPDATE Users SET activation=NULL WHERE(email ='$email' AND activation='$key')LIMIT 1";
 $query = $db->prepare($sql);
 $query->execute();
 $count = $query->rowCount();
 // Print a customized message:
 if ($count == 1) //if update query was successfull
 {
 $_SESSION['rsuccess'] = 'Your account is now active. Try login';
 header("Location: login.php");
 } 
 else 
 {
 $_SESSION['rsuccess'] = 'Oops !Your account could not be activated or is already activated. Please recheck the link or contact the system administrator.';
 header("Location: login.php");
 }


}
?>