<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");  

require_once('conn.php');

$variable = $_GET['authid']; 


$result = $conn->query("SELECT author, dissertationtitle, classyear, dateofsuccessfuldefense, monthstocompletion, committeemember1, fractionofyearsnotenrolled, committeemember2, committeemember3, committeemember4, committeemember5, primarysubjectcategory, secondarysubjectcategory, tertiarysubjectcategory, primarymethodused, secondarymethodused, tertiarymethodused, numberofpagestotal, numberofpageswithoutappendices, numberoffigures, numberoftables, numberofnumberedandcitedreferences, numberofbibliographydocuments, titleofexternalpublication1, titleofexternalpublication2, abstract FROM dissertation WHERE authorid = " . $variable);



$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"author":"'  . $rs["author"] . '",';
    $outp .= '"dissertationtitle":"'   . $rs["dissertationtitle"]        . '",';
    $outp .= '"classyear":'   . $rs["classyear"]        . ',';
    $outp .= '"dateofsuccessfuldefense":"'   . $rs["dateofsuccessfuldefense"]        . '",';
    $outp .= '"monthstocompletion":'   . $rs["monthstocompletion"]        . ',';
    $outp .= '"fractionofyearsnotenrolled":"'   . $rs["fractionofyearsnotenrolled"]        . '",';
    $outp .= '"committeemember2":"'   . $rs["committeemember2"]        . '",';
    $outp .= '"committeemember3":"'   . $rs["committeemember3"]        . '",';
    $outp .= '"committeemember4":"'   . $rs["committeemember4"]        . '",';
    $outp .= '"committeemember5":"'   . $rs["committeemember5"]        . '",';
    $outp .= '"primarysubjectcategory":"'   . $rs["primarysubjectcategory"]        . '",';
    $outp .= '"secondarysubjectcategory":"'   . $rs["secondarysubjectcategory"]        . '",';
    $outp .= '"tertiarysubjectcategory":"'   . $rs["tertiarysubjectcategory"]        . '",';
    $outp .= '"primarymethodused":"'   . $rs["primarymethodused"]        . '",';
    $outp .= '"secondarymethodused":"'   . $rs["secondarymethodused"]        . '",';
    $outp .= '"tertiarymethodused":"'   . $rs["tertiarymethodused"]        . '",';
    $outp .= '"numberofpagestotal":"'   . $rs["numberofpagestotal"]        . '",';
    $outp .= '"numberofpageswithoutappendices":"'   . $rs["numberofpageswithoutappendices"]        . '",';
    $outp .= '"numberoffigures":"'   . $rs["numberoffigures"]        . '",';
    $outp .= '"numberoftables":"'   . $rs["numberoftables"]        . '",';
    $outp .= '"numberofnumberedandcitedreferences":"'   . $rs["numberofnumberedandcitedreferences"]        . '",';
    $outp .= '"numberofbibliographydocuments":"'   . $rs["numberofbibliographydocuments"]        . '",';
    $outp .= '"titleofexternalpublication1":"'   . $rs["titleofexternalpublication1"]        . '",';
    $outp .= '"titleofexternalpublication2":"'   . $rs["titleofexternalpublication2"]        . '",';
    //$outp .= '"abstract":"'   . $rs["abstract"]        . '",';
    $outp .= '"committeemember1":"'. $rs["committeemember1"]     . '"}'; 
    
    
    
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);


?>