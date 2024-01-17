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


<div class="container col-md-6 col-xs-10">
        <div class="container">
            <div class="mainheading">
                <h1 class="sitetitle">WIKI<span class="text-success">CODE</span></h1>
                <p class="lead">
                    What's On Your Mind? 
                    <!-- <?php var_dump($categories) ?>  -->
                </p>
            </div>
        <form action="index.php?action=adding" class="login-form" method="post">
            <div class="form-group"> 
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="form-group"> 
                <label for="category">Category</label>
                <select name="category" class="form-control" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category["category_id"]; ?>">
                            <?= $category["category_name"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="form-group"> 
                <label for="tag">Tag</label>
                <div class="form-check col-1">
                     <?php foreach ($tags as $t): ?>
                    <input name="tag[]" class="form-check-input" type="checkbox" value="<?= $t['tag_id'];?>" id="flexCheckDefault<?= $t['tag_id'];?>" >
                    <label class="form-check-label" for="flexCheckDefault<?= $t['tag_id'];?>">
                        <?= $t["tag_name"];?>
                    </label>
                    <?php endforeach; ?>
            </div>
            <div class="form-group"> 
                <label for="content">Content</label>
                <textarea name="content" class="form-control" placeholder="Content" required></textarea>
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
	</div>
	<!-- End Footer
	================================================== -->

</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
<?php
	include 'foot.php';
?>
</body>
</html>
