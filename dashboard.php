<?php session_start() ?>

<html>
	<head>
		<link rel="stylesheet" href="styledashboard.css">
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
		<form action="def.php"  method="post">


<input type="text" name="NetID" placeholder="Textbook Name"><br>
<input type="password" name="password" placeholder="Price"><br>


<input type="submit">
		</div>
		<div class = "left">
    		<div class = "buy">
        		<h1 class = "titledash">Books that you want to buy</h1>
				<ul id="what">
				</ul>
        			<script type= "text/javascript">
		 
		 for (i = 0; i < 5; i++) { 
			var tr='';
    // create a new textInputBox  
           var textInputBox = 'hi';  
        // create a new Label Text
            
            tr += '<li>' + textInputBox + '</li>';  
			document.write(tr);
}
        
			
		
				</script>
				<li>
				
				</li>
				
    		</div>
    
    		<div class = "sell">
    			<h1 class = "titledash">Books that you want to sell</h1>
    				<ul>
        			<script type= "text/javascript">
		 
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