<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #000;

  /* background-color: red; /* For browsers that do not support gradients */
  /* background-image: linear-gradient(-90deg, red, yellow);  */
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {

  color: #ffc107;
}

.topnav a.active {
  /* background-color: #4CAF50; */
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .float-right {
    float: left!important;
}
}
</style>
</head>
<body>

<div class="topnav shadow " id="myTopnav">
    <div class="container">
  <a href="#" class="active ">GATEWAY</a>
  <a href="index.php" class="">Home</a>
  <a href="view/datatable/index.php" class="">Datatable</a>
  <a href="view/setting.php" class="">Settings</a>
      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
        <a class="float-right">  Welcome <?php echo $_SESSION['username']; ?></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          <a href="index.php?logout='1'" class="float-right" style="color: red;">  Logout</a>
        <?php endif ?>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
  </div>
</div>
