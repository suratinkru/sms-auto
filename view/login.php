<?php
    session_start();
    include_once('../config/server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>


    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>
    <div class="col-sm">

    <div class="card" style="margin-top: 110px;">
  <div class="card-header text-center text-white" style="background-color: rgb(79 80 255 / 69%);">
    Login
  </div>
  <div class="card-body">
    
  <form action="../controller/login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">

            <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
            </div>
           
            </div>
        <?php endif ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password"  class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="prefix">Prefix</label>
            <input type="text"  class="form-control" name="prefix">
        </div>
        <div class="form-group text-center">
            <button type="submit" name="login_user"class="btn btn-primary btn-sm">Login</button>
        </div>
        <hr>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>

  </div>
</div>
    </div>
    <div class="col-sm">

    </div>
  </div>
</div>








    
<!-- JS, Popper.js, and jQuery -->
<script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="../node_modules/popper.js/dist/popper.min.js" ></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>


    

</body>
</html>