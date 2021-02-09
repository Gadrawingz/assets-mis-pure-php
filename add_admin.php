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
			
              if(isset($_POST['save_admin'])) {
				if($obj->countAdmins() > 0) {
					echo "<script>alert('We cannot add more than 1 admin!')</script>";
				} else {
					$obj->regAdmin($_POST['u_names'], $_POST['u_username'], $_POST['u_phone'], $_POST['u_email'], $_POST['password'], $_POST['admin_for']);
					echo "<script>alert('ADMIN IS ADDED!')</script>";
					echo "<script>window.location='add_admin.php'</script>";
				}
			  }			  
			?>			
			  
                <form class="pt-3" method="POST">
                  <div class="form-group">
                    <label for="exampleInputNames">Admin Names</label>
                    <input type="text" class="form-control" id="exampleInputNames" placeholder="Names" name="u_names" required>
                  </div>
				  
				  <div class="form-group">
                    <label for="exampleInputUsername">Your Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="u_username" required>
                  </div>
				  

				  <div class="form-group">
                    <label for="exampleInput4ne">Your Phone</label>
                    <input type="text" class="form-control" id="exampleInput4ne" placeholder="Phone..." name="u_phone" required>
					<input type="hidden" class="form-control" name="admin_for" value="0">
                  </div>

				  <div class="form-group">
                    <label for="exampleInputEmail">Your Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email" name="u_email" required>
                  </div>

				  <div class="form-group">
                    <label for="exampleInputPassword">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password"  name="password" required>
                  </div>				  
				  
                  <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="save_admin" type="submit">Register</button>
					<a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="index.php?login">Back</a>
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