<?php

  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'users detail');
  $query = "SELECT id FROM "

  if_isset($_GET['id']){

	  $target_path = "image";
	  $image = $_FILES['image'];

	  $id = $_GET['id'];

	  $query = "SELECT image FROM PICTURES WHERE id = '".$_SESSION['id']."'";
	  $row = mysqli_query($db, $query);
	  $result = mysqli_fetch_assoc($row);

	  



