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



    <!-- Nav Menus -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <?php if(isset($_GET['transfer'])) { ?>
            <h6><a href="techhome.php">Transfer Asset</a></h6>
          <?php } else { ?>
          <h6><a href="techhome.php">Home</a></h6>
          <?php } ?>
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
          <br><hr><br>
  






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

            ?>

            <!-- Block1 -->
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">

                  <h2 class="card-title">Transfer asset</h2>
                  <form class="form-sample" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Asset Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="selectFrom" name="a_id">
                              <?php
                              $stmt= $obj->readAsset();
                              while($row= $stmt->FETCH(PDO::FETCH_ASSOC)) { 
                              ?>
                              <option value="<?php echo $row['a_id'];?>"><?php echo $row['a_name'];?></option>
                            <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Transfer to: </label>
                          <div class="col-sm-9">
                      <select class="form-control" id="selectFrom" name="transfer_to">
                      <?php
                      $stmt2= $obj->readLabs();
                      while($torow= $stmt2->FETCH(PDO::FETCH_ASSOC)){ 
                      ?>
                        <option value="<?php echo $torow['lab_id'];?>"><?php echo $torow['lab_name'];?></option>
                      <?php } ?>
                      </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mr-4" name="transbtn">Transfer</button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <a href="view_assets.php?a" class="btn btn-success mr-8">View After</a>
                          </div>
                        </div>
                      </div>
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
