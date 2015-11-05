<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="resultspage.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="stylenav.css">
	</head>


<body>
	<header>
		<?php require_once 'nav.php';?>
	</header>
	
	<?php require_once 'searchbar.php';?>

	<div id="whole_page">
		<div id="sidebar">
			<ul id="sidebar_text">
				<li class="indent1">Browse by Category</li>
				<li class="indent2">Mathematics</li>
				<li class="indent2">Economics</li>
				<li class="indent2">Computer Science</li>
			<!--	<li class="indent1">Browse by Course</li>
				<li class="indent2">Chemistry 201/202</li>
				<li class="indent2">Economics 101</li> -->
			</ul>
		</div>
		
		<div id="searchresults">
	
			<div class="one_result">
				<div class="textbook_image">
					<img src="textbook_example.jpg" alt="Organic Chemistry, 5th Edition">
				</div>
				<div class="text_box">
					<ul class="text">
						<li class="title">Organic Chemistry, 5th Edition</li>
						<!-- Do we want to include the date when selling started? -->
						<li class="author">by Marc Loudon</li>
						<li class="price">$37.00</li>
						<li class="seller">Seller: Andy Chen (<span class="hyperlink">contact me</span>)</li>
						<li class="type">Item: Hardcover Textbook</li>
						<li class="notes">Notes: Has some minor highlighting, writing...</li>
						<li class="purchase hyperlink">Purchase now</li>
					</ul>
				</div>
			</div>
	
			<div class="one_result">
				<div class="textbook_image">
					<img src="textbook_example2.jpg" alt="Parkin Economics, 12th Edition">
				</div>
				<div class="text_box">
					<ul class="text">
						<li class="title">Economics, 12th Edition</li>
						<li class="author">by Michael Parkin</li>
						<li class="price">$10000000000000000000000000000000000447.58</li>
						<li class="seller">Seller: Wilson Bodong Zhang (<span class="hyperlink">contact me</span>)</li>
						<li class="type">Item: Hardcover Textbook</li>
						<li class="notes">Notes: I threw up on about half the pages, so it kinda 
						smells bad and some of the words are unreadable from allt he stains but 
						I think I charge a pretty reasonable price so buy it from me pls </br> </br> 
						Also this </br> 
						element </br>
						adjusts </br>
						its height </br>
						automatically </br>
						based on stuff inside it</li>
						<li class="purchase hyperlink">Purchase now</li>
					</ul>
				</div>
			</div>
			
			<div class="one_result">
				<div class="textbook_image">
					<img src="textbook_example3.jpg" alt="Organic Chemistry, 6th Edition">
				</div>
				<div class="text_box">
					<ul class="text">
						<li class="title">Organic Chemistry, 6th Edition</li>
						<li class="author">by Marc Loudon & Jim Parise</li>
						<li class="price">$1037.00</li>
						<li class="seller">Seller: Andy Chen (<span class="hyperlink">contact me</span>)</li>
						<li class="type">Item: Hardcover Textbook</li>
						<li class="notes">Notes: Basically new, which is why I jacked up the price so much</li>
						<li class="purchase hyperlink">Purchase now</li>
					</ul>
				</div>
			</div>
	
		</div>
	
	</div>
		
</body>
</html>