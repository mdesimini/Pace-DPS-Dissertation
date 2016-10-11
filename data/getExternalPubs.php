<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('conn.php');

$result = $conn->query("SELECT id, titleofexternalpublication, author, authorcommitteemember1, authorcommitteemember2, authorcommitteemember3, authorcommitteemember4, authorcommitteemember5, othercitinginformation FROM externalpublication");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":'  . $rs["id"] . ',';
    $outp .= '"titleofexternalpublication":"'   . $rs["titleofexternalpublication"]        . '",';
    $outp .= '"author":"'   . $rs["author"]        . '",';
    $outp .= '"authorcommitteemember1":"'   . $rs["authorcommitteemember1"]        . '",';
    $outp .= '"authorcommitteemember2":"'   . $rs["authorcommitteemember3"]        . '",';
    $outp .= '"authorcommitteemember3":"'   . $rs["authorcommitteemember3"]        . '",';
    $outp .= '"authorcommitteemember4":"'   . $rs["authorcommitteemember4"]        . '",';
    $outp .= '"authorcommitteemember5":"'   . $rs["authorcommitteemember5"]        . '",';    
    $outp .= '"othercitinginformation":"'. $rs["othercitinginformation"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>