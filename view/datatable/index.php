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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />


    <title>gateway</title>
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
  <a href="../../index.php" class="">Home</a>
  <a href="#" class="">Datatable</a>
  <a href="../setting.php" class="">Settings</a>
      <!-- logged in user information -->
      <?php if (isset($_SESSION['username'])) : ?>
     
          <a href="index.php?logout='1'" class="float-right border" style="color: red;">  Logout</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
          <a class="float-right">  Welcome <?php echo $_SESSION['username']; ?></a> 
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
                   <h5 class="text-center">DATATABLE GATEWAY</h5>
                </div>
              
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 border py-5 shadow-sm p-3 mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                    <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap border table-hover" id="records" style="width:100%">
                                <thead class="table-info">
                                    <tr >
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Pkg</th>
                                        <th>Title</th>
                                        <th>Text</th>
                                        <th>Subtext</th>
                                        <th>Bigtext</th>
                                        <th>Infotext</th>
                                        <th>Created_at</th>
                                        <th>Chectdate</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

    <script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
    </script>

    <script>
    // Fetch records

    function fetch(start_date, end_date) {
        $.ajax({
            url: "records.php",
            type: "POST",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            dataType: "json",
            success: function(data) {
                // Datatables
                var i = "1";

                $('#records').DataTable({
                    "data": data,
                    // buttons
                    "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    "buttons": [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    // responsive
                    "responsive": true,
                    "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                        {
                            "data": "name"
                        },
                        {
                            "data": "pkg"
                        },
                        {
                            "data": "title"
                        },
                        {
                            "data": "text"
                        },
                        {
                            "data": "subtext"
                        },
                        {
                            "data": "bigtext"
                        },
                        {
                            "data": "infotext"
                        },
                        {
                            "data": "created_at"
                        },
                        {
                            "data": "checkdate",
                            // "render": function(data, type, row, meta) {
                            //     return moment(row.created_at).format('DD-MM-YYYY');
                            // }
                        },
                        // {
                        //     "data": "standard",
                        //     // "render": function(data, type, row, meta) {
                        //     //     return `${row.standard}th Standard`;
                        //     // }
                        // },
                        // {
                        //     "data": "percentage",
                        //     // "render": function(data, type, row, meta) {
                        //     //     return `${row.percentage}%`;
                        //     // }
                        // },
                        // {
                        //     "data": "result"
                        // },
                        // {
                        //     "data": "created_at",
                        //     "render": function(data, type, row, meta) {
                        //         return moment(row.created_at).format('DD-MM-YYYY');
                        //     }
                        // }
                    ]
                });
            }
        });
    }
    fetch();

    // Filter

    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        if (start_date == "" || end_date == "") {
            alert("both date required");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });

    // Reset

    $(document).on("click", "#reset", function(e) {
        e.preventDefault();

        $("#start_date").val(''); // empty value
        $("#end_date").val('');

        $('#records').DataTable().destroy();
        fetch();
    });
    </script>


</body>

</html>