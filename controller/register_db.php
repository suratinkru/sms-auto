<?php 
    session_start();
    include_once('../config/server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $prefix = mysqli_real_escape_string($conn, $_POST['prefix']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        if (empty($prefix)) {
            array_push($errors, "prefix is required");
        }

        $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' OR prefix = '$prefix' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
            if ($result['prefix'] === $prefix) {
                array_push($errors, "prefix already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO users (username, email, password, prefix) VALUES ('$username', '$email', '$password', '$prefix')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../index.php');
        } else {
            array_push($errors, "Username or Email or prefix already exists");
            $_SESSION['error'] = "Username or Email or prefix already exists";
            header("location: register.php");
        }
    }

?>