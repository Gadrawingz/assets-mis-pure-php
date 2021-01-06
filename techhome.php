<?php
include ('scripts/queries_a.php');
$obj= new AssetQuery;
session_start();

if(!isset($_SESSION['TUser'])) {
  header("techhome.php");
} else {
  header("index.php?logintech");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Technician Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <h6><a href="techhome.php">Home</a></h6>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <h3>Asset Management Information System</h3>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION['TUser']; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                View profile
              </a>
              <a class="dropdown-item" href="techhome.php?logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>

        <?php
        if(isset($_GET['logout'])) {
          session_destroy();
          header("Location:index.php?loginhod");
        }
        ?>

            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">


          <li class="nav-item">
            <a class="nav-link" href="addnew.php">
              <i class="mdi mdi-bookmark-plus-outline menu-icon"></i>
              <span class="menu-title">Register Asset</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="view_assets.php">
              <i class="mdi mdi-receipt menu-icon"></i>
              <span class="menu-title">View assets</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="techhome.php?transfer">
              <i class="mdi mdi-folder-move menu-icon"></i>
              <span class="menu-title">Transfer asset</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="mdi mdi-library-books menu-icon"></i>
              <span class="menu-title">Assets Reports</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editprofile" aria-expanded="false" aria-controls="editprofile">
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              <span class="menu-title">Update profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editprofile">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Edit profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Change Password</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>





      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
        
        <!--DONNEKT ON IT-->
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Welcome,</h2>
                    <p class="mb-md-0">This homepage is for lab technician only.</p>
                  </div>

                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>

                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">


<!--                       <div class="d-flex flex-wrap justify-content-xl-between">
                        
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 1</small>
                            <h5 class="mr-2 mb-0">59 Assets</h5>
                          </div>
                        </div>


                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 2</small>
                            <h5 class="mr-2 mb-0">400 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 3</small>
                            <h5 class="mr-2 mb-0">300 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 4</small>
                            <h5 class="mr-2 mb-0">342 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 5</small>
                            <h5 class="mr-2 mb-0">349 assets</h5>
                          </div>
                        </div>

                      </div> -->











             <?php
            // Transfer
            if(isset($_GET['transfer'])) {

              if(isset($_POST['transbtn'])) {
                if($obj->transferAsset($_POST['a_id'], $_POST['transfer_to'])) {
              
                echo "<script>alert('ASSET IS NOT TRANSFERED!')</script>";
                echo "<script>window.location='techhome.php'</script>";
              } else {
                echo "<script>alert('ASSET IS TRANSFERED!')</script>";
                echo "<script>window.location='techhome.php'</script>";
                       
              }
              }
/*
              $st = $obj->readAssetById($_GET['UID']);
              $row = $st->FETCH(PDO::FETCH_ASSOC);*/
            ?>
            <!-- Block1 -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transfer Assets</h4>

                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="selectFrom">Asset Name: </label>
                      <select class="form-control" id="selectFrom" name="a_id">
                      <?php
                      $stmt= $obj->readAsset();
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) { 
                      ?>
                        <option value="<?php echo $row['a_id'];?>"><?php echo $row['a_name'];?></option>
                      <?php } ?>
                      </select>
                    </div>
      
                    <div class="form-group">
                      <label for="selectTo">Transfer to:</label>

                      <select class="form-control" id="selectFrom" name="transfer_to">
                      <?php
                      $stmt2= $obj->readLabs();
                      while($torow= $stmt2->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
                        <option value="<?php echo $torow['lab_id'];?>"><?php echo $torow['lab_name'];?></option>
                      <?php } ?>
                      </select>

                    </div>            
                    <button type="submit" class="btn btn-primary mr-4" name="transbtn">Transfer</button>
                    <button class="btn btn-danger">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>













                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>





        <!-- Footer -->
        <?php include ('scripts/footer.php'); ?>

      </div>
      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
