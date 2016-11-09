<?php //delete external publication, will show confirmation page
?>
<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $externalPublication->get($id);
?>
<h1>Delete External Publication</h1>
<div id="displayTable">
<h2>Are you sure you want to delete <?=$data['titleofexternalpublication'];?>?</h2>
<h3><a class="buttonLink" href="<?=$url_root?>/external_publication/index.php?del=<?=$data['id']?>">Yes</a> <a  class="buttonLink" href="<?=$url_root?>/external_publication/index.php">No</a></h3>
</div>

<?php include '../_include/footer.php'; ?>
