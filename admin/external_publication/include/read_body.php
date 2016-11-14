<html>
<head>
    <title>External Publications</title>
     
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
 
    <!-- container -->
<div class="container2" style="max-width: 1900px; margin: 0 auto;">
        
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
            <h1>External Publications</h1>
        </div>

        <?php
        // include database connection
        include '../config/database.php';     
        
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // if it was redirected from delete.php
        if($action=='deleted'){
            echo "<div class='alert alert-success'>Record was deleted.</div>";
        }        

        // select all data
        $query = "SELECT id, titleofexternalpublication, author, authorcommitteemember1, authorcommitteemember2, authorcommitteemember3, authorcommitteemember4, authorcommitteemember5, othercitinginformation FROM externalpublication";
        $stmt = $con->prepare($query);
        $stmt->execute();

        // this is how to get number of rows returned
        $num = $stmt->rowCount();

        // link to create record form
        echo "<a href='create.php' class='btn btn-primary m-b-1em'>Add New External Publication</a>";

        //check if more than 0 record found
        if($num>0){

            echo "<table class='table table-hover table-responsive table-bordered' >";//start table

                //creating our table heading
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Title</th>";
                    echo "<th>Author</th>";
                    echo "<th>Advisor</th>";
                    echo "<th>Committee Member 2</th>";
                    echo "<th>Committee Member 3</th>";
                    echo "<th>Committee Member 4</th>";
                    echo "<th>Committee Member 5</th>";
                    echo "<th>Other Citing Information</th>";   
                    echo "<th>Action</th>";
                echo "</tr>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($row);

                    // creating new table row per record
                    echo "<tr>";
                        echo "<td>{$id}</td>";    
                        echo "<td>{$titleofexternalpublication}</td>";
                        echo "<td>{$author}</td>";                    
                        echo "<td>{$authorcommitteemember1}</td>";
                        echo "<td>{$authorcommitteemember2}</td>";
                        echo "<td>{$authorcommitteemember3}</td>";
                        echo "<td>{$authorcommitteemember4}</td>";
                        echo "<td>{$authorcommitteemember5}</td>";
                        echo "<td>{$othercitinginformation}</td>";                    
                        echo "<td>";
                            // read one record 
                            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

                            // we will use this links on next part of this post
                            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                            // we will use this links on next part of this post
                            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                    echo "</tr>";
                }

            // end table
            echo "</table>";

        }

        // if no records found
        else{
            echo "<div>No records found.</div>";
        }
        ?>        
         
    </div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>    

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type='text/javascript'>
function delete_user( id ){
     
    var answer = confirm('Are you sure?');
    if (answer){
        // if user clicked ok, 
        // pass the id to delete.php and execute the delete query
        window.location = 'delete.php?id=' + id;
    } 
}
</script> 
    
    
</body>
</html>