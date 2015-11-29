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




function getresult($BookName) {
	return
	"<div class='one_result'>
		<div class='text_box'>
			<ul class='text'>
				<li class='title'>$BookName</li>
			</ul>
		</div>
	</div>";
}
$counter = 0;
$result = array();
$sqlQ = $db->prepare('SELECT * FROM ownedBooks WHERE user_id = :user_id');
$sqlQ->bindValue(':user_id', $_SESSION['userid'], PDO::PARAM_STR);
$sqlQ->execute();
 while($row = $sqlQ -> fetch(PDO::FETCH_ASSOC))
	  {
	  $bookid = $row['book_id'] ;
	  echo $bookid;
	  $sqlQ1 = $db->prepare('SELECT * FROM Books WHERE id = :id ');
	  $sqlQ1->bindValue(':id', $bookid, PDO::PARAM_INT);
	  $sqlQ1->execute();
    while($row1 = $sqlQ1 -> fetch(PDO::FETCH_ASSOC))
       {
       echo $row1['BookName'];
       $result[$counter] = getresult($row1['BookName']) ;
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

	</header>
	<div id ="popup">
		<form action="putbook.php"  method="post">

			<input type="text" class="box" name="name" placeholder="Textbook Name"><br>
			<input type="text" class="box" name="price" placeholder="Price"><br>
			<input type="text" class="box" name="ISBN" placeholder="ISBN"><br>
			<input type="text" class="box" name="author" placeholder="author"><br>
			<input type="text" class="box" name="additional" placeholder="a few sentences to describe the book"><br>
			<input type="submit">
		</form>
	</div>
		<div class = "left">
    		<div class = "buy">
        		<h1 class = "titledash">Books that you want to buy</h1>
				<ul id="what">
				<?php $length = count($_SESSION['bookname']);
				echo $length ?>
        			<script type= "text/javascript">
		 var count = "<?php echo $length ?>";
		 <?php $counter = 0;?>
		 for (i = 0; i < count; i++) {

			var tr= '';
    // create a new textInputBox

           var textInputBox = "<?php echo $_SESSION['bookname'][$counter] ; $counter++ ?>";
        // create a new Label Text
            tr += '<li>' + textInputBox + '</li>';
			document.write(tr);
}



				</script>
				<li>

				</li>
				</ul>

    		</div>

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

    		<div class = "displaybook">
    			<h1 class = "titledash">What is thisssss</h1>
    		</div>
    	</div>




</body>
</html>
