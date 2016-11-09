<?php //delete person, will show confirmation page
?>
<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $person->get($id);


$stop = $dissertation->checkPerson($id);

if($stop)
    $stop .= $externalPublication->checkPerson($id);

?>
<h1>Delete Person</h1>
<div id="displayTable">
<?php if(!$stop): ?>    
<h2>Are you sure you want to delete <?=$data['Name'];?>?</h2>
<h3><a class="buttonLink" href="<?=$url_root?>/person/index.php?del=<?=$data['id']?>">Yes</a> <a  class="buttonLink" href="<?=$url_root?>/person/index.php">No</a></h3>
<?php else: ?>
<h2><?=$data['name'];?> cannot be deleted at this time.</h2>
<h3>This person is required for the following document(s):</h3>
<ul class="docList"><?=$stop?></ul>
<h4>Please replace them in the above document(s) in order to be able to remove them from the database.</h4>
<?php endif;?>

</div>

<?php include '../_include/footer.php'; ?>