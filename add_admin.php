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
  <title>Asset Management Information System</title>

  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href=" vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-5 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h2>Register new admin!</h2>
              </div>
			  
			<?php 

			if(isset($_POST['add_admin'])) {
				if($obj->countAdmins() < 1) {	
				if($obj->regAdmin($_POST['names'], $_POST['username'], $_POST['phone'], $_POST['email'], $_POST['password'])) {
					echo "<script>alert('ADMIN IS CREATED!')</script>";
					echo "<script>window.location='index.php?login'</script>";
				} 
			} else {
          echo "<script>alert('ADMIN IS NOT CREATED!')</script>";
          echo "<script>window.location='index.php?login'</script>"; 					
				}
			}


			?>			
			  
                <form class="pt-3" method="POST">
                  <div class="form-group">
                    <label for="exampleInputNames">Your Names</label>
                    <input type="text" class="form-control" id="exampleInputNames" placeholder="Names" name="names">
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputUsername">Your Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="username">
                  </div>
				  

          <div class="form-group">
                    <label for="exampleInput4ne">Your Phone</label>
                    <input type="text" class="form-control" id="exampleInput4ne" placeholder="Phone..." name="phone">
                  </div>

				  <div class="form-group">
                    <label for="exampleInputEmail">Your Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="email">
                  </div>

				  <div class="form-group">
                    <label for="exampleInputPassword">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password"  name="password">
                  </div>				  
				  
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="add_admin" type="submit">Register</button>
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
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->

  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
</body>

</html>