<?php

include ('scripts/queries_a.php');
$obj= new AssetQuery;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HoD Dashboard</title>
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
          <h6>Home</h6>
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
              <span class="nav-profile-name">Welcome HOD</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                View profile
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
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
      <!-- -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reg-asset" aria-expanded="false" aria-controls="reg-asset">
              <i class="mdi mdi-bookmark-plus-outline menu-icon"></i>
              <span class="menu-title">Register Asset</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reg-asset">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="addnew.php?add_ele_asset">Electronic Assets </a></li>
                <li class="nav-item"> <a class="nav-link" href="addnew.php?add_nonel_asset">Non-Electronic</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_assets.php">
              <i class="mdi mdi-receipt menu-icon"></i>
              <span class="menu-title">View assets</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-folder-move menu-icon"></i>
              <span class="menu-title">Transfer asset</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
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
          <div class="row">



















            <?php
            // Update assets
            if(isset($_GET['uasset'])) {

              if(isset($_POST['updsave'])) {
                if($obj->updateAsset($_POST['aname'], $_POST['acode'], $_POST['atype'], $_POST['dep_date'], $_GET['UID'])=='1') {
                 echo "<script>alert('ASSET IS NOT UPDATED!')</script>";
                  echo "<script>window.location='view_assets.php'</script>";                  
                  } else {
                    echo "<script>alert('ASSET UPDATED!')</script>";
                  echo "<script>window.location='view_assets.php'</script>";
                  
                }
              }

              $st = $obj->readAssetById($_GET['UID']);
              $row = $st->FETCH(PDO::FETCH_ASSOC);
            ?>
            <!-- Block1 -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Assets</h4>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName">Asset name</label>
                      <input type="text" class="form-control" id="exampleInputName" value="<?php echo $row['a_name'];?>" name="aname">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCode">Asset Code</label>
                      <input type="text" class="form-control" id="exampleInputCode" name="acode" value="<?php echo $row['a_code'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputAtype">Asset Type</label>
                      <input type="text" class="form-control" id="exampleInputAtype" value="<?php echo $row['a_type'];?>" name="atype">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputDate">Depreciation Date</label>
                      <input type="text" class="form-control" id="exampleInputDate" value="<?php echo $row['a_depreciation'];?>" name="dep_date">
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-4" name="updsave">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- Block1 X -->




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
