<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Asset Management Information System</title>
  <!-- plugins:css -->

  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href=" vendors/base/vendor.bundle.base.css">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

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
                <h2>Asset Management System</h2>
              </div>

              <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <h4 class="font-text-light">Sign in to system</h4>
                  </div>
                  <a href="superlogin.php" class="auth-link text-blue">HOD Login</a>
                </div>

              <form class="pt-3">

              	<form class="forms-sample">
                    <div class="form-group row">
                        <label for="exampleInputEmail" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail" placeholder="Email">
                      </div>
                    </div>

                    <div class="form-group row">
                    	<label for="exampleFormControlSelect" class="col-sm-3 col-form-label">Select Lab</label>
                    	<div class="col-sm-9">
                    	<select class="form-control form-control" id="exampleFormControlSelect">
                    		<option>Lab 1</option>
                    		<option>Lab 2</option>
                    		<option>Lab 3</option>
                    	</select>
                    </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                      </div>
                    </div>
                    
                     <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOG IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="forgotpass.php" class="auth-link text-black">Forgot password?</a>
                </div>
                  </form>

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