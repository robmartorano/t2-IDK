<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="resultspage.css">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="stylehomepage.css">
	</head>


<body>
	<header>
		<?php require_once 'nav.php';?>
	</header>
		<?php require_once 'searchbar.php';?>

	<div id="whole_page">
	
	<div class="one_result">
			<div class="textbook_image">
				<img src="textbook_example.jpg" alt="Organic Chemistry">
				</div>
			<ul class="text_box">
				<li class="text" class="title">Title</li>
				<li class="text" class="seller">Seller: [insert name]</li>
				<li class="text" class="type">Hardcover Textbook</li>
				<li class="text" class="price">Price: $37.00</li>
				<li class="text" class="notes">Notes: Has some minor highlighting, writing...</li>
				</ul>
		</div>
	
	<div class="one_result">
			<div class="textbook_image">
				<img src="textbook_example.jpg" alt="Organic Chemistry">
				</div>
			<div class="text_box">
				<ul>
					<li class="text" class="title">Title</li>
					<li class="text" class="seller">Seller: [insert name]</li>
					<li class="text" class="type">Hardcover Textbook</li>
					<li class="text" class="price">Price: $37.00</li>
					<li class="text" class="notes">Notes: Has some minor highlighting, writing...</li>
				</ul>
			</div>
		</div>
	
	</div>
		
</body>
</html>