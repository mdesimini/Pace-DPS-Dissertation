<?php
ob_start();
include '../_include/core.php';

switch($_GET['obj'])
{
    case 'person':
        echo json_encode($person->autocomplete($_GET['term']));
        break;
    case 'external_publication':
        echo json_encode($externalPublication->autocomplete($_GET['term']));
        break;
    case 'dissertation':
        echo json_encode($dissertation->autocomplete($_GET['term']));
        break;
    case 'method':
        echo json_encode($method->autocomplete($_GET['term']));
        break;
    case 'category':
        echo json_encode($category->autocomplete($_GET['term']));
        break;
}

$out = ob_get_clean();

$out = str_replace("\n","",$out);

echo $out;
?>