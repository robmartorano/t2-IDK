<!--Andy's dashboard that was overwritten 11/30/2015 -->
<?php
session_start();
$dsn = 'mysql:host=cgi.cs.duke.edu;port=3306;dbname=qp7;';
$username = 'qp7';
$password = 'qnDM4.fo6sX_';
try {
    $db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}
$ct = 0;
$idid = array();
$namename = array();
$pp = array();
$isis = array();
$adad = array();
$aa = array();
$sqlQ5 = $db->prepare('SELECT * FROM Books');
$sqlQ5->execute();
 while($row = $sqlQ5 -> fetch(PDO::FETCH_ASSOC))
	  {
	  $idid[$ct] = $row['id'];
	  $namename[$ct] = $row['BookName'];
	  $pp[$ct] = $row['Price'];
	  $isisi[$ct] = $row['ISBN10'];
	  $isiss[$ct] = $row['ISBN13'];
	  $adad[$ct] = $row['addition'];
	  $aa[$ct] = $row['author'];
	  $ct = $ct + 1;
	  //echo $bookid;
	  }
function getresult($BookName, $Count) {
	return
	"<div class='one_result'>
		<div class='text_box'>
			<ul class='text'>
				<li class='title' id = $Count onClick=reply_click(this.id)>$BookName</li>
			</ul>
		</div>
	</div>";
}
$counter = 0;
$abc = 1000;
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
       
       $result[$counter] = getresult($row1['BookName'], $row1['id']) ;
       $counter = $counter +1;
       }
	  }
$finalHTML = "";
foreach ($result as $value){
  $finalHTML .= $value;
}
?>

<html>
	<head>
		<link rel="stylesheet" href="styledashboard.css">
		<link rel="stylesheet" href="stylenav.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		function reply_click(clicked_id)
			{
 			var idid= <?php echo json_encode($idid); ?>;
 			var namename= <?php echo json_encode($namename); ?>;
 			var pp= <?php echo json_encode($pp); ?>;
 			var isisi= <?php echo json_encode($isisi); ?>;
 			var isiss= <?php echo json_encode($isiss); ?>;
 			var adad= <?php echo json_encode($adad); ?>;
 			var aa= <?php echo json_encode($aa); ?>;
 			var track = 0;
            for(var i=0;i<idid.length;i++)
            {
         	    if(idid[i] == clicked_id)
         	    {
         	   		track = i;
         	    }
         	}  
         	var wtfa = "<p>" + "book name: " + namename[track] + "</p>" + "\n" + 
         	"<p>" + "price: " + pp[track] + "</p>" + "\n"+
         	"<p>" + "ISBN10: " + isisi[track] + "</p>" + "\n"+
         	"<p>" + "ISBN13: " + isiss[track] + "</p>" + "\n"+
         	"<p>" + "book ID: " + idid[track] + "</p>" + "\n" + 
         	"<p>" + "author: " + aa[track] + "</p>" + "\n" +"<form action=delete.php method=Post>"
         	 + "<button type=submit  name=mybutton value =" + idid[track] + ">delete</button>" + "</form>" + "\n";
         	
         	document.getElementById("lol").innerHTML = wtfa;
//			document.getElementById("aaa").innerHTML = "lololo";
//			document.getElementById("lol").innerHTML = "book name: " + namename[track];
//			document.getElementById("lol").innerHTML = "price: " + pp[track];
//			document.getElementById("lol").innerHTML = "ISBN: " + isis[track];
//			document.getElementById("lol").innerHTML = "book name: " + namename[track];
//			document.getElementById("lol").innerHTML = "author: " + namename[track];
//			document.getElementById("lol").innerHTML = "book name: " + aa[track];
			}
											
		$(document).ready(function(){
			$("#button").click(function(){
				$("#popup").show();
			});
		});
		
		$(document).ready(function(){
			$("#close").click(function(){
				$("#popup").hide();
			});
		});
		
		</script>
	</head>
<body>

	<header>
		<?php require_once 'navcontrol.php';?>
	</header>

	<div class = "left">
		<?php //if(($_SESSION['results'])==true){
			//require_once('popup.php');
			//unset($_SESSION['results']);
		//}
			//else{
			//	echo "no books found";
		//	} ?>
		<div class = "sell">
			<h1 class = "titledash">Books that you're currently selling:</h1>
				<?php echo $finalHTML; ?>		
		</div>
	
		<div class = "add">
			<form action="isbndb.php"  method="post">
			<p><span id="inputtitle">Enter the ISBN Number, Price, and any notes about the book.<span> </p>
			<p><input type="number" name="ISBN" placeholder="ISBN"></p>
			<p><input type="text" name="price" placeholder="Price"></p>
			<p><input type="text" name="additional" placeholder="Notes about condition, etc."></p>
			<p><input type="submit" value="Add Textbook">
			</form>
		</div>
    </div>
	
    	<div class = "right">
    		<div class = "displaybook" id = "lol">
    			<h1 class = "titledash">
					Click a textbook (on the left) to view more details</h1>
    		</div>
    	</div>

</body>
</html>
=======