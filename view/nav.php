
<!-- Begin Nav================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="container">
	<!-- Begin Logo -->
	<a class="navbar-brand" href="?action=showhome">
	<p>WIKICODE</p>
	</a>
	<!-- End Logo -->
	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<!-- Begin Menu -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
			<a class="nav-link" href="index.php?action=showhome">Home <span class="sr-only">(current)</span></a>
			</li>
			<?php if(isset($_SESSION['user_id']) && ($_SESSION['role'] == 'auteur')) : ?>
			<li class="nav-item">
				<a class="nav-link" href="?action=addpost">New</a>
			</li>
			<?php endif; ?>
		</ul>
		<!-- End Menu -->
		<!-- Begin Search -->
		<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
            <input class="form-control mr-sm-2" type="text" id="search" name="search" placeholder="Search Title, Tag, Category">
        </form>
		<!-- End Search -->

		<!-- login -->
		<?php if(!isset($_SESSION['user_id'])) : ?>
		<a href="index.php?action=log_in"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person mt-2" viewBox="0 0 16 16">
			<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
		</svg></a>
		<?php endif; ?>
		<!-- endlogin -->

		<!-- logout -->
		<?php if(isset($_SESSION['user_id'])) : ?>
		<a href="index.php?action=logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right mt-2" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
			<path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
		</svg></a>
		<?php endif; ?>
		<!-- endlogout -->
	</div>
</div>
</nav>
<!-- End Nav
================================================== -->