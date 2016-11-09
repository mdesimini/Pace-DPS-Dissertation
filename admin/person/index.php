<?php //person listing 
?>
<?php include '../_include/head.php'; ?>
<?php

if(isset($_POST['id']))
{
    $person->modify($_POST['id'],$_POST);
}
elseif(isset($_POST['Name']))
{
    $person->create($_POST);
}
elseif(isset($_REQUEST['del']))
{
    $person->delete($_REQUEST['del']);
}


$data = $person->listing();
?>
<h1>Advisor Listing</h1>

<input type="text" id="filter3" placeholder="Search Advisors" class="form-control" style="width: 85%; margin: 0 auto; border-radius: 0px;">
<table id="authorManagementTable" class="table table-striped" style="width: 85%; margin: 0 auto; border: 1px solid #ddd;">
    <thead>
<tr>
<th>
Advisor Id
</th>
<th>
Name
</th>
<th>
Institution
</th>
<th>
Actions
</th>
</tr>
    </thead>
    <tbody class="searchable">
<?php foreach($data as $row): ?>
<tr>
<td>
<?=$row['id']?>
</td>
<td>
<?=$row['Name']?>
</td>
<td>
<?=$row['Institution']?>
</td>
<td>
    <a href="<?=$url_root?>/person/manage.php?id=<?=$row['id']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
    <a href="<?=$url_root?>/person/delete.php?id=<?=$row['id']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
</td>
</tr>
<?php endforeach; ?>
        </tbody>
</table>

<script src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/js/jquery.tablesorter.min.js"></script>
<script>
    
$(document).ready(function(){
$(function(){
    $("#authorManagementTable").tablesorter();
    console.log("sorted");
        $('#filter3').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        });    
});
});
</script>

<?php include '../_include/footer.php'; ?>