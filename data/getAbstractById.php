<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");  

require_once('conn.php');

$variable = $_GET['authid']; 


$sql = "SELECT TRIM(abstract) as abstract FROM dissertation WHERE authorid = " . $variable;

/*

$sth = mysqli_query($conn, $sql);

$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    
    json_encode($r['abstract']);
    //echo $r['abstract'];
    $rows[] = $r;
}

echo json_encode($rows);

*/

$sth = mysqli_query($conn, $sql);

$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    
    //json_encode($r['abstract']);
    echo $r['abstract'];
    //$rows[] = $r;
}

echo json_encode($rows);

?>