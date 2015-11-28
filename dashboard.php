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
	  $isis[$ct] = $row['ISBN'];
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
 			var isis= <?php echo json_encode($isis); ?>;
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
         	"<p>" + "ISBN: " + isis[track] + "</p>" + "\n"+
         	"<p>" + "author: " + aa[track] + "</p>" + "\n";

         	
         	document.getElementById("lol").innerHTML = wtfa;

//			document.getElementById("lol").innerHTML = "book name: " + namename[track];
//			document.getElementById("lol").innerHTML = "price: " + pp[track];
//			document.getElementById("lol").innerHTML = "ISBN: " + isis[track];
//			document.getElementById("lol").innerHTML = "book name: " + namename[track];
//			document.getElementById("lol").innerHTML = "author: " + namename[track];
//			document.getElementById("lol").innerHTML = "book name: " + aa[track];
			}

			
		$(document).ready(function(){
		$("#button").click(function(){
        $("#popup").toggle();
		});
		});
</script>
	</head>
<body>

	<header>
		<?php require_once 'navcontrol.php';?>
		<script type="text/javascript">
			
		</script>
	</header>
		<div id ="popup">
		<form action="putbook.php"  method="post">

<input type="text" name="name" placeholder="Textbook Name"><br>
<input type="text" name="price" placeholder="Price"><br>
<input type="text" name="ISBN" placeholder="ISBN"><br>
<input type="text" name="author" placeholder="author"><br>
<input type="text" name="additional" placeholder="a few sentences to describe the book"><br>




<input type="submit">
		</div>
		<div class = "left">
    		
    		<div class = "sell">
    			<h1 class = "titledash">Books that you want to sell</h1>
    			<?php echo $finalHTML; ?>
    				<ul>

				<li id="button">
				add another listing
				</li>
        			</ul>
    		</div>
    	</div>
    	<div class = "right">

    		<div class = "displaybook" id = "lol">

    			<h1 class = "titledash">What is thisssss</h1>
    		</div>
    	</div>




</body>
</html>
