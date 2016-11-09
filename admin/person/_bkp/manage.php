<?php include '../_include/head.php'; ?>

<h1></h1>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<p align="center">
		<label>Name: 
		<input type="text" name="name" id="name" class="input"/></label>
	</p>

	<p class="submit" align="center">
		<input type="submit" name="submit" id="submit" class="buttonSubmit" value="Submit" />
	</p>
</form>

<?php include '../_include/footer.php'; ?>