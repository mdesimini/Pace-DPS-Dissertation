<?php
header("Access-Control-Allow-Origin: *");

//header("Content-Type: application/json; charset=UTF-8");  
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$keyword = $_GET['keyword']; 


$result = $conn->query("SELECT authorid, dissertationtitle FROM dissertation WHERE abstract LIKE '%{$keyword}%'");

            

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