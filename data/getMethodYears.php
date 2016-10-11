<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('conn.php');

$result = $conn->query("SELECT primarymethodused,
       round (avg(monthstocompletion / 12),2) years,
       count(authorid) dissertationCount
  	FROM dissertation a
	GROUP BY primarymethodused");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"primarymethodused":"'  . $rs["primarymethodused"] . '",';
    $outp .= '"years":'   . $rs["years"]        . ',';
    $outp .= '"dissertationCount":'. $rs["dissertationCount"]     . '}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>