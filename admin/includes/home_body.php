<html>
<head>
    <title>DPS Dissertations</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="libs/bootstrap-3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
         
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    </style>
 
</head>
    
<body>
    <p style="position: absolute; top:15px; right: 10%; z-index:10000;"><?php echo $message; ?></p>
    <!-- container -->

<div class="container">  
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <ul class="nav navbar-nav">
              <li><a href="#">Home</a></li>        
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dissertations <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="dissertation/read.php">Manage Dissertations</a></li>
                      <li><a href="dissertation/create.php">Add a New Dissertation</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advisors <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="person/read.php">Manage Advisors</a></li>
                      <li><a href="person/create.php">Add a New Advisor</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">External Publications <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="external_publication/read.php">Manage External Publications</a></li>
                      <li><a href="external_publication/create.php">Add a New External Publication</a></li>
                  </ul>
                </li>        
              <li><a href="logout.php">Log Out</a></li>        

            </ul>
          </div>
        </nav>            

<h1 style="text-align: center; margin-top: 65px;">DPS Dissertation Admin</h1>

<br><br>

<div class="container">
    <img src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/test/images/logo.png" alt="logo" style="width: 200px; display: block; margin: 0 auto; margin-bottom: 25px;">
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/dissertation.png" alt="dissertation">
      <div class="caption">
        <h3>Dissertations</h3>
        <p><a href="dissertation/create.php" class="btn btn-primary" role="button">Add</a> <a href="dissertation/read.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/advisor.png" alt="advisor">
      <div class="caption">
        <h3>Advisors</h3>
        <p><a href="person/create.php" class="btn btn-primary" role="button">Add</a> <a href="person/read.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="text-align: center;">
      <img style="height: 150px; padding: 10px;" src="assets/externalpub.jpg" alt="externalpub">
      <div class="caption">
        <h3>External Publications</h3>
        <p><a href="external_publication/create.php" class="btn btn-primary" role="button">Add</a> <a href="external_publication/read.php" class="btn btn-default" role="button">Manage</a></p>
      </div>
    </div>
  </div>    
</div>
</div>   
    </div>
    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
    
</html>    