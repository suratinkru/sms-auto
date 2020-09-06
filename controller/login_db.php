<?php 
    session_start();
    include_once('../config/server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $prefix = mysqli_real_escape_string($conn, $_POST['prefix']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (empty($prefix)) {
            array_push($errors, "prefix is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND prefix = '$prefix' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header("location: ../index.php");
            } else {
                array_push($errors, "Wrong Username or Password or prefix");
                $_SESSION['error'] = "Wrong Username or Password or prefix!";
                header("location: ../view/login.php");
            }
        } else {
            array_push($errors, "Username & Password or prefix is required");
            $_SESSION['error'] = "Username & Password or prefix is required";
            header("location: ../view/login.php");
        }
    }

?>
