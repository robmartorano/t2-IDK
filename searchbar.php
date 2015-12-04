<div id="searchwrapper">
<!-- Seach bar written by Andy -->
	<form class="searchbar" action = "Searchresult.php" method="post">
	<input id="typehere" type="text" 
		placeholder="Enter book's name, author or ISBN"
		 required="" name="wtf">
	<input id="button" type="submit" value="Search" 
		 onclick="checkTextField('typehere');" onclick="location.href='Searchresult.php'">
	</form>
</div>
