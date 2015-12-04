
<div id="blackfilter">
<div id="popup">
	<div id ="close">
		Close
	</div>
<!-- Prompts the result if the google api didn't find any books, written by Jerry -->	
	<form action="process.php"  method="post">
		<p id="help"><span class="inputtitle">We're sorry, we cannot find your book.</span><br> 
		<span class="inputtitle">Please enter rest of the information manually:</span></p>
		<p class="bookInputBorders"><input class="bookInput" type="text" name="Title" placeholder="Title"></p>
		<p class="bookInputBorders"><input class="bookInput" type="number" name="ISBN10" placeholder="ISBN10"></p>
		<p class="bookInputBorders"><input class="bookInput" type="number" name="ISBN13" placeholder="ISBN13"></p>
		<p class="bookInputBorders"><input class="bookInput" type="text" name="Authors" placeholder="Authors"></p>
		<p class="bookInputBorders"><input class="bookInput" type="text" name="Image" placeholder="Link of Image of Book if Possible"></p>
		<input id="addButton" type="submit" value="Add Textbook">
	</form>

</div>
</div>
		
		