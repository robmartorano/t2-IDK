<!doctype html>
<html>
<div class="bootstrap-iso">
<div class="nav-large">
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- made by Wilson using bootstrap v3.3.6	-->
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Duke Textbook Exchange</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
	  <?php if(isset($_SESSION['logged_in'])){
			echo' <li><a href="dashboard.php">'.$_SESSION["name"].'</a></li>
        <li><a href="logout.php">Log Out</a></li>';
		}else{echo'<li><a href="register.php">Sign Up</a></li>
        <li><a href="login.php">Log In</a></li>';}?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
</div>
</html>
