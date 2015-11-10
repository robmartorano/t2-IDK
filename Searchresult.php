<html>
<?php
$needtosearch = $_POST["wtf"];
$abc = "%";
$needtosearch = $abc.$needtosearch.$abc;

session_start();
function getresult($BookName, $Price, $ISBN, $author) {
	return 
	"<div class='one_result'>
		<div class='textbook_image'>
			<img src='textbook_example.jpg' alt='Organic Chemistry, 5th Edition'>
		</div>
		<div class='text_box'>
			<ul class='text'>
				<li class='title'>$BookName</li>
				<li class='author''>$author</li>
				<li class='price'>$Price</li>
				<li class='ISBN'>ISBN #: $ISBN</li>
				<li class='type'>Item: Hardcover Textbook</li>
				<li class='notes'>Notes: Has some minor highlighting, writing...</li>
				<li class='purchase hyperlink'>Purchase now</li>
			</ul>
		</div>
	</div>";
	// still need valid image, edition, seller (with a link to contact),  
	// type, notes, and purchase hyperlink
	
	// <div>
	//	<p>$BookName</p>
	//	<p>$Price</p>
	//	<p>$ISBN</p>
	//	<p>$author</p>
	//	</div>";
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

?>

	<head>
		<link rel="stylesheet" href="resultspage.css">
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="stylenav.css">
	</head>

<body>
	<header>
		<?php require_once 'navcontrol.php';?>
	</header>
	
	<?php require_once 'searchbar.php';?>
      
	<div id="whole_page">
		<div id="sidebar">
			<ul id="sidebar_text">
				<li class="indent1">Browse by Category</li>
				<li class="indent2">Mathematics</li>
				<li class="indent2">Economics</li>
				<li class="indent2">Computer Science</li>
			<!--	<li class="indent1">Browse by Course</li>
				<li class="indent2">Chemistry 201/202</li>
				<li class="indent2">Economics 101</li> -->
			</ul>
		</div>
	  
	<div id="searchresults">  
		<?php echo $finalHTML; ?>
	</div>
	
	<!-- Do we want to include the date when selling started? -->

	
  </body>
</head>
</html>
