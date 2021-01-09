<?php
session_start();
include ('scripts/queries_a.php');
$obj = new AssetQuery;
$uid = $_SESSION['u_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Profile</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
        <div class="row w-100">

          <div class="col-12 grid-margin">
            <div class="auth-form-transparent text-left p-5 text-center">
              <img src="images/faces/face9.jpg" class="lock-profile-img" alt="img">
              <form class="pt-5">
                <h2 class="text-warning">User profile</h2><br><hr>

                      <?php                
                      $obj= new AssetQuery;
                      $stmt2= $obj->readOneUser($uid);
                      $row2= $stmt2->FETCH(PDO::FETCH_ASSOC); 
                      ?>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Names</label>
                          <div class="col-sm-9">
                            <div><?php echo $row2['u_names'];?></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <div><?php echo $row2['u_username'];?></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone</label>
                          <div class="col-sm-9">
                            <div><?php echo $row2['u_phone'];?></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email address</label>
                          <div class="col-sm-9">
                            <div><?php echo $row2['u_email'];?></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <a class="btn btn-block btn-success btn-lg font-weight-medium" href="update.php?uuser&UUID=<?php echo $uid;?>">Update</a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <a class="btn btn-block btn-danger btn-lg font-weight-medium" href="techhome.php">Back home</a>
                        </div>
                      </div>
                    </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
