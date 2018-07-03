<?php
session_start();
    $db = mysqli_connect('localhost', 'root', '', 'users detail');

    $user = "";
    $target_dir = "C:/xampp/htdocs/user login/images";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    


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

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

    // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
    }

        


        $query = "INSERT INTO user (username, password) VALUES('$username', '$password')"; 

        if(mysqli_query($db, $query)){
            $user_id = mysqli_insert_id($db);
            $query1 = "INSERT INTO personal_details (user_id, name, dob, hobby) VALUES('$user_id', '$name', '$dob', '$hobby')";
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
  


