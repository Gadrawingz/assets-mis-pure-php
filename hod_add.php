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

      <?php include('scripts/nav_admin.php'); ?>

      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
















            <!-- Block Xa -->
            <?php if(isset($_GET['labnew'])) { 

              if(isset($_POST['save_lab'])) {
                if($obj->addLab($_POST['lab_name'], $_POST['labdesc'])==1) {

                echo "<script>alert('NEW LAB IS NOT ADDED!')</script>";
                echo "<script>window.location='hod_add.php?labnew'</script>";
              } else {
                echo "<script>alert('LAB IS ADDED!')</script>";
                echo "<script>window.location='hod_add.php?labnew'</script>";
              }
            }

            ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register new Lab</h4>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lab Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lab_name" placeholder="Lab name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lab description</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="labdesc" placeholder="Lab description" />
                          </div>
                        </div>
                      </div>

                    </div>

                    <button type="submit" class="btn btn-primary mb-2" name="save_lab">Add</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- Block X -->











            <!-- Block T -->
            <?php if(isset($_GET['technew'])) { 

              if(isset($_POST['save_tech'])) {
                if($obj->addUser($_POST['u_names'], $_POST['u_username'], $_POST['u_phone'], $_POST['u_email'], $_POST['u_pass'], $_POST['lab'])==1) {

                echo "<script>alert('NEW TECH IS NOT ADDED!')</script>";
                echo "<script>window.location='hod_add.php?technew'</script>";
              } else {
                echo "<script>alert('TECHNICIAN IS ADDED!')</script>";
                echo "<script>window.location='hod_add.php?technew'</script>";
              }
            }

            ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register new technician</h4>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tech Names</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="u_names" placeholder="Technician name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="u_username" placeholder="Username" />
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="u_phone" placeholder="Phone Number" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email address</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="u_email" placeholder="Email address" />
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" name="u_pass" placeholder="Password" />
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Assign Lab</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="selectFrom" name="lab">
                              <?php
                              $stmt= $obj->readLabs();
                              while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) { 
                              ?>

                              <option value="<?php echo $row['lab_id'];?>"><?php echo $row['lab_name']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>


                    <button type="submit" class="btn btn-primary mb-2" name="save_tech">Save</button>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- Block T-->
























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
