<html>
<head>
    <title>Create - DPS Dissertations</title>
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
            <h1>Create Dissertation</h1>
        </div>

        <?php
        if($_POST){

            // include database connection
            include '../config/database.php';

            try{

                // insert query
                $query = "INSERT INTO dissertation SET dissertationtitle=:dissertationtitle, dateofsuccessfuldefense=:dateofsuccessfuldefense, classyear=:classyear, author=:author, fractionofyearsnotenrolled=:fractionofyearsnotenrolled, monthstocompletion=:monthstocompletion, committeemember1=:committeemember1, committeemember2=:committeemember2, committeemember3=:committeemember3, committeemember4=:committeemember4, committeemember5=:committeemember5, primarysubjectcategory=:primarysubjectcategory, secondarysubjectcategory=:secondarysubjectcategory, tertiarysubjectcategory=:tertiarysubjectcategory, primarymethodused=:primarymethodused, secondarymethodused=:secondarymethodused, tertiarymethodused=:tertiarymethodused, numberofpagestotal=:numberofpagestotal, numberofpageswithoutappendices=:numberofpageswithoutappendices, numberoffigures=:numberoffigures, numberoftables=:numberoftables, numberofnumberedandcitedreferences=:numberofnumberedandcitedreferences, numberofbibliographydocuments=:numberofbibliographydocuments, titleofexternalpublication1=:titleofexternalpublication1, titleofexternalpublication2=:titleofexternalpublication2, abstract=:abstract";
                //, created=:created
                
                // prepare query for execution
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
                    <td>Title</td>
                    <td><input type='text' name='dissertationtitle' class='form-control' /></td>
                </tr> 
                <tr>
                    <td>Defense Date</td>
                    <td><input type='text' placeholder='YYYY-MM-DD' name='dateofsuccessfuldefense' class='form-control' /></td>
                </tr>    
                <tr>
                    <td>Class Year</td>
                    <!-- <td><textarea name='classyear' class='form-control'></textarea></td> -->
                    <td><input type='text' name='classyear' class='form-control' /></td>
                </tr>                
                <tr>
                    <td>Author</td>
                    <td><input type='text' placeholder="Last, First" name='author' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Fraction Year Not Enrolled</td>
                    <td><input type='text' name='fractionofyearsnotenrolled' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Months To Completion</td>
                    <td><input type='text'  name='monthstocompletion' class='form-control' /></td>
                </tr>                
                <tr>
                    <td>Advisor</td>
                    <td><input type='text' placeholder="Last, First" name='committeemember1' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 2</td>
                    <td><input type='text' placeholder="Last, First" name='committeemember2' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 3</td>
                    <td><input type='text' placeholder="Last, First" name='committeemember3' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 4</td>
                    <td><input type='text' placeholder="Last, First" name='committeemember4' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Committee Member 5</td>
                    <td><input type='text' placeholder="Last, First" name='committeemember5' class='form-control' /></td>
                </tr>
                
                
                <tr>
                    <td>Subject Category - Primary</td>
                    <td><input type='text' name='primarysubjectcategory' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Subject Category - Secondary</td>
                    <td><input type='text' name='secondarysubjectcategory' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Subject Category - Tertiary</td>
                    <td><input type='text' name='tertiarysubjectcategory' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Method Used - Primary</td>
                    <td><input type='text' name='primarymethodused' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Method Used - Secondary</td>
                    <td><input type='text' name='secondarymethodused' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Method Used - Tertiary</td>
                    <td><input type='text' name='tertiarymethodused' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Total Number of Pages</td>
                    <td><input type='text' name='numberofpagestotal' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Number of Pages Without Appendices</td>
                    <td><input type='text' name='numberofpageswithoutappendices' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Number of Figures</td>
                    <td><input type='text' name='numberoffigures' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Number of Tables</td>
                    <td><input type='text' name='numberoftables' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Number of Cited References</td>
                    <td><input type='text' name='numberofnumberedandcitedreferences' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Number of Bibliography References</td>
                    <td><input type='text' name='numberofbibliographydocuments' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Title of External Publication 1</td>
                    <td><input type='text' name='titleofexternalpublication1' class='form-control' /></td>
                </tr>
                <tr>
                    <td>Title of External Publication 2</td>
                    <td><input type='text' name='titleofexternalpublication2' class='form-control' /></td>
                </tr>                
                <tr>
                    <td>Abstract</td>
                    <!-- <td><input type='text' name='abstract' class='form-control' /></td> -->
                    <td><textarea name='abstract' class='form-control'></textarea></td>
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