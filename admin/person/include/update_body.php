<html>
<head>
    <title>Update Advisor</title>
     
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
         
</head>
<body>
 
    <!-- container -->

<div class="container">
  
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <ul class="nav navbar-nav">
              <li><a href="../home.php">Home</a></li>        
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dissertations <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="../dissertation/read.php">Manage Dissertations</a></li>
                      <li><a href="../dissertation/create.php">Add a New Dissertation</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Advisors <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="../person/read.php">Manage Advisors</a></li>
                      <li><a href="../person/create.php">Add a New Advisor</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">External Publications <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="../external_publication/read.php">Manage External Publications</a></li>
                      <li><a href="../external_publication/create.php">Add a New External Publication</a></li>
                  </ul>
                </li>        
              <li><a href="../logout.php">Log Out</a></li>       

            </ul>
          </div>
        </nav>            
        
        <div class="page-header" style="margin-top: 65px;">
            <h1>Update Advisor</h1>
        </div>
     
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include '../config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT Name, Institution FROM committeemembers WHERE id = ? LIMIT 0,1";
            $stmt = $con->prepare( $query );

            // this is the first question mark
            $stmt->bindParam(1, $id);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            //$id = $row['id'];
            $Name = $row['Name'];
            $Institution = $row['Institution'];
        }

        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
        ?>   
        
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include '../config/database.php';

        // check if form was submitted
        if($_POST){

            try{

                // write update query
                // in this case, it seemed like we have so many fields to pass and 
                // it is better to label them and not use question marks
                $query = "UPDATE committeemembers 
                            SET Name=:Name, Institution=:Institution 
                            WHERE id=:id";

                // prepare query for excecution
                $stmt = $con->prepare($query);

                // posted values
                
                //$id=htmlspecialchars(strip_tags($_POST['id']));
                $Name=htmlspecialchars(strip_tags($_POST['Name']));
                $Institution=htmlspecialchars(strip_tags($_POST['Institution']));
                

                // bind the parameters
                
                //$stmt->bindParam(':id', $id);
                $stmt->bindParam(':Name', $Name);
                $stmt->bindParam(':Institution', $Institution);
                $stmt->bindParam(':id', $id);
                
                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was updated.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                }

            }

            // show errors
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>        
        
        <form action='update.php?id=<?php echo htmlspecialchars($id); ?>' method='post' border='0'>
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Name</td>
                    <td><input type='text' placeholder="Last, First" name='Name' value="<?php echo htmlspecialchars($Name, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Institution</td>
                    <td><input type='text' name='Institution' value="<?php echo htmlspecialchars($Institution, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='read.php' class='btn btn-danger'>Back to Advisors</a>
                    </td>
                </tr>
            </table>
        </form>        
         
    </div> <!-- end .container -->

     
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
        

 
</body>
</html>