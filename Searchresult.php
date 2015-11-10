<html>
<?php
$needtosearch = $_POST["wtf"];
$abc = "%";
$needtosearch = $abc.$needtosearch.$abc;

session_start();
function getresult($BookName, $Price, $ISBN, $author)
{

return "<div>
  <p>$BookName</p>
  <p>$Price</p>
  <p>$ISBN</p>
  <p>$author</p>
  </div>"
;
}

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

//between two %% should be userinput
//for example "econ" should be a variable posted in
$counter = 0;
$sqlQ = $db->prepare('SELECT * FROM Books WHERE author LIKE :author or BookName LIKE :BookName or ISBN LIKE :ISBN ');
$sqlQ->bindValue(':author', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':BookName', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':ISBN', $needtosearch, PDO::PARAM_INT);



$sqlQ->execute();
$result = array();
while($row = $sqlQ -> fetch(PDO::FETCH_ASSOC)){
      $result[$counter] = getresult($row['BookName'], $row['Price'], $row['ISBN'], $row['author']);
      $counter = $counter +1;
}

$finalHTML = "";

foreach ($result as $value){
  $finalHTML .= $value;
}
echo $finalHTML;
$_SESSION['returnstring'] = $finalHTML;
?>

<head>
  <body>
      <?php echo $_SESSION['returnstring']; ?>
  </body>
</head>
</html>
