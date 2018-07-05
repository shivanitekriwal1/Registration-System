<?php
session_start();
    $db = mysqli_connect('localhost', 'root', '', 'users detail');

    $user = "";


    if(isset($_POST['reg_user'])) {

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        //$password = md5($password);
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $hobby = mysqli_real_escape_string($db, $_POST['hobby']);
        $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
        $date_of_joining = mysqli_real_escape_string($db, $_POST['date_of_joining']);
        $high_school = mysqli_real_escape_string($db, $_POST['high_school']);
        $secondary_school   = mysqli_real_escape_string($db, $_POST['secondary_school']);
        $high_school_year  = mysqli_real_escape_string($db, $_POST['high_school_year']);
        $secondary_school_year  = mysqli_real_escape_string($db, $_POST['secondary_school_year']);

        $image = $_FILES['image']['name'];
        $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

        $target = "C:/xampp/htdocs/user login/images".basename($image);

        
      //$result = mysqli_query($db, "SELECT * FROM images");

        


        $query = "INSERT INTO user (username, password) VALUES('$username', '$password')"; 

        if(mysqli_query($db, $query)){
            $user_id = mysqli_insert_id($db);
            $query1 = "INSERT INTO personal_details (user_id, name, dob, hobby, image, image_text) VALUES('$user_id', '$name', '$dob', '$hobby', '$image', '$image_text')";
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
            $result1 = mysqli_query($db, $query1);
            $query2 = "INSERT INTO professional_details (user_id, company_name, date_of_joining) VALUES ('$user_id', '$company_name', '$date_of_joining')";
            $result2 = mysqli_query($db, $query2);
            $query3 = "INSERT INTO educational_details (user_id, high_school, high_school_year, secondary_school, secondary_school_year) VALUES('$user_id', '$high_school', '$high_school_year', '$secondary_school', '$secondary_school_year')";
            $result3 = mysqli_query($db, $query3);
        }
        else{
            echo "please try again!";
        }

        $_SESSION['id'] = $user_id; 
        $_SESSION['message'] = "details updated";

       header('location: home.php'); 


      }
  


