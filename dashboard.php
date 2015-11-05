<?php session_start() ?>

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


<input type="text" name="name" placeholder="Textbook Name"><br>
<input type="text" name="price" placeholder="Price"><br>
<input type="text" name="ISBN" placeholder="ISBN"><br>
<input type="text" name="author" placeholder="author"><br>
<input type="text" name="additional" placeholder="a few sentences to describe the book"><br>



<input type="submit">
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
    				<ul>
        			<script type= "text/javascript">
		 var num = "<?php Print($Se); ?>";
		 for (i = 0; i < 5; i++) { 
			var tr='';
    // create a new textInputBox  
           var textInputBox = 'hi';  
        // create a new Label Text
            
            tr += '<li>' + textInputBox + '</li>';  
			document.write(tr);
}
        
			
		
				</script>
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