<!DOCTYPE html>
<html lang="en">
<head>
<?php
	include 'header.php';
?>
</head>
<body style="background-color: whitesmoke;">

<?php
	include 'nav.php';
?>


<div class="container">
        <div class="container">
            <div class="mainheading">
                <h1 class="sitetitle">WIKI<span style="color: grey;">CODE</span></h1>
                <p class="lead">
                    Create and Share Knowledge Together!
                </p>
            </div>
        <form action="index.php?action=adding" class="login-form" method="post">
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"></div>
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"></div>
                <input type="text" name="category" class="form-control" placeholder="Category" required>
            </div>
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"></div>
                <input type="text" name="tag" class="form-control" placeholder="Tags" required>
            </div>
            <div class="form-group">
                <div class="icon d-flex align-items-center justify-content-center"></div>
                <label for="content">Content</label>
                <textarea name="content" class="form-control" placeholder="Content" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="icon d-flex align-items-center justify-content-center"></div>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn form-control btn-success rounded submit px-3">Add Wiki</button>
            </div>
        </form>
    </div>


	

	<!-- Begin Footer
	================================================== -->
	<div class="footer">
		<p class="text-center">
			 Copyright &copy; 2024 WIKICODE
		</p>
		<!-- <p class="pull-right">
			 All rights are reserved <a target="_blank" href="https://www.wowthemes.net">WowThemes.net</a>
		</p>
		<div class="clearfix">
		</div> -->
	</div>
	<!-- End Footer
	================================================== -->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
