<?php $hide_nav=true; include '_include/head.php'; ?>

<?php


if($_SERVER['QUERY_STRING']=='invalid')
    $invalid = '<center><h3 style="color:red;">Please log in to view this content.</h3></center>';
else
    $invalid = '';

if(isset($_POST['username'])&&isset($_POST['password']))
{
    $res = $admin->checkadmin(trim($_POST['username']),trim($_POST['password']));

    if($res)
    {
        header('Location: '.$url_full_base.'home.php');
        exit();
    }
    else
        $invalid = '<center><h3 style="color:red;">Invalid username or password provided.</h3></center>';
	
   	
      
}
?>

<h1>Login</h1>


<form action="<?=$url_root?>/index.php" method="post">
    <?=$invalid?>
	<p align="center">
		<label>Username: 
		<input type="text" name="username" id="username" class="input"/></label>
	</p>
	<p align="center">
		<label>Password: 
		<input type="password" name="password" id="password" class="input"/></label>
	</p>
	<p class="submit" align="center">
		<input type="submit" name="submit" id="submit" class="buttonSubmit" value="Login" />
	</p>
</form>
<?php include '_include/footer.php'; ?>