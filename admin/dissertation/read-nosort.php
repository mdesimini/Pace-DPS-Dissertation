<!DOCTYPE HTML>
<html>
<head>
    <title>DPS Dissertations</title>
     
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="libs/bootstrap-3.3.6/css/bootstrap.min.css" /> -->
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
    <div class="container">
  
        <div class="page-header">
            <h1>Dissertations</h1>
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
        
        $query = "SELECT authorid, author, classyear, monthstocompletion FROM dissertation ORDER BY authorid DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();

        // this is how to get number of rows returned
        $num = $stmt->rowCount();

        // link to create record form
        echo "<a href='create.php' class='btn btn-primary m-b-1em'>Add New Dissertation</a>";

        //check if more than 0 record found
        if($num>0){
            
            echo "<input type='text' id='filter' placeholder='Search Dissertations' class='form-control' style='width: 100%; margin: 0 auto; margin-bottom: 15px; border-radius: 0px;'>";
            echo "<table id='dissManagementTable' class='table tablesorter table-hover table-responsive table-bordered'>";//start table

                //creating our table heading
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Author ID</th>";
                    echo "<th>Author</th>";
                    echo "<th>Class Year</th>";
                    echo "<th>Months To Completion</th>";
                    echo "<th>Action</th>";
                echo "</tr>";
            echo "</thead>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($row);

                    // creating new table row per record
                    echo "<tbody class='searchable'>";
                    echo "<tr>";
                        echo "<td>{$authorid}</td>";
                        echo "<td>{$author}</td>";
                        echo "<td>{$classyear}</td>";
                        echo "<td>{$monthstocompletion}</td>";
                        echo "<td>";
                            // read one record 
                            echo "<a href='read_one.php?id={$authorid}' class='btn btn-info m-r-1em'>View</a>";

                            // we will use this links on next part of this post
                            echo "<a href='update.php?id={$authorid}' class='btn btn-primary m-r-1em'>Edit</a>";

                            // we will use this links on next part of this post
                            echo "<a href='#' onclick='delete_user({$authorid});'  class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                    echo "</tr>";
                    echo "</tbody>";
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
<script src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/js/jquery.tablesorter.min.js"></script>    
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
<script type='text/javascript'>
$(document).ready(function(){
    $(function(){
        $("#dissManagementTable").tablesorter();
            console.log("sorted");    
    
        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });        
    });    
});
</script>    
</body>
</html>