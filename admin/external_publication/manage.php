<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id']; 
$data = $externalPublication->get($id);
?>
<h1>Manage External Publication</h1>

<?php include 'form.php'; ?>

<?php include '../_include/footer.php'; ?>    