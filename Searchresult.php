<html>
<?php
$needtosearch = $_POST["wtf"];
$needtosearch = mysql_real_escape_string($needtosearch);
$abc = "%";
$needtosearch = $abc.$needtosearch.$abc;

session_start();
function getresult($BookName, $Price, $ISBN10, $ISBN13, $author, $img, $email) {
	return 
	"<div class='one_result'>
		<div class='textbook_image'>
			<img src= $img alt='Organic Chemistry, 5th Edition'>
		</div>
		<div class='text_box'>
			<ul class='text'>
				<li class='title'>$BookName</li>
				<li class='author''>$author</li>
				<li class='price'>$$Price</li>
				<li class='ISBN'>ISBN10 #: $ISBN10</li>
				<li class='ISBN'>ISBN13 #: $ISBN13</li>
				<li class='type'>Item: Hardcover Textbook</li>
				<li class='notes'>Notes: Has some minor highlighting, writing...</li>
				<li class='purchasehyperlink'>Contact User:</li>
				<li class='wth' id='receiving_email'  >Email: $email</li>
				
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
$sqlQ = $db->prepare('SELECT * FROM Books WHERE author LIKE :author or BookName LIKE :BookName or ISBN10 LIKE :ISBN10 or ISBN13 LIKE :ISBN13 ');
$sqlQ->bindValue(':author', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':BookName', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':ISBN10', $needtosearch, PDO::PARAM_INT);
$sqlQ->bindValue(':ISBN13', $needtosearch, PDO::PARAM_INT);



$sqlQ->execute();
$result = array();
while($row = $sqlQ -> fetch(PDO::FETCH_ASSOC)){
	  $sqlQ1 = $db->prepare('SELECT * FROM ownedBooks WHERE book_id = :bookid ');
	  
	  $sqlQ1->bindValue(':bookid', $row['id'], PDO::PARAM_INT);
	  $sqlQ1->execute();
	  $userid;
	  while($row1 = $sqlQ1 -> fetch(PDO::FETCH_ASSOC))
	  {
	  $userid = $row1['user_id'] ;
	  }
	  $sqlQ2 = $db->prepare('SELECT * FROM Users WHERE userid = :id ');
	  $sqlQ2->bindValue(':id', $userid, PDO::PARAM_INT);
	  $sqlQ2->execute();
	  $uemail; 
	  while($row2 = $sqlQ2 -> fetch(PDO::FETCH_ASSOC))
	  {
	  $uemail = $row2['email'] ;
	  }
	  
      $result[$counter] = getresult($row['BookName'], $row['Price'], $row['ISBN10'], $row['ISBN13'], $row['author'], $row['img'],$uemail);
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
		<link rel="stylesheet" href="stylesearchbar.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		
	
		
		
		$(document).ready(function(){
		$(".wth").click(function(){
		var email = jQuery(this).attr("id");
		 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: email }
}).done(function( msg ) {
 
});  
		
        $("#email").show();
		
		
		});

	});
	$(document).ready(function(){
		$("#close").click(function(){
        $("#email").hide();
		});
		});


		</script>

	</head>

<body>
	
	<header>
		<?php require_once 'navcontrol.php';?>
	</header>
	
	<div id="email">

	<div id ="close">
		close
		</div>
	<form action="takeform.php" method="POST">
	<p>
	<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}else{echo 'Need to Login!';} ?> 
	</p>
	
	<p>
	Subject Of Your Message<br>
	<input
	name="subject"
	size="64"
	maxlength="64"/>
	
	</p>
	<p>
	<i>Please enter the text of your message in the field that follows.</i>
	</p>
	<textarea
	name="body"
	rows="10"
	cols="60">
	</textarea>
	<p>
	<input type="submit" name="send" value="Send Your Message"/>
	</p>
	</form>

	</div>
	
	<?php require_once 'searchbar.php';?>
      
	<!--<div id="whole_page">
		<div id="sidebar">
			<ul id="sidebar_text">
				<li class="indent1">Browse by Category</li>
				<li class="indent2">Mathematics</li>
				<li class="indent2">Economics</li>
				<li class="indent2">Computer Science</li>
			<!--	<li class="indent1">Browse by Course</li>
				<li class="indent2">Chemistry 201/202</li>
				<li class="indent2">Economics 101</li> 
			</ul>
		</div>-->
	  
	<div id="searchresults">  
		<?php echo $finalHTML; ?>
	</div>
	
	<!-- Do we want to include the date when selling started? -->

	
  </body>
</head>
</html>
