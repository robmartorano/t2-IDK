
<nav>
<div class="navigation">

	<ul class="tabs">
		<li id="home" onclick="location.href='index.php'">Duke Textbook Exchange</li>
		<li></li>
		<li id="name" onclick="location.href='dashboard.php'">
			<?php echo $_SESSION['name'];?></li>
		<li id="logout" onclick="location.href='logout.php'">Logout</li>
		</ul>
		
</div>
</nav>