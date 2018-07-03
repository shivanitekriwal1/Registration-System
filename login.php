<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

<?php
// if(isset($_SESSION['user_id'])){
//     header("location:home.php ");
//   }
  if (isset($_SESSION['message'])) {
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
  }
?>
	 
  <form method="post" action="process.php">
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="details.php">Sign up</a>
  	</p>
  </form>
</body>
</html>