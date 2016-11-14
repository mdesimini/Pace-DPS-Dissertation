<?php
// used to connect to the database

//$host = "localhost";
//$db_name = "f13-it691-s01";
//$username = "root";
//$password = "root";

$host = "localhost";
$db_name = "cs691-dps";
$username = "cs691-dps";
$password = "Xahcigh2up9j";

 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>