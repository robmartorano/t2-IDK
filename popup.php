

<div id="blackfilter">
<div id="popupcorrect">
<!-- Prompts the result the google Api found, written by Jerry -->		
	<p id="prompt">Is this the book you want to sell? </p>
	
	<div id="popuptext">
		<p class="popupinfo title">
			<span class="bold">Title:</span> 
			<?php echo $_SESSION['booktitle']; ?></p>
		<p class="popupinfo author">
			<span class="bold">Author:</span> 
			<?php echo $_SESSION['author']; ?></p>
		<p class="popupinfo isbn10">
			<span class="bold">ISBN_10:</span> 
			<?php echo $_SESSION['isbn10']; ?></p>
		<p class="popupinfo isbn13">
			<span class="bold">ISBN_13:</span> 
			<?php echo $_SESSION['isbn13']; ?></p>
	</div>
	
		<?php echo "<img class='imageBookPopup' src=".$_SESSION['imglink']. "alt='book image not found'>" ?>
		
		<form action="check.php" method="Post">
			<input id="yesButton" type="submit" name="check" value="Yes"/>
			<input id="noButton" type="submit" name="check" value="No"/>
		</form>
</div>
</div>
		