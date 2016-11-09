<?php
header("Access-Control-Allow-Origin: *");

//header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$result = $conn->query("SELECT primarysubjectcategory, authorid FROM dissertation GROUP BY primarysubjectcategory;");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":'  . $rs["authorid"] . ',';
    $outp .= '"primarysubjectcategory":"'. $rs["primarysubjectcategory"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>