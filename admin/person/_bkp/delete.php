<?php //delete person, will show confirmation page
?>
<?php include '../_include/head.php'; ?>

<h1>Delete Person</h1>

<?php 

$id = $_GET['id'];

$name = '';
$thisPerson = $db->query("SELECT * from committeemembers LIMIT ". $id .", 1");

while($personInfo = @mysql_fetch_array($thisPerson)) {
	$name = $personInfo['Name'];
}

$person->delete($name,$db);

echo($name." has been deleted.");

?>

<?php include '../_include/footer.php'; ?>