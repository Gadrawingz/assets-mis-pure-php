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
  <title>Welcome To Asset Management System</title>
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
          <h6><a href="hodhome.php">Home</a></h6>
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


        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
            <div class="nav-link" href="index.php?login">
              <span class="menu-title">&nbsp;&darr;&nbsp;</span>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="index.php?login">
              <i class="mdi mdi-laptop menu-icon"></i>
              <span class="menu-title">System Login</span>
            </a>
          </li>

          <li class="nav-item">
            <div class="nav-link" href="index.php?login">
              <span class="menu-title">&nbsp;&uarr;&nbsp;</span>
            </div>
          </li>

        </ul>
      </nav>



      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
		
		
		
		
				<?php if(isset($_GET['login'])) { 

          if(isset($_POST['btnlogin'])) {
            $stmt = $obj->userLogin($_POST['u_email'], $_POST['u_pass']);
            $row = $stmt->FETCH(PDO::FETCH_ASSOC);


            if($_POST['u_email']==$row['u_email'] && $_POST['u_pass']==$row['u_password'] && $row['user_type']=='Admin') {
                $_SESSION['Admin'] = $row['u_names'];
                $_SESSION['u_id'] = $row['u_id'];
                header("Location: hodhome.php?welcome");
              } else {
              echo "<script>alert('USERNAME AND PASSWORD ARE NOT MATCHING')</script>";

              //echo "<script>window.location='index.php?login'</script>";       
            }


            if($_POST['u_email']==$row['u_email'] && $_POST['u_pass']==$row['u_password'] && $row['user_type']=='LabTech') {
                // Checking labx
                $stmt5 = $obj->readOneLab($row['u_id']);
                $row5 = $stmt5->FETCH(PDO::FETCH_ASSOC);

                $_SESSION['TUser'] = $row['u_names'];
                $_SESSION['u_id'] = $row['u_id'];
                $_SESSION['TLab'] = $row5['user_for'];
                header("Location: techhome.php?welcome");
              } else {
              echo "<script>alert('USERNAME AND PASSWORD ARE NOT MATCHING')</script>";
              //echo "<script>window.location='index.php?login'</script>";       
            }

          }

        ?>
        
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h2>Login for all users </h2>
              </div>


                <form class="pt-3" method="POST">
                    <div class="form-group row">
                        <label for="exampleInputUsername" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputUsername" placeholder="Email address" name="u_email"required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="u_pass"required>
                      </div>
                    </div>
                    
                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="btnlogin">LOG IN</button>
                    </div>

                    <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          Keep me signed in
                        </label>
                      </div>
					  <?php if($obj->countAdmins() < 1) { ?>
                      <a href="add_admin.php" class="auth-link text-black">Create account</a>
					  <?php } else { ?>
					  <a href="forgotpass.php" class="auth-link text-black">Forgot password</a>
					  <?php } ?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
		    <?php } ?>
		
		
	

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
