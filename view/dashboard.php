
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css\css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="css\images/favicon.png" />
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="?action=showhome">WIKICODE</a>
          <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a> -->
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      
    </nav>
    <!-- partial -->
    <h1>users</h1>
    <div class="container">

      <div class="row">
        <div class="col-md-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title">users list</p>
              <div class="table-responsive">
                <table id="user-listing" class="table">
                  <thead>
                      <tr>
                          <th>user id</th>
                          <th>username</th>
                          <th>email</th>
                          <th>role</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($fadi as $user): ?>
                          <tr>
                              <td><?php echo $user['user_id']; ?></td>
                              <td><?php echo $user['username']; ?></td>
                              <td><?php echo $user['email']; ?></td>
                              <td><?php echo $user['role']; ?></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- tags$cats -->

    <div class="container d-flex gap-2">
      <!-- categories -->
      <div class=" col-6 mt-5">
                <table id="" class="table table-striped">
                  <thead>
                      <tr>
                          <th>Categories</th>
                          <th>Modify</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      var_dump($cat);
                    ?>
                      <?php foreach ($cat as $category): ?>
                          <tr>
                              <td><?php echo $category['category_name']; ?></td>
                              <td><button class="btn btn-primary">✎</button></td>
                              <td><button class="btn btn-danger text-white">X</button></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
      </div>
      <!-- tags -->
      <div class=" col-6 mt-5">
                <table id="" class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Tags</th>
                          <th>Modify</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($fadi as $user): ?>
                          <tr>
                              <td><?php echo $user['user_id']; ?></td>
                              <td><button class="btn btn-primary">✎</button></td>
                              <td><button class="btn btn-danger text-white">X</button></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
      </div>
    </div>

    


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span> -->
        </div>
        </footer>
        <!-- partial -->
      </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

