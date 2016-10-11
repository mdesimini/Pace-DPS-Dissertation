<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('conn.php');

$result = $conn->query("SELECT authorid, author, dissertationtitle, classyear, monthstocompletion, committeemember1, primarysubjectcategory, primarymethodused FROM dissertation");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id":'  . $rs["authorid"] . ',';
    $outp .= '"author":"'   . $rs["author"]        . '",';
    $outp .= '"dissertationtitle":"'   . $rs["dissertationtitle"]        . '",';
    $outp .= '"primarysubjectcategory":"'   . $rs["primarysubjectcategory"]        . '",';
    $outp .= '"primarymethodused":"'   . $rs["primarymethodused"]        . '",';
    $outp .= '"classyear":'   . $rs["classyear"]        . ',';
    $outp .= '"monthstocompletion":'   . $rs["monthstocompletion"]        . ',';
    $outp .= '"committeemember":"'. $rs["committeemember1"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
// $outp ='['.$outp.']';

$conn->close();

echo($outp);


?>
