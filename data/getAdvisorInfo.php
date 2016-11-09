<?php
header("Access-Control-Allow-Origin: *");


//header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$result = $conn->query("SELECT id, name, institution FROM committeemembers");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":'  . $rs["id"] . ',';
    $outp .= '"name":"'   . $rs["name"]        . '",';
    $outp .= '"institution":"'. $rs["institution"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>