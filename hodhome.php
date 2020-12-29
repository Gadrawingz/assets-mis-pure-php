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

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">Loggedin as HOD</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                View profile
              </a>
              <a class="dropdown-item" href="superlogin.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          
          <li class="nav-item">
            <a class="nav-link" href="hod_add.php?addlab">
              <i class="mdi mdi-laptop menu-icon"></i>
              <span class="menu-title">Register New Lab</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="hod_add.php">
              <i class="mdi mdi-account-check menu-icon"></i>
              <span class="menu-title">Register Lab.Tech</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="view_assets.php">
              <i class="mdi mdi-table-column-plus-before menu-icon"></i>
              <span class="menu-title">View all assets</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editprofile" aria-expanded="false" aria-controls="editprofile">
              <i class="mdi mdi-book-multiple-variant menu-icon"></i>
              <span class="menu-title">View Labs info</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editprofile">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="hod_view.php">Lab 1</a></li>
                <li class="nav-item"> <a class="nav-link" href="hod_view.php">Lab 2</a></li>
                <li class="nav-item"> <a class="nav-link" href="hod_view.php">Lab 3</a></li>
                <li class="nav-item"> <a class="nav-link" href="hod_view.php">Lab 4</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="hod_reports.php">
              <i class="mdi mdi-library-books menu-icon"></i>
              <span class="menu-title">Received Reports</span>
            </a>
          </li>
        </ul>
          
      </nav>





      <!-- Container -->
      <div class="main-panel">        
        <div class="content-wrapper">
        
        <!--DONNEKT ON IT-->
        <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>Welcome back,</h2>
                    <p class="mb-md-0">In this dashboard you control info from labs</p>
                  </div>

                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                  </ul>

                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 1</small>
                            <h5 class="mr-2 mb-0">59 Assets</h5>
                          </div>
                        </div>


                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 2</small>
                            <h5 class="mr-2 mb-0">400 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 3</small>
                            <h5 class="mr-2 mb-0">300 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 4</small>
                            <h5 class="mr-2 mb-0">342 assets</h5>
                          </div>
                        </div>

                        <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-laptop-windows mr-3 icon-lg text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">LAB 5</small>
                            <h5 class="mr-2 mb-0">349 assets</h5>
                          </div>
                        </div>

                      </div>
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