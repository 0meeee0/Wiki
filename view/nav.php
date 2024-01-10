<!-- Begin Nav
================================================== -->
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
			<li class="nav-item">
			<a class="nav-link" href="">Post</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="">Author</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="?action=addpost">New</a>
			</li>
		</ul>
		<!-- End Menu -->
		<!-- Begin Search -->
		<form class="form-inline my-2 my-lg-0" action="index.php" method="get">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search for a Title">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
        </form>
		<!-- End Search -->
	</div>
</div>
</nav>
<!-- End Nav
================================================== -->