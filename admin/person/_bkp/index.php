<?php //person listing
?>
<?php include '../_include/head.php'; ?>

<h1>People Listing</h1>

<div style="position: relative;">
	
<?php
$allPeople = $person->listAll($db);

echo"<table id='person-listing' cellspacing='5' cellpadding='5' border='1' style='position: absolute; right: 10%; width: 80%; text-align: center;'>
		<thead>
            <tr class='head'>
            	<th style='width:33.3%;'>Name</th>
            	<th style='width:33.3%;'>Institution</th>
            	<th style='width:33.3%;'>Actions</th>
        	</tr>
    	</thead>
	<tbody>";

$i = 0;

while($row = @mysql_fetch_array($allPeople)) {
	echo"<tr class='body'>";
	echo"<td>". $row['Name'] ."</td>";
	echo"<td>". $row['Institution'] ."</td>";
	echo"<td>
		<a href='delete.php?id=". $i ."'>Delete ". $row['Name'] ."</a>
	</td>";
	echo"</tr>";
	
	$i++;
}
	
echo"</tbody></table>";
?>

</div>

<?php include '../_include/footer.php'; ?>