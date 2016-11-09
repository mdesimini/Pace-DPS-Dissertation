<form action="<?=$url_root?>/person/index.php" method="post">
	<p align="center">
		<label>Name: 
		<input type="text" placeholder="Last Name, First Name" name="Name" id="Name" class="form-control" value="<?=(isset($data['Name'])?$data['Name']:'')?>"/></label>
        </p>
        <p align="center">
                <label>Institution: 
                <input type="text" name="Institution" id="Institution" class="form-control" value="<?=(isset($data['Institution'])?$data['Institution']:'')?>"/></label>
        </p>
        
	<p class="submit" align="center">
            <?php if(isset($data['id'])): ?>
                <input type="hidden" name="id" id="id" value="<?=$data['id'];?>"/>
            <?php endif; ?>
		<input type="submit" name="submit" id="submit" class="btn btn-default" value="Submit" />
	</p>
</form>