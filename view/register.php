<?php 
    session_start();
    include_once('../config/server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-6">

    <div class="card" style="margin-top: 50px;">
  <div class="card-header text-center text-white" style="background-color: rgb(79 80 255 / 69%);">
   Register
  </div>
  <div class="card-body">
    
  <form action="../controller/register_db.php" method="post">
        <?php include('../errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text"   class="form-control"name="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email"   class="form-control"name="email">
        </div>
        <div class="form-group">
            <label for="password_1">Password</label>
            <input type="password"   class="form-control"name="password_1">
        </div>
        <div class="form-group">
            <label for="password_2">Confirm Password</label>
            <input type="password"  class="form-control" name="password_2">
        </div>
        <div class="form-group">
            <label for="prefix">Prefix</label>
            <input type="text"  class="form-control" name="prefix">
        </div>
        <div class="form-group">
            <button type="submit"   name="reg_user" class="btn btn-primary btn-sm">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
  </div>
</div>
    </div>
    <div class="col-sm-3">

    </div>
  </div>
</div>








    
<!-- JS, Popper.js, and jQuery -->
<script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="../node_modules/popper.js/dist/popper.min.js" ></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" ></script>


</body>
</html>