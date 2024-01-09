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

<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">WIKI<span style="color: grey;">CODE</span></h1>
		<p class="lead">
			 Explore, Create and Share Knowledge Together!
		</p>
	</div>
<!-- End Site Title
================================================== -->

	<!-- Begin Featured
	================================================== -->
	<section class="featured-posts">
	<div class="section-title">
		<h2><span>Explore</span></h2>
	</div>
	<div class="card-columns listfeaturedtag">

		<!-- begin post -->
	<?php
	if ($shi !== null) {
		foreach ($shi as $row) {
			?>
			<div class="card">
				<div class="row">
					<div class="col-md-5 wrapthumbnail">
						<a href="index.php?action=thepost">
							<div class="thumbnail" style="background-image:url(https://intranet.youcode.ma/storage/users/profile/735-1696417328.jpg);">
							</div>
						</a>
					</div>
					<div class="col-md-7">
						<div class="card-block">
							<h2 class="card-title"><a href="index.php?action=thepost"><?php echo $row['title']; ?></a></h2>
							<h4 class="card-text"><?php echo $row['content']; ?></h4>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="author.html"><img class="author-thumb" src="https://intranet.youcode.ma/storage/users/profile/735-1696417328.jpg" alt="<?php echo $row['author_name']; ?>"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author.html"><?php echo $row['author_name']; ?></a></span><br/>
										<span class="post-date"><?php echo date('d F Y', strtotime($row['date_created'])); ?></span><span class="dot"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}else{
		echo 'no wikis available';
	}
	?>
		<!-- end post -->

	</div>
	</section>
	<!-- End Featured
	================================================== -->

	

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
