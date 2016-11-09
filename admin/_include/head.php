<?php 
include 'core.php';

?>
<?php
        if(isset($_GET['action']) && $_GET['action']=="logout")
		
        {
            session_destroy();
			header("Location:/~f15-cs691-dps/dps/admin/index.php");
			  //header("Location:/~anu/dps/admin/index.php");
	exit;
        }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
<link rel="stylesheet" type="text/css" href="<?=$url_root?>/assets/admin.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/~cs691-team07-2013/old/style/jquery.ui/jquery-ui-1.8.18.custom.css"></script>
</head>
<body>
<?php if(!$hide_nav): ?>
<!--
<div id="bar">
<div id="barText">
<a href="<?=$url_root?>/home.php">Home</a> |
<a href="<?=$url_root?>/dissertation/index.php">Manage Dissertations</a> |
<a href="<?=$url_root?>/dissertation/create.php">Add a New Dissertation</a> |
<a href="<?=$url_root?>/person/index.php">Manage Advisors</a> |
<a href="<?=$url_root?>/person/create.php">Add a New Advisor</a> |
<a href="<?=$url_root?>/external_publication/index.php">Manage External Publications</a> |
<a href="<?=$url_root?>/external_publication/create.php">Add a New External Publication</a> |
<a href="<?=$url_root?>/index.php?action=logout">Log Out</a>
</div>
</div>
-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="<?=$url_root?>/home.php">Home</a></li>        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dissertations <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?=$url_root?>/dissertation/index.php">Manage Dissertations</a></li>
              <li><a href="<?=$url_root?>/dissertation/create.php">Add a New Dissertation</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advisors <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?=$url_root?>/person/index.php">Manage Advisors</a></li>
              <li><a href="<?=$url_root?>/person/create.php">Add a New Advisor</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">External Publications <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?=$url_root?>/external_publication/index.php">Manage External Publications</a></li>
              <li><a href="<?=$url_root?>/external_publication/create.php">Add a New External Publication</a></li>
          </ul>
        </li>        
      <li><a href="<?=$url_root?>/index.php?action=logout">Log Out</a></li>        
        
    </ul>
  </div>
</nav>
<?php endif; ?> 

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<?php include '_include/footer.php'; ?>