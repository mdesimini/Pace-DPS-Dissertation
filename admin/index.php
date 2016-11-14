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
            <form action="login_submit.php" method="post">
            <fieldset>
            <p>
            <label for="username">Username</label>
            <input type="text" id="username" class="input form-control" placeholder="username" name="username" value="" maxlength="20" />
            </p>
            <p>
            <label for="password">Password</label>
            <input type="password" id="password" class="input form-control" placeholder="username" name="password" value="" maxlength="20" />
            </p>
            <p>
            <input type="submit" class="btn btn-default" value="Login" />
            </p>
            </fieldset>
            <a href="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/" ><p style="margin-top: 5px; padding: 5px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Return to app</p></a>
            </form>          
        </div>
    </body>
</html>
