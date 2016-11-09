<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $person->get($id);

$dissertationData = $dissertation->checkPerson($id);

$externalPublicationData = $externalPublication->checkPerson($id);

?>
<h1><?=$data['name']?></h1>
<br>
<div style="width:600px;margin:auto;">
<?php if($dissertationData): ?>
<h3>Dissertations Authored or Advised</h3>
<ul>
    <?=$dissertationData?>
</ul>
<br>
<?php endif; ?>


<?php if($externalPublicationData): ?>
<h3>External Publications Authored</h3>
<ul>
    <?=$externalPublicationData?>
</ul>
<br>
<?php endif; ?>


<center>
<h3><a href="manage.php?id=<?=$data['id']?>">Edit Profile Data</a></h3>
</center>
</div>
<?php include '../_include/footer.php'; ?>