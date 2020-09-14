<?php 
    session_start();
    include_once('../config/server.php');

    $errors = array();

    if (isset($_POST['urlname'])) {
        $url = mysqli_real_escape_string($conn, $_POST['url']);
       

        if (empty($url)) {
            array_push($errors, "url is required");
        }

       
        if (count($errors) == 0) {
   
            $query = "SELECT * FROM url WHERE urlname = '$url' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
               
                header("location: ../view/setting.php");
            } else {
                $sql = "INSERT INTO url (urlname) VALUES ('$url')";
            mysqli_query($conn, $sql);
            header("location: ../view/setting.php");
            }
        } else {
            array_push($errors, "url  is required");
            $_SESSION['error'] = "url  is required";
            header("location: ../view/setting.php");
        }
    }


    if (isset($_POST['name'])) {
        $url = mysqli_real_escape_string($conn, $_POST['url']);

        $id = $_POST['name'];
        print_r($id);
         var_dump($id);

        if (empty($url)) {
            array_push($errors, "url is required");
        }

       
        if (count($errors) == 0) {
         
            $query = "UPDATE `url` SET `urlname` = $url WHERE `url`.`id` = $id";
            $result = mysqli_query($conn, $query);

                  
                // header("location: ../view/setting.php");
        } else {
            array_push($errors, "url  is required");
            $_SESSION['error'] = "url  is required";
            // header("location: ../view/setting.php");
        }
    }

    

    if (isset($_GET['id'])) {

        $sql = "DELETE FROM url
			WHERE id = '".$_GET['id']."' ";

	    $query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
         echo "Record delete successfully";
         header("location: ../view/setting.php");
	}

	mysqli_close($conn);
    }


?>
