<?php
session_start();
include ('scripts/queries_a.php');
$obj= new AssetQuery;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Update Data</title>
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

        <?php include('scripts/nav_menus.php'); ?>


      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">












            <?php
            // Update assets
            if(isset($_GET['uasset'])) {

              if(isset($_POST['updsave'])) {
                if($obj->updateAsset($_POST['aname'], $_POST['acode'], $_POST['atype'], $_POST['a_model'], $_GET['UID'])=='1') {
                 echo "<script>alert('ASSET IS NOT UPDATED!')</script>";
                  echo "<script>window.location='view_assets.php?a'</script>";                  
                  } else {
                    echo "<script>alert('ASSET UPDATED!')</script>";
                  echo "<script>window.location='view_assets.php?a'</script>";
                  
                }
              }

              $st = $obj->readOneAsset($_GET['UID']);
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
                      <label for="exampleInputDate">Asset Model</label>
                      <input type="text" class="form-control" id="exampleInputDate" value="<?php echo $row['a_model'];?>" name="a_model">
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-4" name="updsave">Save</button>
                    <button class="btn btn-danger">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- Block1 X -->





            <?php
            // Update assets
            if(isset($_GET['UUID'])) {

              if(isset($_POST['update2'])) {
                if($obj->updateUser($_POST['unames'], $_POST['u_username'], $_POST['u_phone'], $_POST['u_email'], $_POST['upass'], $_GET['UUID'])) {

                 echo "<script>alert('USER IS NOT UPDATED!')</script>";
                  echo "<script>window.location='profile.php'</script>";                  
                  } else {
                    echo "<script>alert('USER UPDATED!')</script>";
                    echo "<script>window.location='profile.php'</script>";
                  
                }
              }

              $st2 = $obj->readOneUser($_GET['UUID']);
              $row2 = $st2->FETCH(PDO::FETCH_ASSOC);
            ?>
            <!-- Block1 -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update User</h4>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputNames">Full Names</label>
                      <input type="text" class="form-control" id="exampleInputNames" value="<?php echo $row2['u_names'];?>" name="unames">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUn">Username</label>
                      <input type="text" class="form-control" id="exampleInputUn" name="u_username" value="<?php echo $row2['u_username'];?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputP">Phone Number</label>
                      <input type="text" class="form-control" id="exampleInputP" value="<?php echo $row2['u_phone'];?>" name="u_phone">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUe">Email Address</label>
                      <input type="text" class="form-control" id="exampleInputUe" value="<?php echo $row2['u_email'];?>" name="u_email">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPw">Password</label>
                      <input type="password" class="form-control" id="exampleInputPw" value="<?php echo $row2['u_password'];?>" name="upass">
                    </div>

                    <button type="submit" class="btn btn-primary mr-4" name="update2">Update</button>
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
