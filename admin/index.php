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
        //header('Location: '.$url_full_base.'home.php');
        exit();
    }
    else
        $invalid = '<center><h3 style="color:red;">Invalid username or password provided.</h3></center>';
	
   	
      
}
?>

<html>
<head>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Login</title>
</head>
    <body>    
        <div id="admin-main">
          <img style="display:block; margin: 0 auto; width: 35%; margin-bottom: 20px;" src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/images/logo.png">
          <!-- <h2>DPS Dissertation Login</h2> -->
          <form action="<?=$url_root?>/index.php" method="post">
              <?=$invalid?>
            <div class="form-group">
              <label for="email">Username:</label>
              <input type="text" name="username" id="username" class="input form-control" placeholder="username"/>
            </div>            
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password"  class="form-control" name="password" id="password" placeholder="password" class="input"/>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
              <a href="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/" ><p style="margin-top: 5px; padding: 5px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Return to app</p></a>
          </form>
         
    </div>
    </body>
</html>

<?php include '_include/footer.php'; ?>