<form action="<?=$url_root?>/external_publication/index.php" method="post">
    
 <table align="center">
	<tr>
                <td>
                        <label>Title: </label>
                </td>
                <td>
                        <input type="text" class="form-control" name="titleofexternalpublication" id="titleofexternalpublication" value="<?=(isset($data['titleofexternalpublication'])?$data['titleofexternalpublication']:'')?>">
                </td>
        </tr> 
        <tr>
                <td>
                        <label>Author: </label>
                </td>
                <td>
                        <input type="text" class="form-control" placeholder="Last Name, First Name" name="author" id="author" value="<?=(isset($data['author'])?$data['author']:'')?>">
                </td>
        </tr>
        
        
		<tr>
			<td>
				<label>Committee member 1: </label>
			</td>
			<td>
				<input type="text" class="form-control" name="authorcommitteemember1" id="authorcommitteemember1" value="<?=(isset($data['authorcommitteemember1'])?$data['authorcommitteemember1']:'')?>" >
			</td>
		</tr>
        
		<tr>
			<td>
				<label>Committee member 2: </label>
			</td>
			<td>
				<input type="text" class="form-control" name="authorcommitteemember2" id="authorcommitteemember2" value="<?=(isset($data['authorcommitteemember2'])?$data['authorcommitteemember2']:'')?>" >
			</td>
		</tr>
		
        <tr>
			<td>
				<label>Committee member 3: </label>
			</td>
			<td>
				<input type="text" class="form-control" name="authorcommitteemember3" id="authorcommitteemember3" value="<?=(isset($data['authorcommitteemember3'])?$data['authorcommitteemember3']:'')?>" >
			</td>
		</tr>
                <tr>
			<td>
				<label>Committee member 4: </label>
			</td>
			<td>
				<input type="text" class="form-control" name="authorcommitteemember4" id="authorcommitteemember4" value="<?=(isset($data['authorcommitteemember4'])?$data['authorcommitteemember4']:'')?>" >
			</td>
		</tr>
                <tr>
			<td>
				<label>Committee member 5: </label>
			</td>
			<td>
				<input type="text" class="form-control" name="authorcommitteemember5" id="authorcommitteemember5" value="<?=(isset($data['authorcommitteemember5'])?$data['authorcommitteemember5']:'')?>" >
			</td>
		</tr>
                <!--    <tr>
               <td>
                        <label>Dissertation: </label>
                </td>
                <td>    
                       <?php if(isset($data['id'])): ?> 
                                <input type="hidden" name="id" id="id" value="<?=$data['id'];?>"/>
                        <?php endif; ?>
                        <input type="text" name="id" id="id" value="<?=(isset($data['id'])?$data['id']:'')?>" >
                </td>
        </tr>  -->   
                
                  
	   		<tr>
	   <td><label>Other citing information: </label></td>
		<td><textarea name="othercitinginformation" class="form-control" id="othercitinginformation"><?=(isset($data['othercitinginformation'])?$data['othercitinginformation']:'')?></textarea>
                    </td></tr>
	</table>
			<p align="center">
    	<?php if(isset($data['id'])): ?>
        	<input type="hidden" name="id" id="id" value="<?=$data['id'];?>"/>
        <?php endif; ?>
		<input type="submit" name="submit" id="submit" class="btn btn-default" value="Submit" />
		</p>   
    
    
</form>


<script type="text/javascript">
	$(function () {
		$('.ac-person').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=person',
			minLength: 1
		});
		
		$('.ac-dissertation').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=dissertation',
			minLength: 1
		});
	});
</script>