<DOCTYPE! HTML>
<?php  session_start() ?>
<html>
	<head>
		<link rel="stylesheet" href="stylehomepage.css">
		<link rel="stylesheet" href="stylenav.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<!-- <link rel="stylesheet" href="stylesearchbar.css"> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
		
		function checkTextField(field) {
    if (field.value == '') {
        alert("Field is empty");
    }
}
		//$(document).ready(function(){$("#line1").hide().fadeIn("slow",function(){$("#line2").hide().fadeIn("slow",function(){$("#line3").hide().fadeIn("slow");});});});
		
		
		
		
		// $(document).ready(function(){
// 		$("#popup").click(function(e){
// 			if(e.target != this){
//             
//             return false;
//         }
//         $("#popup").hide();
// 		});
// 		});


		</script>
		<title>Duke Textbook Exchange</title>
	</head>


<body id="background">

	<header>
		<?php require_once('navcontrol.php'); ?>
	</header>
	
	
	<!-- TEXT ON HOME PAGE -->
	<div id="intro_text">
		<p class="line_text" id="line1">Need a textbook for your class?</p>
		<p class="line_text" id="line2">Can't afford the Campus Bookstore's crazy prices?</p>
		<p class="line_text" id="line3">Welcome to the Duke Textbook Exchange.</p>
	</div>

	<!-- SEARCH BAR -->
	<?php require_once 'searchbar.php';?>


		
</body>
</html>