<?php session_start() ?>

<html>
	<head>
		<link rel="stylesheet" href="styledashboard.css">
		
	</head>

<body>
	
	<header>
		<?php require_once 'navcontrol.php';?>
		
	</header>
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
				<li>
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