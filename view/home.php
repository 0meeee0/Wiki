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
							<div class="thumbnail" style="background-image:url(https://upload.wikimedia.org/wikipedia/en/thumb/8/80/Wikipedia-logo-v2.svg/1200px-Wikipedia-logo-v2.svg.png);">
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
										<a href="author.html"><img class="author-thumb" src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="<?php echo $row['author_name']; ?>"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="author.html"><?php echo $row['author_name']; ?></a></span><br/>
										<span class="post-date"><?php echo date('d F Y', strtotime($row['date_created'])); ?></span>
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

<?php
	include 'foot.php';
?>
</body>
</html>
