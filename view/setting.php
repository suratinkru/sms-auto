<?php
session_start();


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: ../login.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

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
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

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
                float: left !important;
            }
        }

        .table thead th {
         vertical-align: bottom;
         border-bottom: 2px solid #364c61;
         }

         .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #ffffff;
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
                <a class="float-right"> Welcome <?php echo $_SESSION['username']; ?></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="index.php?logout='1'" class="float-right" style="color: red;"> Logout</a>
            <?php endif ?>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>


    <div class="container">


        <div class="row">
            <div class="col-md-12 py-3">
                <div class=" p-3" style="background-color: #bee5eb!important; font-family: fantasy;">
                    <h5 class="text-center">SETING ENPOIT WEBHOOK</h5>
                </div>

                <hr>
            </div>
        </div>


        <h1>เพิ่ม Enpoint Webhook</h1>
        <form action="../controller/login_db.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
    
        <div class="form-group ">
            <button type="submit" name="login_user"class="btn btn-primary btn-sm">เพิ่ม</button>
        </div>
    
    </form>



        <!-- //table -->

        <div class="table-responsive">
            <table class="table border">
                <caption>List of users</caption>
                <thead class="" style="background-color: #bee5eb!important;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">EnpoitName</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>


    <!-- JS, Popper.js, and jQuery -->
    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>


</body>

</html>