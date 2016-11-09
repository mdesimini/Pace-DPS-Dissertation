<?php //dissertation listing
?>
<?php include '../_include/head.php'; ?>
<?php

if(isset($_POST['authorid']))
{
    $dissertation->modify($_POST['authorid'],$_POST);
}
elseif(isset($_POST['dissertationtitle']))
{
    
    $dissertation->create($_POST);
}
elseif(isset($_REQUEST['del']))
{
    $dissertation->delete($_REQUEST['del']);
}


$data = $dissertation->listing();
?>

<h1>
Disseration Listing
</h1>


<input type="text" id="filter" placeholder="Search Dissertations" class="form-control" style="width: 85%; margin: 0 auto; border-radius: 0px;">
<table id="dissManagementTable" class="table table-striped" style="width: 85%; margin: 0 auto; border: 1px solid #ddd;">
    <thead>
		<tr>
		<th>
		Author Id
		</th>
		<th>
		Title
		</th>
		<th>
		Defense Date
		</th>
		<th>
		Author
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
		<?=$row['authorid']?>
		</td>
		<td>
		<?=$row['dissertationtitle']?>
		</td>
		<td>
		<?=$row['dateofsuccessfuldefense']?>
		</td>
		<td>
		<?=$row['author']?>
		</td>
		<td>
        <a href="<?=$url_root?>/dissertation/manage.php?id=<?=$row['authorid']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>            
		<a href="<?=$url_root?>/dissertation/delete.php?id=<?=$row['authorid']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		</td>
		</tr>
<?php endforeach; ?>
        </tbody>
		</table>

<script src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/js/jquery.tablesorter.min.js"></script>
<script>
$(document).ready(function(){
    $(function(){
        $("#dissManagementTable").tablesorter();
        console.log("sorted");
        $('#filter').keyup(function () {

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