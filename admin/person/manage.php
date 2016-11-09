<?php include '../_include/head.php'; ?>
<?php
$id = $_REQUEST['id'];
$data = $person->get($id);
?>
<h1>Manage Person</h1>

<?php include 'form.php'; ?>

<?php include '../_include/footer.php'; ?>