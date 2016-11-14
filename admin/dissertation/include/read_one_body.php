<html>
<head>
    <title>View - DPS Dissertations</title>
 
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
  
        <div class="page-header" style="margin-top: 65px;">
            <h1>Dissertation Info</h1>
        </div>
        
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
         
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $authorid=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include '../config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT dissertationtitle, dateofsuccessfuldefense, classyear, author, fractionofyearsnotenrolled, monthstocompletion, committeemember1, committeemember2, committeemember3, committeemember4, committeemember5, primarysubjectcategory, secondarysubjectcategory, tertiarysubjectcategory, primarymethodused, secondarymethodused, tertiarymethodused, numberofpagestotal, numberofpageswithoutappendices, numberoffigures, numberoftables, numberofnumberedandcitedreferences, numberofbibliographydocuments, titleofexternalpublication1, titleofexternalpublication2, abstract FROM dissertation WHERE authorid = ? LIMIT 0,1";
            $stmt = $con->prepare( $query );

            // this is the first question mark
            $stmt->bindParam(1, $authorid);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $dissertationtitle = $row['dissertationtitle'];
            $dateofsuccessfuldefense = $row['dateofsuccessfuldefense'];
            $classyear = $row['classyear'];
            $author = $row['author'];
            $fractionofyearsnotenrolled = $row['fractionofyearsnotenrolled'];
            $monthstocompletion = $row['monthstocompletion'];
            $committeemember1 = $row['committeemember1'];
            $committeemember2 = $row['committeemember2'];
            $committeemember3 = $row['committeemember3'];
            $committeemember4 = $row['committeemember4'];
            $committeemember5 = $row['committeemember5'];
            $primarysubjectcategory = $row['primarysubjectcategory'];
            $secondarysubjectcategory = $row['secondarysubjectcategory'];
            $tertiarysubjectcategory = $row['tertiarysubjectcategory'];
            $primarymethodused = $row['primarymethodused'];
            $secondarymethodused = $row['secondarymethodused'];
            $tertiarymethodused = $row['tertiarymethodused'];
            $numberofpagestotal = $row['numberofpagestotal'];
            $numberofpageswithoutappendices = $row['numberofpageswithoutappendices'];
            $numberoffigures = $row['numberoffigures'];
            $numberoftables = $row['numberoftables'];
            $numberofnumberedandcitedreferences = $row['numberofnumberedandcitedreferences'];
            $numberofbibliographydocuments = $row['numberofbibliographydocuments'];
            $titleofexternalpublication1 = $row['titleofexternalpublication1'];
            $titleofexternalpublication2 = $row['titleofexternalpublication2'];
            $abstract = $row['abstract'];
        }

        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
        ?>
        <!--
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Author</td>
                <td><?php echo htmlspecialchars($author, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Class Year</td>
                <td><?php echo htmlspecialchars($classyear, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Months To Completion</td>
                <td><?php echo htmlspecialchars($monthstocompletion, ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='read.php' class='btn btn-danger'>Back to Dissertations</a>
                </td>
            </tr>
        </table>        
        -->
        
            <table class='table table-hover table-responsive table-bordered'>
                
                <tr>
                    <td>Title</td>
                    <td><?php echo htmlspecialchars($dissertationtitle, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Defense Date</td>
                    <td><?php echo htmlspecialchars($dateofsuccessfuldefense, ENT_QUOTES);  ?></td>
                </tr>                 
                <tr>
                    <td>Class Year</td>
                    <td><?php echo htmlspecialchars($classyear, ENT_QUOTES);  ?></td>
                </tr>                
                <tr>
                    <td>Author Name</td>
                    <td><?php echo htmlspecialchars($author, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td>Fraction Of Years Not Enrolled</td>
                    <td><?php echo htmlspecialchars($fractionofyearsnotenrolled, ENT_QUOTES);  ?></td>
                </tr>
                <tr>
                    <td>Months To Completion</td>
                    <td><?php echo htmlspecialchars($monthstocompletion, ENT_QUOTES);  ?></td>
                </tr>
                

                <tr>
                    <td>Advisor</td>
                    <td><?php echo htmlspecialchars($committeemember1, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Committee Member 2</td>
                    <td><?php echo htmlspecialchars($committeemember2, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Committee Member 3</td>
                    <td><?php echo htmlspecialchars($committeemember3, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Committee Member 4</td>
                    <td><?php echo htmlspecialchars($committeemember4, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Committee Member 5</td>
                    <td><?php echo htmlspecialchars($committeemember5, ENT_QUOTES);  ?></td>
                </tr> 
                
                <tr>
                    <td>Primary Subject Category</td>
                    <td><?php echo htmlspecialchars($primarysubjectcategory, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Secondary Subject Category</td>
                    <td><?php echo htmlspecialchars($secondarysubjectcategory, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Tertiary Subject Category</td>
                    <td><?php echo htmlspecialchars($tertiarysubjectcategory, ENT_QUOTES);  ?></td>
                </tr> 
                
                
                <tr>
                    <td>primary method used</td>
                    <td><?php echo htmlspecialchars($primarymethodused, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>secondary method used</td>
                    <td><?php echo htmlspecialchars($secondarymethodused, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>tertiary method used</td>
                    <td><?php echo htmlspecialchars($tertiarymethodused, ENT_QUOTES);  ?></td>
                </tr> 
                
                <tr>
                    <td>Total Number of Pages</td>
                    <td><?php echo htmlspecialchars($numberofpagestotal, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>number of pages without appendices</td>
                    <td><?php echo htmlspecialchars($numberofpageswithoutappendices, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>number of figures</td>
                    <td><?php echo htmlspecialchars($numberoffigures, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>number of tables</td>
                    <td><?php echo htmlspecialchars($numberoftables, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>number of numbered and cited references</td>
                    <td><?php echo htmlspecialchars($numberofnumberedandcitedreferences, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>number of bibliography documents</td>
                    <td><?php echo htmlspecialchars($numberofbibliographydocuments, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>title of externalpublication 1</td>
                    <td><?php echo htmlspecialchars($titleofexternalpublication1, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>title of external publication 2</td>
                    <td><?php echo htmlspecialchars($titleofexternalpublication2, ENT_QUOTES);  ?></td>
                </tr> 
                <tr>
                    <td>Abstract</td>
                    <!-- <td><?php echo htmlspecialchars($abstract, ENT_QUOTES);  ?></td> -->
                    <td><textarea disabled name='abstract' class='form-control'><?php echo htmlspecialchars($abstract, ENT_QUOTES);  ?></textarea></td>
                </tr>                 
           
                <tr>
                    <td></td>
                    <td>
                        <a href='read.php' class='btn btn-danger'>Back to Dissertations</a>
                    </td>
                </tr>
            </table>        
        
        
    </div> <!-- end .container -->

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
     

 
</body>
</html>    