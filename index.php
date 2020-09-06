<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: view/login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: view/login.php');
    }

?>


<?php

    include_once('view/layouts/header.php'); 

?>
<div class="container">

  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
  <div class="row">
    <div class="col-6 col-md-4">
         <div class="card"  style="width: 20rem;" >
            <div class="card-header">
                Featured
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
       </div>
    </div>
    <div class="col-md-8">.col-md-8</div>
   
  </div>

</div>
   
    <?php

include_once('view/layouts/footer.php'); 

?>