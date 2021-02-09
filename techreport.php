<?php
session_start();
include ('scripts/queries_a.php');
$assobj= new AssetQuery;
$locat = $_SESSION['TLab'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Technician Reports</title>
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
          <h6><a href="">VIEW</a></h6>
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
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">




                <!-- Simple Overview for raport -->
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Report Overview</a>
                    </li>
                  </ul>

                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Assets</small>
                            <h5 class="mr-2 mb-0"><center><?php echo $assobj->count_assets($locat); ?></center></h5>
                          </div>
                        </div>


                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Active assets</small>
                            <h5 class="mr-2 mb-0"><center><?php echo $assobj->count_active($locat); ?></center></h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Inactive Assets</small>
                            <h5 class="mr-2 mb-0"><center><?php echo $assobj->count_inactive($locat); ?></center></h5>
                          </div>
                        </div>



                  <div class="table-responsive"><br><br>
                    <h3 class="card-title">Active assets</h3>
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                          <th>Status</th>
                          <th>Condition</th>
                          <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                      </thead>

                      <?php
                      $stmt= $assobj->readAssetIsActive($locat);
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
                          <td><?php echo $row['a_status'];?></td>
                          <td><?php echo $row['a_condition'];?></td>
                          <td></td>
                          <td><a class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn" href="update.php?UID=<?php echo $row['a_id'];?>&uasset">Update</a></td>
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="techreport.php?DID=<?php echo $row['a_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table><br><br>


                    <h3 class="card-title">Inactive assets</h3>
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                          <th>Status</th>
                          <th>Condition</th>
                          <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                      </thead>

                      <?php
                      $stmt= $assobj->readAssetIsInactive($locat);
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
                          <td><?php echo $row['a_status'];?></td>
                          <td><?php echo $row['a_condition'];?></td>
                          <td></td>
                          <td><a class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn" href="update.php?UID=<?php echo $row['a_id'];?>&uasset">Update</a></td>
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="techreport.php?DID=<?php echo $row['a_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>



                  </div>













          <!---####---->
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Assets | <a href="techreport.php?Good&condition">Good</a> | <a href="techreport.php?Bad&condition">Bad</a></h4>
                <?php if(isset($_GET['condition']) ) { ?>
                  <div class="table-responsive">
                    <table class="table bordered table-dark">
                      <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                        </tr>
                      </thead>

                      <?php
                      if(isset($_GET['Good'])) {
                        $stmt= $assobj->read_good_cond_asset($locat);
                      } if(isset($_GET['Bad'])){
                        $stmt= $assobj->read_bad_cond_asset($locat);
                      }

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
                        </tr>
                      <?php } ?>
                      </tbody>

                      <tfoot>
                        <tr>
                          <td colspan="5"><center><button class="txt-center btn btn-warning btn-rounded btn-fw">Print Report</button></center></td>
                        </tr>
                      </tfoot>

                    </table>
                  </div>
                <?php } ?>
                </div>




              <div class="card-body">
                <h4 class="card-title">All assets | <a href="techreport.php?Active&status">Active</a> | <a href="techreport.php?Inactive&status">Inactive</a></h4>

                <?php if(isset($_GET['status']) ) { ?>
                  <div class="table-responsive">
                    <table class="table bordered table-dark">
                      <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                        </tr>
                      </thead>

                      <?php
                    
                      if(isset($_GET['Active']) ) {
                        $stmt= $assobj->readAssetIsActive($locat);
                      } if(isset($_GET['Inactive'])){
                        $stmt= $assobj->readAssetIsInactive($locat);
                      }

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
                        </tr>
                      <?php } ?>
                      </tbody>

                      <tfoot>
                        <tr>
                          <td colspan="5"><center><button class="txt-center btn btn-success btn-rounded btn-fw">Print Report</button></center></td>
                        </tr>
                      </tfoot>

                    </table>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
            <!---####---->












                </div>





                      </div>
                    </div>
                  </div>
                </div>
















              </div>
            </div>
        </div>

        <?php
          if(isset($_GET['DID'])){
            if($delete=$assobj->deleteAsset($_GET['DID'])=='1'){
              echo "<script>alert('Not deleted!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
            }else{
              echo "<script>alert('Deleted successfully!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
            }
          }
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
