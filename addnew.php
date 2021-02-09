<?php
session_start();

include ('scripts/queries_a.php');
$obj= new AssetQuery;
$locat = $_SESSION['TLab'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add new</title>
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


            <!-- Block Asset New -->
            <?php if(isset($_GET['assetnew'])) { 

              if(isset($_POST['save_asset'])) {
				  if($obj->validate_assettbl($_POST['asset_code'])<1) {
				  if($obj->addAsset($_POST['asset_name'], $_POST['asset_code'], $_POST['asset_type'], $_POST['model_name'], $_SESSION['TLab'], $_POST['asset_status'], $_POST['asset_condition'])==1) {
					
                echo "<script>alert('ASSET NOT ADDED!')</script>";
                echo "<script>window.location='addnew.php?assetnew'</script>";
              } else {
                echo "<script>alert('ASSET IS ADDED!')</script>";
                echo "<script>window.location='addnew.php?assetnew'</script>";
				}} else {
				echo "<script>alert('ASSET CODE HAS BEEN USED!')</script>";
                echo "<script>window.location='addnew.php?assetnew'</script>";
				}
            }

            ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Register new asset</h4>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="asset_name" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Code</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="asset_code" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Type</label>
                          <div class="col-sm-9">
                            <select name="asset_type" class="form-control" required>
                              <?php
                              $stmt5= $obj->readCategories();
                              while($row5= $stmt5->FETCH(PDO::FETCH_ASSOC)) { 
                              ?> 

                              <option value="<?php echo $row5['cat_id'];?>"><?php echo $row5['cat_type'];?></option>
                            <?php } ?>

                            </select>

                          </div>
                        </div>
                      </div>
					  
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Model</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="model_name" required>
                              <?php
                              $stmt6= $obj->readModels();
                              while($row6= $stmt6->FETCH(PDO::FETCH_ASSOC)) { 
                              ?> 

                              <option value="<?php echo $row6['m_id'];?>"><?php echo $row6['m_name'];?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Status</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="asset_status" onchange="showInactiveOptions()" required>
                              <option value="Active">Active</option>
                              <option value="Not Active">Not Active</option>
                            </select>
                          </div>
                        </div>
                      </div>


          
            
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Condition</label>
                          <div class="col-sm-9">
                            <select name="asset_condition" class="form-control">
                              
                              <script type="text/javascript">
                                /*function showInactiveOptions() {
                                  if(this.value==='Not Active') { 
                                    alert('Good');
                                  } else {
                                    alert('Nope');
                                  }
                                }*/
                              </script>
                              <option value="Bad">Bad</option>
                              <option value="Good">Good</option>
                              <option value="Repairable">Repairable</option>
                              <option value="Not Repairable">Not Repairable</option>
                            </select>
                          </div>
					
                        </div>
                      </div>
                    </div>




                    <button type="submit" class="btn btn-primary mb-2" name="save_asset">Save</button>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>
            <!-- Block asset -->














            <!-- Block Xa -->
            <?php if(isset($_GET['labnew'])) { 

              if(isset($_POST['save_lab'])) {
                if($obj->addLab($_POST['lab_name'], $_POST['labtech'])==1) {

                echo "<script>alert('NEW LAB IS NOT ADDED!')</script>";
                echo "<script>window.location='addnew.php?labnew'</script>";
              } else {
                echo "<script>alert('LAB IS ADDED!')</script>";
                echo "<script>window.location='addnew.php?labnew'</script>";
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
                            <input type="text" class="form-control" name="lab_name" placeholder="Lab name" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Assign user</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="selectFrom" name="labtech">
                              <?php
                              $stmt= $obj->readUsers();
                              while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) { 
                              ?>

                              <option value="<?php echo $row['u_id'];?>"><?php echo $row['u_names'];?></option>
                              <?php } ?>
                            </select>
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










            <!-- Block 2 -->
            <?php if(isset($_GET['modelnew'])) { 
              if(isset($_POST['save_model'])) {
				if($obj->validate_models($_POST['model_name'])<1) {
                if($obj->addModel($_POST['model_name'])==1) {

                echo "<script>alert('NEW MODEL IS NOT ADDED!')</script>";
                echo "<script>window.location='addnew.php?modelnew'</script>";
              } else {
                echo "<script>alert('MODEL IS ADDED!')</script>";
                echo "<script>window.location='addnew.php?modelnew'</script>";
				}} else {
                echo "<script>alert('THAT MODEL NAME EXISTS!')</script>";
                echo "<script>window.location='addnew.php?modelnew'</script>";				
				}
            }

            ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add new model</h4>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Model Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="model_name" placeholder="Model name" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mb-2" name="save_model">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                <h4 class="card-title">All models</h4>
                  <div class="table-responsive col-md-8">
                    <table class="table bordered table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Model Name</th>
                          <th colspan="2" style="text-align: center;" class="text-warning">Action</th>
                        </tr>
                      </thead>
                      <?php
                      $obj = new AssetQuery;
                      $stmt1= $obj->readModels();
                      while($row1= $stmt1->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row1['m_id']; ?></td>
                          <td><?php echo $row1['m_name']; ?></td>
                          <td><a class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn" href="update.php?MUID=<?php echo $row1['m_id'];?>&uasset">Update</a></td>
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="view4admin.php?hod_a&DID=<?php echo $row1['m_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
            <!-- Block 2 -->







            <!-- Block 3 -->
            <?php if(isset($_GET['catnew'])) { 
              if(isset($_POST['save_cat'])) {
				if($obj->validate_category($_POST['cat_type'])<1) {
                if($obj->addCategory($_POST['cat_type'])==1) {

                echo "<script>alert('NEW CATEGORY IS NOT ADDED!')</script>";
                echo "<script>window.location='addnew.php?catnew'</script>";
              } else {
                echo "<script>alert('CATEGORY IS ADDED!')</script>";
                echo "<script>window.location='addnew.php?catnew'</script>";
              }
            } else {
				echo "<script>alert('CATEGORY ALREADY EXISTS!')</script>";
                echo "<script>window.location='addnew.php?catnew'</script>";			
			  }}

            ?>

            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add new category</h4>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="cat_type" placeholder="Category Type" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mb-2" name="save_cat">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                <h4 class="card-title">All categories</h4>
                  <div class="table-responsive col-md-8">
                    <table class="table bordered table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th colspan="2" style="text-align: center;" class="text-warning">Action</th>
                        </tr>
                      </thead>
                      <?php
                      $obj = new AssetQuery;
                      $stmt2= $obj->readCategories();
                      while($row2= $stmt2->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
            
                      <tbody>
                        <tr>
                          <td><?php echo $row2['cat_id']; ?></td>
                          <td><?php echo $row2['cat_type']; ?></td>
                          <td><a class="btn btn-block btn-primary btn-sm font-weight-small auth-form-btn" href="update.php?CUID=<?php echo $row2['cat_id'];?>&uasset">Update</a></td>
                          <td><a class="btn btn-block btn-danger btn-sm font-weight-small auth-form-btn" href="view4admin.php?hod_a&DUID=<?php echo $row2['cat_id'];?>">Delete</a></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
            <?php } ?>
            <!-- Block 3 -->




















            <!-- Block T -->
            <?php if(isset($_GET['technew'])) { 

              if(isset($_POST['save_tech'])) {
                if($obj->addUser($_POST['u_names'], $_POST['u_username'], $_POST['u_phone'], $_POST['u_email'], $_POST['u_pass'])==1) {

                echo "<script>alert('NEW TECH IS NOT ADDED!')</script>";
                echo "<script>window.location='addnew.php?technew'</script>";
              } else {
                echo "<script>alert('TECHNICIAN IS ADDED!')</script>";
                echo "<script>window.location='addnew.php?technew'</script>";
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
<!--                           <label class="col-sm-3 col-form-label">None</label>
                          <div class="col-sm-9">
                            <input type="" name="">
                          </div> -->
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
