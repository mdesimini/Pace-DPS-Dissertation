<?php
header("Access-Control-Allow-Origin: *");

//header("Content-Type: application/json; charset=UTF-8");  
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$variable = $_GET['subject']; 


$result = $conn->query("SELECT authorid, dissertationtitle FROM dissertation WHERE primarysubjectcategory = " . "'" . $variable . "'");



$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"authorid":"'  . $rs["authorid"] . '",';
    $outp .= '"dissertationtitle":"'. $rs["dissertationtitle"]     . '"}'; 
    
    
    
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>