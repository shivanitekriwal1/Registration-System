<?php
    session_start();


    $username = "";
    //$errors = array();


    $db = mysqli_connect('localhost', 'root', '', 'users detail');


    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        //$password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($results);
        $user_id = $row['id'];
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['id'] = $user_id;
            $_SESSION['message'] = "You are now logged in";
            header('location: details.php');
        }
        else {
            //echo "Username/password incorrect";
            $_SESSION['message'] = "Username/password incorrect";
            header('location: login.php');
        }
        }

?>