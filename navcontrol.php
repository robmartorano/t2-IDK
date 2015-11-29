<!doctype html>
<html>
<nav>
	<div class="navigation">
		<ul class="tabs">
			<li class="filler"></li>
			<li class="filler"></li>
			<li id="home" onclick="location.href='index.php'">Duke Textbook Exchange</li>
			<?php
			if (isset($_SESSION['name'])) {
				echo "<li class=\"filler\" id=\"name\" onclick=\"location.href='dashboard.php'\">";
					echo $_SESSION['name'];
					echo "</li>";
				echo "<li class=\"filler\" id=\"logout\" onclick=\"location.href='logout.php'\">Logout</li>";
			} 
			else {
				echo "<li class=\"filler\" id=\"Login\"onclick=\"location.href='login.php'\">Login</li><li class=\"filler\" id=\"Registration\" onclick=\"location.href='register.php'\">Sign Up</li>";
				
			}
			?>
		</ul>
	</div>
</nav>
</html>
