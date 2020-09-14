<?php
session_start();

include_once('../config/server.php');

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
    <script src="https://kit.fontawesome.com/d73d3abf8d.js" crossorigin="anonymous"></script>

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
            <a href="../index.php" class="active ">GATEWAY</a>
            <a href="../index.php" class="">Home</a>
            <a href="datatable/index.php" class="">Datatable</a>
            <a href="#" class="">Settings</a>
            <!-- logged in user information -->
            <?php if (isset($_SESSION['username'])) : ?>
                <a class="float-right"> Welcome <?php echo $_SESSION['username']; ?></a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="index.php?logout='1'" class="float-right border" style="color: red;"><i class="fas fa-sign-out-alt"></i> Logout</a>
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


   
        <?php  
          if(isset($_GET['id'])){
              $id = $_GET['id'];
            
            $sql = "SELECT * FROM `url` WHERE `id` = $id ";
            $resultedit = mysqli_query($conn, $sql); 

        
              ?>

             <h1>แก้ไข Enpoint Webhook</h1>
                <form action="../controller/setting.php" method="post">
              <?php    while($rowe = mysqli_fetch_array($resultedit)) {  ?>
                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" name="url" value="<?php echo $rowe["urlname"]; ?>">
                </div>
            
                <div class="form-group ">
                    <button type="submit" name="update" id="<?php echo $rowe["id"]; ?>" class="btn btn-primary btn-sm">update</button>
                </div>

              <?php  } ?>
              
            </form>
         <?php 
          }else{
            ?>
             <h1>เพิ่ม Enpoint Webhook</h1>
                <form action="../controller/setting.php" method="post">

                <div class="form-group">
                    <label for="url">url</label>
                    <input type="text" class="form-control" name="url">
                </div>
            
                <div class="form-group ">
                    <button type="submit" name="urlname"class="btn btn-primary btn-sm">เพิ่ม</button>
                </div>
            
            </form>
            <?php 
          }
            
        ?>
       


         <?php
            //2. query ข้อมูลจากตาราง tb_member: 
            $query = "SELECT * FROM url ORDER BY id asc" or die("Error:" . mysqli_error($conn)); 
            //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
            $result = mysqli_query($conn, $query); 
            //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

            ?>
        <!-- //table -->
        <div class="table-responsive">
            <table class="table border">
                <caption>List of users</caption>
                <thead class="" style="background-color: #bee5eb!important;">           
                  <tr>
                        <th scope="col">#</th>
                        <th scope="col">EnpoitURL</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                while($row = mysqli_fetch_array($result)) {  ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]  ?></th>
                        <td><?php echo $row["urlname"]  ?></td>
                        <td><a href="setting.php?id=<?php echo $row["id"];?>" ><i class="far fa-edit"></i></button></td>
                        <td><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../controller/setting.php?id=<?php echo $row["id"];?>';}"><i class="far fa-trash-alt"></i></a></td>
                    </tr>
               
                <?php } ?>
                </tbody>
            </table>
        </div>





            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit EnpoitURL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">UPDATE</button>
                </div>
                </div>
            </div>
            </div>

    </div>


    <!-- JS, Popper.js, and jQuery -->
    <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  


    <script>
        function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    // Open modal popup
    $("#staticBackdrop").modal("show");
}
    </script>


</body>

</html>