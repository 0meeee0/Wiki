
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
    <div>

    </div>
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
                        <th>Categories <a href="#" data-toggle="modal" data-target="#addCategoryModal">+</a></th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                  <tbody>
                      <?php foreach ($cat as $category): ?>
                          <tr>
                              <td><?php echo $category['category_name']; ?></td>
                              <td> <a href="index.php?action=modifycat&id=<?php echo $category['category_id']?>" data-toggle="modal" data-target="#modCatModal<?= $category['category_id'] ?>"><button class="btn btn-primary">✎</button></a> </td>
                               <div class="modal fade" id="modCatModal<?= $category['category_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modCatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modCatModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to modify tag -->
                    <form action="index.php?action=modifycat&catg_id=<?= $category['category_id'] ?>" method="post">
                        <label for="newTag">Modify Category:</label>
                        <input type="text" name="modCat" id="newCat" value="<?= $category['category_name'] ?>" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-warning">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                              <td> <a href="index.php?action=delcat&id=<?php echo $category['category_id']?>"> <button class="btn btn-danger text-white">X</button></a></td>
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
                          <th>Tags<a href="#" data-toggle="modal" data-target="#addTagModal">+</a></th>
                          <th>Modify</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($tags as $u): ?>
                          <tr>
                              <td><?php echo $u['tag_name']; ?></td>
                              <td><a href="index.php?action=modifytag&id=<?php echo $u['tag_id']?>" data-toggle="modal" data-target="#modTagModal<?= $u['tag_id'] ?>"><button class="btn btn-primary">✎</button></a></td>
                              <div class="modal fade" id="modTagModal<?= $u['tag_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modTagModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modTagModalLabel">Update Tag</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form to modify tag -->
                                            <form action="index.php?action=modifytag&id_tag=<?= $u['tag_id'] ?>" method="post">
                                                <label for="newTag">Modify Tag:</label>
                                                <input type="text" name="modTag" id="newTag" value="<?php echo $u['tag_name']; ?>" class="form-control" required>
                                                <br>
                                                <button type="submit" class="btn btn-warning">Apply</button>
                                            </form>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <td><a href="index.php?action=deltag&id=<?php echo $u['tag_id']?>"> <button class="btn btn-danger text-white">X</button></a></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
      </div>
    </div>

    <section class="mt-5 col-4 col-xs-6 mx-auto">

      <div class="container">
  
        <div class="row">
          <div class="stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Archived list</p>
                <div class="table-responsive">
                  <table id="user-listing" class="table">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>author</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($shi as $row): ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><a href="index.php?action=repost&id=<?= $row['wiki_id'] ?>" class="btn btn-success">repost</a></td>
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
    </section>

    


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

       <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to add a new category -->
                    <form action="index.php?action=addcat" method="post">
                        <label for="newCategory">New Category:</label>
                        <input type="text" name="newCategory" id="newCategory" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Tag Modal -->
    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="addTagModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTagModalLabel">Add Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to add a new tag -->
                    <form action="index.php?action=addtag" method="post">
                        <label for="newTag">New Tag:</label>
                        <input type="text" name="newTag" id="newTag" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-success">Add Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modify Tag Modal -->
    

    <!-- modify Category Modal -->
   
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

