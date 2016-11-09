<?php //delete dissertation, will show confirmation page
?>
<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $dissertation->get($id);
?>
<h1>Delete Dissertation</h1>
<div id="displayTable">
<h2>Are you sure you want to delete <?=$data['dissertationtitle'];?>?</h2>
<h3><a class="buttonLink" href="<?=$url_root?>/dissertation/index.php?del=<?=$data['authorid']?>">Yes</a> <a  class="buttonLink" href="<?=$url_root?>/dissertation/index.php">No</a></h3>
</div>

<?php include '../_include/footer.php'; ?>