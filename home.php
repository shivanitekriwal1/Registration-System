<?php 
    session_start()
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
<?php
	if(!isset($_SESSION['id'])){
		header("location:login.php ");
	}
    if (isset($_SESSION['message'])) {
    	echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    	unset($_SESSION['message']);
    }
?>
<div><h4> Details Updated</h4></div>
<div><a href="logout.php">Logout</a></div>
</body>
</html>