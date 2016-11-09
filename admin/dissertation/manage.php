<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $dissertation->get($id);
?>
<h1>Manage Dissertation</h1>

<?php include 'form.php'; ?>

<?php include '../_include/footer.php'; ?>