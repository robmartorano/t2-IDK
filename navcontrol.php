<!doctype html>
<html>
<nav>
	<div class="navigation">
		<ul class="tabs">
			<li id="home" onclick="location.href='index.php'">Duke Textbook Exchange</li>
			<li></li>
			<?php
			if (isset($_SESSION['name'])) {
				echo "<li id=\"name\" onclick=\"location.href='dashboard.php'\">";
					echo $_SESSION['name'];
					echo "</li>";
				echo "<li id=\"logout\" onclick=\"location.href='logout.php'\">Logout</li>";
			} 
			else {
				echo "<li id=\"Login\">Login</li>";
				echo "<li id=\"Registration\" onclick=\"location.href='register.php'\">Sign Up</li>";
			}
			?>
		</ul>
	</div>
</nav>
</html>
