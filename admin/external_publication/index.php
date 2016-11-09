<?php //external publication listing
?>
<?php include '../_include/head.php'; ?>
<?php

if(isset($_POST['id']))
{
    $externalPublication->modify($_POST['id'],$_POST);
}
elseif(isset($_POST['titleofexternalpublication']))
{
    
    $externalPublication->create($_POST);
}
elseif(isset($_REQUEST['del']))
{
    $externalPublication->delete($_REQUEST['del']);
}


$data = $externalPublication->listing();
?>
<h1>External Publication Listing</h1>

<input type="text" id="filter2" placeholder="Search External Publications" class="form-control" style="width: 85%; margin: 0 auto; border-radius: 0px;">
<table id="exPubManagementTable" class="table table-striped" style="width: 85%; margin: 0 auto; border: 1px solid #ddd;">
    <thead>
		<tr>
		<th>
		Publication Id
		</th>
		<th>
		Title
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
		<?=$row['id']?>
		</td>
		<td>
		<?=$row['titleofexternalpublication']?>
		</td>
		<td>
		<?=$row['author']?>
		</td>
		<td>
        <a href="<?=$url_root?>/external_publication/manage.php?id=<?=$row['id']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>            
		<a href="<?=$url_root?>/external_publication/delete.php?id=<?=$row['id']?>"><span style="margin-left: 5px; margin-right: 5px;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                
		</td>
		</tr>
<?php endforeach; ?>	
		</tbody>
		</table>

<!-- <script src="http://tutsme-webdesign.info/tutorials/tablesorter/jquery.tablesorter.min.js"></script>  -->
<script src="https://vulcan.seidenberg.pace.edu/~f15-cs691-dps/dps/js/jquery.tablesorter.min.js"></script>
<script>
    
$(document).ready(function(){
$(function(){
    $("#exPubManagementTable").tablesorter();
    console.log("sorted");
        $('#filter2').keyup(function () {

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