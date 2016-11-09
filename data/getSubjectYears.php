<?php
header("Access-Control-Allow-Origin: *");

//header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$result = $conn->query("SELECT primarysubjectcategory,
       round (avg(monthstocompletion / 12),2) years,
       count(authorid) dissertationCount
 	 FROM dissertation
	GROUP BY primarysubjectcategory");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"primarysubjectcategory":"'  . $rs["primarysubjectcategory"] . '",';
    $outp .= '"years":'   . $rs["years"]        . ',';
    $outp .= '"dissertationCount":'. $rs["dissertationCount"]     . '}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>