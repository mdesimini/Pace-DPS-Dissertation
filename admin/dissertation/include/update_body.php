<html>
<head>
    <title>Update - DPS Dissertations</title>
     
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
            <h1>Update Dissertation</h1>
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
        
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $authorid=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //include database connection
        include '../config/database.php';

        // check if form was submitted
        if($_POST){

            try{

                // write update query
                // in this case, it seemed like we have so many fields to pass and 
                // it is better to label them and not use question marks
                $query = "UPDATE dissertation 
                            SET dissertationtitle=:dissertationtitle, dateofsuccessfuldefense=:dateofsuccessfuldefense, classyear=:classyear, author=:author, fractionofyearsnotenrolled=:fractionofyearsnotenrolled, monthstocompletion=:monthstocompletion, committeemember1=:committeemember1, committeemember2=:committeemember2, committeemember3=:committeemember3, committeemember4=:committeemember4, committeemember5=:committeemember5, primarysubjectcategory=:primarysubjectcategory, secondarysubjectcategory=:secondarysubjectcategory, tertiarysubjectcategory=:tertiarysubjectcategory, primarymethodused=:primarymethodused, secondarymethodused=:secondarymethodused, tertiarymethodused=:tertiarymethodused, numberofpagestotal=:numberofpagestotal, numberofpageswithoutappendices=:numberofpageswithoutappendices, numberoffigures=:numberoffigures, numberoftables=:numberoftables, numberofnumberedandcitedreferences=:numberofnumberedandcitedreferences, numberofbibliographydocuments=:numberofbibliographydocuments, titleofexternalpublication1=:titleofexternalpublication1, titleofexternalpublication2=:titleofexternalpublication2, abstract=:abstract  
                            WHERE authorid = :authorid";

                // prepare query for excecution
                $stmt = $con->prepare($query);

                // posted values
                $dissertationtitle=htmlspecialchars(strip_tags($_POST['dissertationtitle']));
                $dateofsuccessfuldefense=htmlspecialchars(strip_tags($_POST['dateofsuccessfuldefense']));
                $classyear=htmlspecialchars(strip_tags($_POST['classyear']));
                $author=htmlspecialchars(strip_tags($_POST['author']));
                $fractionofyearsnotenrolled=htmlspecialchars(strip_tags($_POST['fractionofyearsnotenrolled']));
                $monthstocompletion=htmlspecialchars(strip_tags($_POST['monthstocompletion']));
                $committeemember1=htmlspecialchars(strip_tags($_POST['committeemember1']));
                $committeemember2=htmlspecialchars(strip_tags($_POST['committeemember2']));
                $committeemember3=htmlspecialchars(strip_tags($_POST['committeemember3']));
                $committeemember4=htmlspecialchars(strip_tags($_POST['committeemember4']));
                $committeemember5=htmlspecialchars(strip_tags($_POST['committeemember5']));
                $primarysubjectcategory=htmlspecialchars(strip_tags($_POST['primarysubjectcategory']));
                $secondarysubjectcategory=htmlspecialchars(strip_tags($_POST['secondarysubjectcategory']));
                $tertiarysubjectcategory=htmlspecialchars(strip_tags($_POST['tertiarysubjectcategory']));
                $primarymethodused=htmlspecialchars(strip_tags($_POST['primarymethodused']));
                $secondarymethodused=htmlspecialchars(strip_tags($_POST['secondarymethodused']));
                $tertiarymethodused=htmlspecialchars(strip_tags($_POST['tertiarymethodused']));
                $numberofpagestotal=htmlspecialchars(strip_tags($_POST['numberofpagestotal']));
                $numberofpageswithoutappendices=htmlspecialchars(strip_tags($_POST['numberofpageswithoutappendices']));
                $numberoffigures=htmlspecialchars(strip_tags($_POST['numberoffigures']));
                $numberoftables=htmlspecialchars(strip_tags($_POST['numberoftables']));
                $numberofnumberedandcitedreferences=htmlspecialchars(strip_tags($_POST['numberofnumberedandcitedreferences']));
                $numberofbibliographydocuments=htmlspecialchars(strip_tags($_POST['numberofbibliographydocuments']));
                $titleofexternalpublication1=htmlspecialchars(strip_tags($_POST['titleofexternalpublication1']));
                $titleofexternalpublication2=htmlspecialchars(strip_tags($_POST['titleofexternalpublication2']));
                $abstract=htmlspecialchars(strip_tags($_POST['abstract']));

                // bind the parameters
                $stmt->bindParam(':dissertationtitle', $dissertationtitle);
                $stmt->bindParam(':dateofsuccessfuldefense', $dateofsuccessfuldefense);
                $stmt->bindParam(':classyear', $classyear);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':fractionofyearsnotenrolled', $fractionofyearsnotenrolled);
                $stmt->bindParam(':monthstocompletion', $monthstocompletion);                
                $stmt->bindParam(':committeemember1', $committeemember1);
                $stmt->bindParam(':committeemember2', $committeemember2);
                $stmt->bindParam(':committeemember3', $committeemember3);
                $stmt->bindParam(':committeemember4', $committeemember4);
                $stmt->bindParam(':committeemember5', $committeemember5);
                $stmt->bindParam(':primarysubjectcategory', $primarysubjectcategory);
                $stmt->bindParam(':secondarysubjectcategory', $secondarysubjectcategory);
                $stmt->bindParam(':tertiarysubjectcategory', $tertiarysubjectcategory);
                $stmt->bindParam(':primarymethodused', $primarymethodused);
                $stmt->bindParam(':secondarymethodused', $secondarymethodused);
                $stmt->bindParam(':tertiarymethodused', $tertiarymethodused);
                $stmt->bindParam(':numberofpagestotal', $numberofpagestotal);
                $stmt->bindParam(':numberofpageswithoutappendices', $numberofpageswithoutappendices);
                $stmt->bindParam(':numberoffigures', $numberoffigures);
                $stmt->bindParam(':numberoftables', $numberoftables);
                $stmt->bindParam(':numberofnumberedandcitedreferences', $numberofnumberedandcitedreferences);
                $stmt->bindParam(':numberofbibliographydocuments', $numberofbibliographydocuments);
                $stmt->bindParam(':titleofexternalpublication1', $titleofexternalpublication1);
                $stmt->bindParam(':titleofexternalpublication2', $titleofexternalpublication2);
                $stmt->bindParam(':abstract', $abstract);
                $stmt->bindParam(':authorid', $authorid);

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
        
        <form action='update.php?id=<?php echo htmlspecialchars($authorid); ?>' method='post' border='0'>
            <table class='table table-hover table-responsive table-bordered'>
                
                <tr>
                    <td>Title</td>
                    <td><input type='text' name='dissertationtitle' value="<?php echo htmlspecialchars($dissertationtitle, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Defense Date</td>
                    <td><input type='text' name='dateofsuccessfuldefense' placeholder="YYYY-MM-DD" value="<?php echo htmlspecialchars($dateofsuccessfuldefense, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>                 
                <tr>
                    <td>Class Year</td>
                    <td><input name='classyear' class='form-control' value="<?php echo htmlspecialchars($classyear, ENT_QUOTES);  ?>" /></td>
                </tr>                
                <tr>
                    <td>Author Name</td>
                    <td><input type='text' name='author' value="<?php echo htmlspecialchars($author, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Fraction Of Years Not Enrolled</td>
                    <td><input type='text' name='fractionofyearsnotenrolled' value="<?php echo htmlspecialchars($fractionofyearsnotenrolled, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Months To Completion</td>
                    <td><input type='text' name='monthstocompletion' value="<?php echo htmlspecialchars($monthstocompletion, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                

                <tr>
                    <td>Advisor</td>
                    <td><input type='text' name='committeemember1' value="<?php echo htmlspecialchars($committeemember1, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Committee Member 2</td>
                    <td><input type='text' name='committeemember2' value="<?php echo htmlspecialchars($committeemember2, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Committee Member 3</td>
                    <td><input type='text' name='committeemember3' value="<?php echo htmlspecialchars($committeemember3, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Committee Member 4</td>
                    <td><input type='text' name='committeemember4' value="<?php echo htmlspecialchars($committeemember4, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Committee Member 5</td>
                    <td><input type='text' name='committeemember5' value="<?php echo htmlspecialchars($committeemember5, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                
                <tr>
                    <td>Primary Subject Category</td>
                    <td><input type='text' name='primarysubjectcategory' value="<?php echo htmlspecialchars($primarysubjectcategory, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Secondary Subject Category</td>
                    <td><input type='text' name='secondarysubjectcategory' value="<?php echo htmlspecialchars($secondarysubjectcategory, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Tertiary Subject Category</td>
                    <td><input type='text' name='tertiarysubjectcategory' value="<?php echo htmlspecialchars($tertiarysubjectcategory, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                
                
                <tr>
                    <td>primary method used</td>
                    <td><input type='text' name='primarymethodused' value="<?php echo htmlspecialchars($primarymethodused, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>secondary method used</td>
                    <td><input type='text' name='secondarymethodused' value="<?php echo htmlspecialchars($secondarymethodused, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>tertiary method used</td>
                    <td><input type='text' name='tertiarymethodused' value="<?php echo htmlspecialchars($tertiarymethodused, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                
                <tr>
                    <td>Total Number of Pages</td>
                    <td><input type='text' name='numberofpagestotal' value="<?php echo htmlspecialchars($numberofpagestotal, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>number of pages without appendices</td>
                    <td><input type='text' name='numberofpageswithoutappendices' value="<?php echo htmlspecialchars($numberofpageswithoutappendices, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>number of figures</td>
                    <td><input type='text' name='numberoffigures' value="<?php echo htmlspecialchars($numberoffigures, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>number of tables</td>
                    <td><input type='text' name='numberoftables' value="<?php echo htmlspecialchars($numberoftables, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>number of numbered and cited references</td>
                    <td><input type='text' name='numberofnumberedandcitedreferences' value="<?php echo htmlspecialchars($numberofnumberedandcitedreferences, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>number of bibliography documents</td>
                    <td><input type='text' name='numberofbibliographydocuments' value="<?php echo htmlspecialchars($numberofbibliographydocuments, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>title of externalpublication 1</td>
                    <td><input type='text' name='titleofexternalpublication1' value="<?php echo htmlspecialchars($titleofexternalpublication1, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>title of external publication 2</td>
                    <td><input type='text' name='titleofexternalpublication2' value="<?php echo htmlspecialchars($titleofexternalpublication2, ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Abstract</td>
                    <td><textarea name='abstract' class='form-control'><?php echo htmlspecialchars($abstract, ENT_QUOTES);  ?></textarea></td>
                </tr>                 
           
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
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