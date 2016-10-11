<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('conn.php');

$result = $conn->query("SELECT round (avg(a.monthstocompletion),2)  months,
           round (avg(a.numberofpagestotal),2)  totalPages,
           round (avg(a.numberofpageswithoutappendices),2)  withoutAppendices,
           round (avg(a.numberoffigures),2)  figuresNum,
           round (avg(a.numberoftables),2)  tableNum,
           round (avg(a.numberofnumberedandcitedreferences),2)  referencesNum,
           round (avg(a.numberofbibliographydocuments),2)  bibliographyNum,
           round (avg(a.fractionofyearsnotenrolled),2) notEnrolled
         FROM dissertation a;");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"months":'  . $rs["months"] . ',';
    $outp .= '"totalPages":'   . $rs["totalPages"]        . ',';
    $outp .= '"withoutAppendices":'   . $rs["withoutAppendices"]        . ',';
    $outp .= '"figuresNum":'   . $rs["figuresNum"]        . ',';
    $outp .= '"tableNum":'   . $rs["tableNum"]        . ',';
    $outp .= '"referencesNum":'   . $rs["referencesNum"]        . ',';
    $outp .= '"bibliographyNum":'   . $rs["bibliographyNum"]        . ',';
    $outp .= '"notEnrolled":'. $rs["notEnrolled"]     . '}'; 
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>
