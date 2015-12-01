
<div id ="popup">
		
		Is this the book you want? <br>
		Title: <?php echo $_SESSION['booktitle']; ?><br>
		Author: <?php echo $_SESSION['author']; ?><br>
		ISBN_10: <?php echo $_SESSION['isbn10']; ?><br>
		ISBN_13: <?php echo $_SESSION['isbn13']; ?><br>
		<?php echo "<img src=".$_SESSION['imglink']. "alt='book image not found'>" ?>
		<form action="check.php" method="Post">
		<input type="submit" name="check" value="Yes"/>
		<input type="submit" name="check" value="No"/>
  
		</form>
		</div>
		
		