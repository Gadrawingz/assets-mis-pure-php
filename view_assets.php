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
        
        <?php include('scripts/nav_menus.php'); ?>



      <?php if(isset($_GET['a'])) { ?>
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
                          <th>Id</th>
                          <th>Asset Name</th>
                          <th>Asset Code</th>
                          <th>Asset Type</th>
                          <th>Asset Model</th>
                          <th>Status</th>
                          <th>Condition</th>
                          <th class="availability-th">Availability</th>
                          <th colspan="2" style="text-align: center;">Action</th>
                        </tr>
                      </thead>

                      <?php
                      $stmt= $assobj->readAssetLoc($locat);
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
                          <td><a class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn" href="update.php?UID=<?php echo $row['a_id'];?>&uasset">Update</a></td>
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="view_assets.php?DID=<?php echo $row['a_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
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
		  
		  
		  


        } // end for getfx
        ?>







      <?php if(isset($_GET['vborrow'])) { ?>
      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All borrowed assets</h4>
                  <div class="table-responsive">
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Asset Name</th>
                          <th>Asset From:</th>
                          <th>Borrowed to</th>
						  <th>BorrowStatus</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <?php
                      $stmt= $assobj->readBorrowedAssets($locat);
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row['bor_id'];?></td>
                          <td>
                            <?php
                            $astmt= $assobj->readOneAsset($row['asset_id']);
                            $arow= $astmt->FETCH(PDO::FETCH_ASSOC);
                            echo $arow['a_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $bstmt= $assobj->read_lab_ch_id($row['bor_from']);
                            $brow= $bstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $brow['lab_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $btstmt= $assobj->read_lab_ch_id($row['bor_to']);
                            $btrow= $btstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $btrow['lab_name'];
                            ?>
                          </td>
						  <td><?php if($row['is_returned']=='0') {
							  echo "<span style='color: red;'>Not returned</span>";
						  }?></td>
                          <td><?php echo $row['bor_date'];?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table><br><hr><br>

		
                <h4 class="card-title">All assets(from other labs)</h4>
                  <div class="table-responsive">
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Asset Name</th>
                          <th>Asset From:</th>
                          <th>Borrowed to</th>
                          <th>Date</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $stmt= $assobj->read_received_assets($locat);
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row['bor_id'];?></td>
                          <td>
                            <?php
                            $astmt= $assobj->readOneAsset($row['asset_id']);
                            $arow= $astmt->FETCH(PDO::FETCH_ASSOC);
                            echo $arow['a_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $bstmt= $assobj->read_lab_ch_id($row['bor_from']);
                            $brow= $bstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $brow['lab_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $btstmt= $assobj->read_lab_ch_id($row['bor_to']);
                            $btrow= $btstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $btrow['lab_name'];
                            ?>
                          </td>
                          <td><?php echo $row['bor_date'];?></td>
						  <td>
						  <?php if($row['is_returned']=='0') { ?>
							  <a href="view_assets.php?vborrow&bback=<?php echo $row['bor_id'];?>" class="btn btn-block btn-primary btn-sm">Bring back</a>
						  <?php } 
						  
						  if(isset($_GET['bback'])) {
							$assobj->return_asset($_GET['bback']);
							echo "<script>alert('You borrowed back item!')</script>";
							echo "<script>window.location='view_assets.php?vborrow'</script>";
						  }
						  ?>
						  </td>						  
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
          if(isset($_GET['DID'])){
            if($delete=$assobj->deleteAsset($_GET['DID'])=='1'){
              echo "<script>alert('Not deleted!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
            }else{
              echo "<script>alert('Deleted successfully!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
            }
          }
        } // end for getfx
        ?>

		




		
		

		
		
      <?php if(isset($_GET['vtrans'])) { ?>
      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">All transfered assets</h4>
                  <div class="table-responsive">
                    <table class="table bordered table-striped">
                      <thead>
                        <tr>
                          <th>Asset ID</th>
                          <th>Asset Name</th>
                          <th>Asset From:</th>
                          <th>transfered to</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <?php
                      $stmt= $assobj->readTransferredAssets($locat);
                      while($row= $stmt->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row['trans_id'];?></td>
                          <td>
                            <?php
                            $astmt= $assobj->readOneAsset($row['asset_id']);
                            $arow= $astmt->FETCH(PDO::FETCH_ASSOC);
                            echo $arow['a_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $bstmt= $assobj->read_lab_ch_id($row['trans_from']);
                            $brow= $bstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $brow['lab_name'];
                            ?>
                          </td>

                          <td>
                            <?php
                            $btstmt= $assobj->read_lab_ch_id($row['trans_to']);
                            $btrow= $btstmt->FETCH(PDO::FETCH_ASSOC);
                            echo $btrow['lab_name'];
                            ?>
                          </td>
                          <td><?php echo $row['trans_date'];?></td>
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
          if(isset($_GET['DID'])){
            if($delete=$assobj->deleteAsset($_GET['DID'])=='1'){
              echo "<script>alert('Not deleted!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
            }else{
              echo "<script>alert('Deleted successfully!')</script>";
              echo "<script>window.location='view_assets.php'</script>";
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
