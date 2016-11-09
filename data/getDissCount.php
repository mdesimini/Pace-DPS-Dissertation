<?php
header("Access-Control-Allow-Origin: *");

//header("Content-Type: application/json; charset=UTF-8");
header("Content-Type: application/json; charset=ISO-8859-1");

require_once('conn.php');

$result = $conn->query("SELECT b.Name name,
       count(a.author) dissertations,
       round (avg(a.monthstocompletion / 12),2) yearsToCompletion,
       concat_ws(', ',
                 a.primarysubjectcategory,
                 a.secondarysubjectcategory,
                 a.tertiarysubjectcategory)
          subjectCategory,
       concat_ws(', ',
                 a.primarymethodused,
                 a.secondarymethodused,
                 a.tertiarymethodused)
          methodsUsed,
       (
             count(a.committeemember1)
           + count(a.committeemember2)
           + count(a.committeemember3)
           + count(a.committeemember4)
           + count(a.committeemember5))
          countAdv,
       (SELECT count(*)
          FROM externalpublication c
         WHERE    b.Name = c.author
               OR b.Name = c.authorcommitteemember1
               OR b.Name = c.authorcommitteemember2
               OR b.Name = c.authorcommitteemember3
               OR b.Name = c.authorcommitteemember4
               OR b.Name = c.authorcommitteemember5)
          numPub,
       (  count(a.primarysubjectcategory)
        + count(a.secondarysubjectcategory)
        + count(a.tertiarysubjectcategory))
          subCatCount,
       (  count(a.primarymethodused)
        + count(a.secondarymethodused)
        + count(a.tertiarymethodused))
          methUsedCount
  FROM dissertation a, committeemembers b
 WHERE b.Name = a.committeemember1
GROUP BY b.Name");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    
    $outp .= '{"name":"'  . $rs["name"] . '",';
    $outp .= '"dissertations":'   . $rs["dissertations"]        . ',';
    $outp .= '"yearsToCompletion":'   . $rs["yearsToCompletion"]        . ',';
    $outp .= '"subjectCategory":"'   . $rs["subjectCategory"]        . '",';
    $outp .= '"methodsUsed":"'   . $rs["methodsUsed"]        . '",';
    $outp .= '"countAdv":'   . $rs["countAdv"]        . ',';
    $outp .= '"numPub":'   . $rs["numPub"]        . ',';
    $outp .= '"subCatCount":'   . $rs["subCatCount"]        . ',';
    $outp .= '"methUsedCount":'. $rs["methUsedCount"]     . '}'; 
}

$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);

?>