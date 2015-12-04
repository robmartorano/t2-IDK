<html>
<?php
#Results page written by Andy and Wilson
session_start();
if(isset($_POST["wtf"])){
$_SESSION['temp']=$_POST["wtf"];

}else{
	$_SESSION['temp']="jfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfjfsadkfa1290dslfjaksdlfjalsdfka";
	/* pls don't judge Jerry*/
}
$needtosearch = $_SESSION['temp'];
unset($_SESSION['temp']);
$needtosearch = mysql_real_escape_string($needtosearch);
$abc = "%";
$needtosearch = $abc.$needtosearch.$abc;


function getresult($BookName, $Price, $ISBN10, $ISBN13, $author, $img, $email, $add, $class) {
	return 
	"<div class='one_result'>
		<div class='textbook_image'>
			<img src= $img alt='No image of textbook found'>
		</div>
		<div class='text_box'>
			<ul class='text'>
				<li class='title'>$BookName</li>
				<li class='author''>by $author</li>
				<li class='price'>$$Price</li>
				<li class='item ISBN'>ISBN-10: $ISBN10</li>
				<li class='item ISBN'>ISBN-13: $ISBN13</li>
				<li class='item class'><span id='class'>Class(es)</span>: $class</li>
				<li class='item notes'>Notes: $add</li>
				<li class='item contact'>Contact Seller:</li>
				<li class='wth' id=$email  >Email: $email</li>
				 
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

require_once('database.php');


//between two %% should be userinput
//for example "econ" should be a variable posted in
$counter = 0;
$sqlQ = $db->prepare('SELECT * FROM Books WHERE author LIKE :author or BookName LIKE :BookName or ISBN10 LIKE :ISBN10 or ISBN13 LIKE :ISBN13 or class like :class');
$sqlQ->bindValue(':author', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':BookName', $needtosearch, PDO::PARAM_STR);
$sqlQ->bindValue(':class', $needtosearch, PDO::PARAM_STR);
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
	  
      $result[$counter] = getresult($row['BookName'], $row['Price'], $row['ISBN10'], $row['ISBN13'], $row['author'], $row['img'],$uemail, $row['addition'], $row['class']);
      $counter = $counter +1;
}

$finalHTML = "";

foreach ($result as $value){
  $finalHTML .= $value;
}
?>

<head>
	
	<!-- <link rel="stylesheet" href="stylehomepage.css"> -->
	
	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="resultspage.css">
	<link rel="stylesheet" href="stylesearchbar.css">
	<link rel="stylesheet" href="stylenavnew.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
		<form action="takeform.php" method="POST">
			<div id ="close">
				Close
			</div>
			
			<div id="usersemail"><?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}else{echo 'You need to login first!';} ?></div>
	
			<p class="bold" id="subject">Subject: <input id="subjectinput" name="subject" size="64" maxlength="64"/> </p>
	
			<p class="bold"><i>Please enter the text of your message in the field that follows.</i></p>
			<textarea id="message" name="body" rows="10"	cols="60">	</textarea>
	
			<div id="emailButtonWrapper"> <input type="submit" name="send" value="Send Your Message"/> </div>
		</form>

	</div>
	
	<?php require_once 'searchbar.php';?>
	  
	<div id="searchresults">  
		<?php echo $finalHTML; ?>
	</div>
	
	<!-- Do we want to include the date when selling started? -->

	
  </body>
</head>
</html>
