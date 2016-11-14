<html>
<head>
    <title>Add New External Publication</title>

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
            <h1>Add External Publication</h1>
        </div>

        <?php
        if($_POST){

            // include database connection
            include '../config/database.php';

            try{

                // insert query
                $query = "INSERT INTO externalpublication SET titleofexternalpublication=:titleofexternalpublication, author=:author, authorcommitteemember1=:authorcommitteemember1, authorcommitteemember2=:authorcommitteemember2, authorcommitteemember3=:authorcommitteemember3, authorcommitteemember4=:authorcommitteemember4, authorcommitteemember5=:authorcommitteemember5, othercitinginformation=:othercitinginformation";
                //, created=:created
                
                // prepare query for execution
                $stmt = $con->prepare($query);

                // posted values
                $titleofexternalpublication=htmlspecialchars(strip_tags($_POST['titleofexternalpublication']));
                $author=htmlspecialchars(strip_tags($_POST['author']));                
                $authorcommitteemember1=htmlspecialchars(strip_tags($_POST['authorcommitteemember1']));
                $authorcommitteemember2=htmlspecialchars(strip_tags($_POST['authorcommitteemember2']));
                $authorcommitteemember3=htmlspecialchars(strip_tags($_POST['authorcommitteemember3']));
                $authorcommitteemember4=htmlspecialchars(strip_tags($_POST['authorcommitteemember4']));
                $authorcommitteemember5=htmlspecialchars(strip_tags($_POST['authorcommitteemember5']));
                $othercitinginformation=htmlspecialchars(strip_tags($_POST['othercitinginformation']));                
                

                // bind the parameters
                $stmt->bindParam(':titleofexternalpublication', $titleofexternalpublication);
                $stmt->bindParam(':author', $author);                
                $stmt->bindParam(':authorcommitteemember1', $authorcommitteemember1);
                $stmt->bindParam(':authorcommitteemember2', $authorcommitteemember2);
                $stmt->bindParam(':authorcommitteemember3', $authorcommitteemember3);
                $stmt->bindParam(':authorcommitteemember4', $authorcommitteemember4);
                $stmt->bindParam(':authorcommitteemember5', $authorcommitteemember5);
                $stmt->bindParam(':othercitinginformation', $othercitinginformation);                

                // specify when this record was inserted to the database
                
                //$created=date('Y-m-d H:i:s');
                //$stmt->bindParam(':created', $created);

                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was saved.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }

            }

            // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>        
        
        <!-- html form here where the product information will be entered -->
        <form action='create.php' method='post'>
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Title Of External Publication</td>
                    <td><input type='text' name='titleofexternalpublication' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td><input type='text' placeholder="Last, First" name='author' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Advisor</td>
                    <td><input type='text' placeholder="Last, First" name='authorcommitteemember1' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 2</td>
                    <td><input type='text' placeholder="Last, First" name='authorcommitteemember2' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 3</td>
                    <td><input type='text' placeholder="Last, First" name='authorcommitteemember3' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 4</td>
                    <td><input type='text' placeholder="Last, First" name='authorcommitteemember4' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 5</td>
                    <td><input type='text' placeholder="Last, First" name='authorcommitteemember5' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Other Citing Info</td>
                    <td><input type='text' name='othercitinginformation' class='form-control' /></td>
                </tr>                
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='read.php' class='btn btn-danger'>Back to Dissertations</a>
                    </td>
                </tr>
            </table>
        </form>        
         
    </div> <!-- end .container -->

     
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
     
</body>
</html>