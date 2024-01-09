<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/bg.svg">
<title>WIKICODE</title>
<link href="view/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<link href="view/assets/css/mediumish.css" rel="stylesheet">
</head>
<body style="background-color: whitesmoke;">

<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="container">
	<!-- Begin Logo -->
	<a class="navbar-brand" href="#">
	<p>WIKICODE</p>
	</a>
	<!-- End Logo -->
	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<!-- Begin Menu -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
			<a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="post.html">Post</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="author.html">Author</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="">New</a>
			</li>
		</ul>
		<!-- End Menu -->
		<!-- Begin Search -->
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="text" placeholder="Search">
			<span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
		</form>
		<!-- End Search -->
	</div>
</div>
</nav>
<!-- End Nav
================================================== -->

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
