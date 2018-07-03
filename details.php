
<?php session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'users detail');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  

<?php
//print_r($_SESSION);
    if (isset($_SESSION['message'])) {
      echo "<div id='error_msg'>".$_SESSION['message']."</div>";
      unset($_SESSION['message']);
    }

    //$sql = "SELECT * FROM user U, personal_details A, professional_details B, educational_details C WHERE U.id=".$_SESSION['id']." AND U.id = A.user_id AND  A.user_id=B.user_id AND B.user_id = C.user_id";
    $sql = "SELECT * FROM (((user U LEFT JOIN personal_details A ON U.id = A.user_id) LEFT JOIN professional_details B ON A.user_id = B.user_id) LEFT JOIN educational_details C ON B.user_id = C.user_id) WHERE U.id='".$_SESSION['id']."'"; 
    $row = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($row);
        //echo "<pre>";
        //print_r($user);
?>
  <div class="header">
  <h2>Register</h2>
  </div>

  <form method="post" action="details_process.php">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $user['username']; ?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>


	  <div class="header">
      <h2>Personal Details</h2>
    </div>

  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $user['name']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>dob</label>
  	  <input type="date" name="dob" value="<?php echo $user['dob']; ?>">
  	</div>
    <div class="input-group">
      <label>Hobby</label>
      <input type="text" name="hobby" value="<?php echo $user['hobby']; ?>">
    </div>
    <div class = "input-group">
      <label>Image</label>
      <input type="file" name="filetoupload" id = "filetoupload">
    </div>


    <div class="header">
      <h2>Professional Details</h2>
    </div>

    <div class="input-group">
      <label>Company Name</label>
      <input type="text" name="company_name" value="<?php echo $user['company_name']; ?>">
    </div>
    <div class="input-group">
      <label>Date of joining</label>
      <input type="date" name="date_of_joining" value="<?php echo $user['date_of_joining']; ?>">
    </div>


    <div class="header">
      <h2>Educational Details</h2>
    </div>

    <div class="input-group">
      <label>Name of High school</label>
      <input type="text" name="high_school" value="<?php echo $user['high_school']; ?>">
    </div>
    <div class="input-group">
      <label>Year of passing</label>
      <input type="date" name="high_school_year" value="<?php echo $user['high_school_year']; ?>">
    </div>
    <div class="input-group">
      <label>Name of Secondary school</label>
      <input type="text" name="secondary_school" value="<?php echo $user['secondary_school']; ?>">
    </div>
    <div class="input-group">
      <label>Year of passing</label>
      <input type="date" name="secondary_school_year" value="<?php echo $user['secondary_school_year']; ?>">
    </div>



    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Insert</button>
    </div>
  </form>


</body>
</html>