<?php
/*dashboard where user can add and delete their textbook listings written by Jerry and Wilson and styling by Andy*/
session_start();
if(isset($_SESSION['logged_in'])){
	

$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
$idid = array();
$namename = array();
$pp = array();
$isis = array();
$adad = array();
$img = array();
$aa = array();
function getresult($BookName, $Count, $bid) {
	return
	"<li class='booktitle' id = $bid onClick=reply_click(this.id)>
		<div class='bookname'>$BookName</div>
		<div class='price'>$ $Count</div>
		</li>";
}
$counter = 0;
$result = array();
$sqlQ = $db->prepare('SELECT * FROM ownedBooks WHERE user_id = :user_id');
$sqlQ->bindValue(':user_id', $_SESSION['userid'], PDO::PARAM_STR);
$sqlQ->execute();
 while($row = $sqlQ -> fetch(PDO::FETCH_ASSOC))
	  {
	  $bookid = $row['book_id'] ;
	  //echo $bookid;
	  $sqlQ1 = $db->prepare('SELECT * FROM Books WHERE id = :id ');
	  $sqlQ1->bindValue(':id', $bookid, PDO::PARAM_INT);
	  $sqlQ1->execute();
    while($row1 = $sqlQ1 -> fetch(PDO::FETCH_ASSOC))
       {
       //echo $row1['BookName'];
       
       $result[$counter] = getresult($row1['BookName'], $row1['Price'], $row1['id']) ;
       $idid[$counter] = $row1['id'];
	   $namename[$counter] = $row1['BookName'];
	   $pp[$counter] = $row1['Price'];
	   $isisi[$counter] = $row1['ISBN10'];
	   $isiss[$counter] = $row1['ISBN13'];
	   $adad[$counter] = $row1['addition'];
	   $aa[$counter] = $row1['author'];
	   $img[$counter] = $row1['img'];
       $counter = $counter +1;
       }
	  }
$finalHTML = "";

foreach ($result as $value){
  $finalHTML .= $value;
}
}else{
	header("Location: login.php");
	exit();
}
?>

<html>

<head>
	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="styledashboard.css">
	<link rel="stylesheet" href="stylenavnew.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	function reply_click(clicked_id){
 		var idid= <?php echo json_encode($idid); ?>;
 		var namename= <?php echo json_encode($namename); ?>;
 		var pp= <?php echo json_encode($pp); ?>;
 		var isisi= <?php echo json_encode($isisi); ?>;
 		var isiss= <?php echo json_encode($isiss); ?>;
 		var adad= <?php echo json_encode($adad); ?>;
 		var aa= <?php echo json_encode($aa); ?>;
		var img= <?php echo json_encode($img); ?>;
 		var track = 0;
        for(var i=0;i<idid.length;i++){
         	if(idid[i] == clicked_id){
         	   	track = i;
         	}
        }  
        
		var wtfa =  "<img id='textbookpic' src=" + img[track] +" alt='No image of textbook'>" +
			"<p>" + "<div class='floatleft'><strong>Title: </strong></div>" + 
				"<div class='floatright'>" + namename[track] + "</div></p>" + "\n" + 
			"<p>" + "<div class='floatleft'><strong>Author: </strong></div>" + 
				"<div class='floatright'>" + aa[track] + "</div></p>" + "\n" + 
			"<p>" + "<div class='floatleft'><strong>Price: </strong></div>" + 
				"<div class='floatright'>$" + pp[track] + "</div></p>" + "\n" +
			"<p>" + "<div class='floatleft'><strong>ISBN10: </strong></div>" + 
				"<div class='floatright'>" + isisi[track] + "</div></p>" + "\n"+
			"<p>" + "<div class='floatleft'><strong>ISBN13: </strong></div>" + 
				"<div class='floatright'>" + isiss[track] + "</div></p>" + "\n"+
			//"<p>" + "book ID: " + idid[track] + "</p>" + "\n" + 
			"<p id='gah'>Be sure to delete this book when it is sold <br> or if you decide not to sell it.</p>" +
			"<form action=delete.php method=Post>"
			+ "<button id='deleteButton' type='submit' name='mybutton' value=" + idid[track] + ">Delete Textbook</button>" + "</form>" + "\n";
         	
        document.getElementById("lol").innerHTML = wtfa;
//		document.getElementById("aaa").innerHTML = "lololo";
//		document.getElementById("lol").innerHTML = "book name: " + namename[track];
//		document.getElementById("lol").innerHTML = "price: " + pp[track];
//		document.getElementById("lol").innerHTML = "ISBN: " + isis[track];
//		document.getElementById("lol").innerHTML = "book name: " + namename[track];
//		document.getElementById("lol").innerHTML = "author: " + namename[track];
//		document.getElementById("lol").innerHTML = "book name: " + aa[track];
		}


											
	$(document).ready(function(){
		$("#button").click(function(){
			$("#popup").show();
		});
	});
		
	$(document).ready(function(){
		$("#close").click(function(){
			$("#popup").hide();
			$("#blackfilter").hide();
		});
	});
		
	</script>
</head>

<body id="backgroundregister">
	<header>
		<?php require_once 'navcontrol.php';?>
	</header>

	
	<?php require_once 'searchbar.php';?>
	
	<?php if(isset($_SESSION['results'])){
			if(($_SESSION['results'])==true){
				require_once('popup.php');
				unset($_SESSION['results']);}
			else{
				
				require_once('popup1.php');
				unset($_SESSION['results']);
			}} ?>
	
	<div class = "left">
		<div class = "selling">
    		<h1 class = "titledash">Books that you're currently selling:</h1>
			
			<div id='text_box'>
				<ul id='text'>	
					<?php echo $finalHTML; ?>
				</ul>
			</div>
		
		</div>				
		
		<div class = "addNewBook">
			<form action="isbndb.php"  method="post">
				<p class="inputtitle" id="underline">Got a book you want to sell?</p>
				<p class="inputtitle">Enter the book's ISBN number, your price, and any notes about
					the book or its condition.</p>
					
				<p class="bookInputBorders"><input class="bookInput" type="number" name="ISBN" placeholder="ISBN"></p>
				<p class="bookInputBorders"><input class="bookInput" type="number" name="price" placeholder="Price"></p>
				<p class="bookInputBorders"><input class="bookInput" type="text" name="class" placeholder="What class is this book used in"></p>
				<p class="bookInputBorders"><input class="bookInput" type="text" name="additional" placeholder="Notes about the book, condition, etc."></p>
				<input id="addButton" type="submit" value="Add Textbook">
			</form>
		</div>
    </div>
    <div class = "right">
   		<div class="displaybook">
   			<h1 class="titledash" id="details"><u>Click a textbook (to the left) to view more details</u></h1>
			<div id="lol"></div>
   		</div>
   	</div>



</body>
</html>
