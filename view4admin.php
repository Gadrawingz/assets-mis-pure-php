<?php
session_start();
include ('scripts/queries_a.php');
$assobj= new AssetQuery;
$locat = $_SESSION['Admin'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Assets accordingly</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/newstyles.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <h6><a href="">VIEW</a></h6>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        
        <?php include('scripts/nav_admin.php'); ?>




      <?php if(isset($_GET['hod_a'])) { ?>
      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All assets</h4>
                  <div class="table-responsive">
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                          <th class="availability-th">Availability</th>
                          <th>Status</th>
                          <th>Condition</th>
                          
                        </tr>
                      </thead>

                      <?php
                      $stmt= $assobj->readAsset();
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row['a_id'];?></td>
                          <td><?php echo $row['a_name'];?></td>
                          <td><?php echo $row['a_code'];?></td>
                          <td>
                            <?php
                            $stmt7= $assobj->readOneAType($row['a_type']);
                            $row7= $stmt7->FETCH(PDO::FETCH_ASSOC);
                            echo $row7['cat_type'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $stmt8= $assobj->readOneModel($row['a_model']);
                            $row8= $stmt8->FETCH(PDO::FETCH_ASSOC);
                            echo $row8['m_name'];
                            ?>
                          </td> 

                          <td class="availability-td">
                            <?php
                            $st0= $assobj->readOneAsset($row['a_id']);
                            $row0= $st0->FETCH(PDO::FETCH_ASSOC);
                            if($assobj->check4_availability($row0['a_id'])>='1') {
                              echo "Borrowed";
                            } else {
                              echo "Available";
                            }
                            ?>
                          </td>

                          <td><?php echo $row['a_status'];?></td>
                          <td><?php echo $row['a_condition'];?></td>
                          <td></td>
                         
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <?php } ?>















      <?php if(isset($_GET['labinfo'])) { ?>
      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All information about
				<?php 
				
				$st3= $assobj->read_lab_ch_id($_GET['labinfo']);
                $row0= $st3->FETCH(PDO::FETCH_ASSOC);
				echo "<span style='color:orange;'>".$row0['lab_name']."</span>"; 
				?></h4>
                  <div class="table-responsive">
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                          <th>Location</th>
                          <th class="availability-th">Availability</th>
                          <th>Status</th>
                          <th>Condition</th>
                        </tr>
                      </thead>

                      <?php
                      $stmt= $assobj->readAssetLoc($_GET['labinfo']);
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row['a_id'];?></td>
                          <td><?php echo $row['a_name'];?></td>
                          <td><?php echo $row['a_code'];?></td>

                          <td>
                            <?php
                            $stmt7= $assobj->readOneAType($row['a_type']);
                            $row7= $stmt7->FETCH(PDO::FETCH_ASSOC);
                            echo $row7['cat_type'];
                            ?>
                          </td>
                          <td>
                            <?php
                            $stmt8= $assobj->readOneModel($row['a_model']);
                            $row8= $stmt8->FETCH(PDO::FETCH_ASSOC);
                            echo $row8['m_name'];
                            ?>
                          </td>
                          <td>Lab #<?php echo $row['a_location']; ?></td>
                          <td class="availability-td">
                            <?php
                            $st0= $assobj->readOneAsset($row['a_id']);
                            $row0= $st0->FETCH(PDO::FETCH_ASSOC);
                            if($assobj->check4_availability($row0['a_id'])>='1') {
                              echo "Borrowed";
                            } else {
                              echo "Available";
                            }
                            ?>

                            </td>                         
                          <td><?php echo $row['a_status'];?></td>
                          <td><?php echo $row['a_condition'];?></td>
                          <td></td>

                        </tr>
                      <?php } ?>
                        <?php
                        if($assobj->count_asset_byloc($_GET['labinfo'])<=0) {
                          echo "<tbody><tr>
                          <td colspan='11' style='color: red;'><center>No record found!</center></td></tr></tbody>";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <?php } ?>














      <?php if(isset($_GET['alltch'])) { ?>
      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All Lab Technicians</h4>
                  <div class="table-responsive pt-3">
                    <table class="table bordered table-dark">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Names</th>
                          <th>Username</th>
                          <th>Phone</th>
                          <th>Email address</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <?php
                      $obj= new AssetQuery;
                      $stmt2= $assobj->readUsers();
                      while($row2= $stmt2->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row2['u_id'];?></td>
                          <td><?php echo $row2['u_names'];?></td>
                          <td><?php echo $row2['u_username'];?></td>
                          <td><?php echo $row2['u_phone'];?></td>
                          <td><?php echo $row2['u_email'];?></td>
                          <td><?php echo $row2['u_password'];?></td>                          
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="view4admin.php?alltch&DDID=<?php echo $row2['u_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <?php
          if(isset($_GET['DDID'])){
            if($assobj->deleteUser($_GET['DDID'])=='1'){
              echo "<script>alert('Not deleted!')</script>";
              echo "<script>window.location='view4admin.php?alltch'</script>";
            }else{
              echo "<script>alert('Deleted successfully!')</script>";
              echo "<script>window.location='view4admin.php?alltch'</script>";
            }
          }

        } // end for getfx
        ?>













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
