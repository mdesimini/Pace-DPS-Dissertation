    
<form action="<?=$url_root?>/dissertation/index.php" method="post" style="width: 25%; margin: 0 auto; " >

    <div class="form-group">
        <label>Title: </label>
		<input type="text" class="form-control" name="dissertationtitle" id="dissertationtitle" value="<?=(isset($data['dissertationtitle'])?$data['dissertationtitle']:'')?>"><font color="red">*</font>Dissertation Title    
    </div>
    
    <div class="form-group">
        <label>Defense date: </label>
        <input type="text" placeholder="YYYY-MM-DD" class="form-control" name="dateofsuccessfuldefense" id="dateofsuccessfuldefense" value="<?=(isset($data['dateofsuccessfuldefense'])?$data['dateofsuccessfuldefense']:'')?>">    
    </div>
    
    <div class="form-group">
        <label>Class year: </label>
		<input type="text"  class="form-control" name="classyear" id="classyear" value="<?=(isset($data['classyear'])?$data['classyear']:'')?>"><font color="red">*</font>Class year        
    </div>
    
    <div class="form-group">
        <label>Author: </label>
		<input type="text" class="form-control" name="author" id="author" value="<?=(isset($data['author'])?$data['author']:'')?>" > <font color="red">*</font>Last Name, First Name    
    </div>
    
    <div class="form-group">
        <label>Fraction Year Not Enrolled: </label>
		<input type="text" class="form-control" name="fractionofyearsnotenrolled" id="fractionofyearsnotenrolled" value="<?=(isset($data['fractionofyearsnotenrolled'])?$data['fractionofyearsnotenrolled']:'')?>">    
    </div>
    
    <div class="form-group">
        <label>Months to Completion: </label>
		<input type="text" class="form-control" name="monthstocompletion" id="monthstocompletion" value="<?=(isset($data['monthstocompletion'])?$data['monthstocompletion']:'')?>">    
    </div>
    
    <div class="form-group">
        <label>Advisor: </label>
		<input type="text" class="form-control" name="committeemember1" id="committeemember1" value="<?=(isset($data['committeemember1'])?$data['committeemember1']:'')?>">    
    </div>
    
    <div class="form-group">
        <label>Committee member 2: </label>
		<input type="text" class="form-control" name="committeemember2" id="committeemember2" value="<?=(isset($data['committeemember2'])?$data['committeemember2']:'')?>" >    
    </div>
    
    <div class="form-group">
        <label>Committee member 3: </label>
		<input type="text" class="form-control" name="committeemember3" id="committeemember3" value="<?=(isset($data['committeemember3'])?$data['committeemember3']:'')?>" >    
    </div>
    
    <div class="form-group">
        <label>Committee member 4: </label>
		<input type="text" class="form-control" name="committeemember4" id="committeemember4" value="<?=(isset($data['committeemember4'])?$data['committeemember4']:'')?>" >    
    </div>
    
    <div class="form-group">
        <label>Committee member 5: </label>
		<input type="text" class="form-control" name="committeemember5" id="committeemember5" value="<?=(isset($data['committeemember5'])?$data['committeemember5']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Subject category primary: </label>
				<input type="text" class="form-control" name="primarysubjectcategory" id="primarysubjectcategory" value="<?=(isset($data['primarysubjectcategory'])?$data['primarysubjectcategory']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Subject category secondary: </label>
				<input type="text" class="form-control" name="secondarysubjectcategory" id="secondarysubjectcategory" value="<?=(isset($data['secondarysubjectcategory'])?$data['secondarysubjectcategory']:'')?>" >
    
    </div>
    
    <div class="form-group">
				<label>Subject category tertiary: </label>
				<input type="text" class="form-control" name="tertiarysubjectcategory" id="tertiarysubjectcategory" value="<?=(isset($data['tertiarysubjectcategory'])?$data['tertiarysubjectcategory']:'')?>" >    
    </div>
    
    <div class="form-group">
    				<label>Method used primary: </label>
				<input type="text"class="form-control" name="primarymethodused" id="primarymethodused" value="<?=(isset($data['primarymethodused'])?$data['primarymethodused']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Method used secondary: </label>
				<input type="text" class="form-control" name="secondarymethodused" id="secondarymethodused" value="<?=(isset($data['secondarymethodused'])?$data['secondarymethodused']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Method used tertiary: </label>
				<input type="text" class="form-control" name="tertiarymethodused" id="tertiarymethodused" value="<?=(isset($data['tertiarymethodused'])?$data['tertiarymethodused']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Number of pages total: </label>
				<input type="text" class="form-control" name="numberofpagestotal" id="numberofpagestotal" value="<?=(isset($data['numberofpagestotal'])?$data['numberofpagestotal']:'')?>">    
    </div>
    
    <div class="form-group">
				<label>Number of pages without appendices: </label>
				<input type="text"class="form-control"  name="numberofpageswithoutappendices" id="numberofpageswithoutappendices" value="<?=(isset($data['numberofpageswithoutappendices'])?$data['numberofpageswithoutappendices']:'')?>">    
    </div>
    
    <div class="form-group">
				<label>Number of figures: </label>
				<input type="text" class="form-control" name="numberoffigures" id="numberoffigures" value="<?=(isset($data['numberoffigures'])?$data['numberoffigures']:'')?>">    
    </div>
    
    <div class="form-group">
				<label>Number of tables: </label>
				<input type="text" class="form-control" name="numberoftables" id="numberoftables" value="<?=(isset($data['numberoftables'])?$data['numberoftables']:'')?>">    
    </div>
    
    <div class="form-group">
				<label>Number of cited references: </label>
				<input type="text" class="form-control" name="numberofnumberedandcitedreferences" id="numberofnumberedandcitedreferences" value="<?=(isset($data['numberofnumberedandcitedreferences'])?$data['numberofnumberedandcitedreferences']:'')?>">    
    </div>
    
    <div class="form-group">
				<label>Number of bibliography references: </label>
				<input type="text" class="form-control" name="numberofbibliographydocuments" id="numberofbibliographydocuments" value="<?=(isset($data['numberofbibliographydocuments'])?$data['numberofbibliographydocuments']:'')?>">    
    </div>
    
    <div class="form-group">
    				<label>Title of external publication 1: </label>
				<input type="text" class="form-control" name="titleofexternalpublication1" id="titleofexternalpublication1" value="<?=(isset($data['titleofexternalpublication1'])?$data['titleofexternalpublication1']:'')?>" >    
    </div>
    
    <div class="form-group">
				<label>Title of external publication 2: </label>
				<input type="text" class="form-control" name="titleofexternalpublication2" id="titleofexternalpublication2" value="<?=(isset($data['titleofexternalpublication2'])?$data['titleofexternalpublication2']:'')?>" >    
    </div>     
    
    <div class="form-group">
    				<label>Abstract </label>
				<textarea name="abstract" class="form-control" id="abstract" rows="5" cols="30" > <?=(isset($data['abstract'])?$data['abstract']:'') ?> </textarea>
				 
				<?php
				
				 $abstract = mysql_real_escape_string($abstract);
				?>    
    </div>    
    
    
	<p align="center">
    	<?php if(isset($data['authorid'])): ?>
        	<input type="hidden" name="authorid" id="authorid" value="<?=$data['authorid'];?>"/>
        <?php endif; ?>
		<input type="submit" name="submit" id="submit" class="btn btn-default" value="Submit" onClick="return validateForm();" />
	</p>  
	
</form>

<script type="text/javascript">

   // var test = [ { label: "Choice1", value: "value1" };

	$(function () {
                $( "#dateofsuccessfuldefense" ).datepicker({ dateFormat: "yy-mm-dd" });
            
		$('.ac-person').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=person',
			minLength: 1
		});
		
		$('.ac-method').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=method',
			minLength: 1
		});
		
		$('.ac-external-pub').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=external_publication',
			minLength: 1
		});
		
		$('.ac-category').autocomplete({
			source: '<?=$url_root?>/_ajax/autocomplete.php?obj=category',
			minLength: 1
		});
	});

	function validateForm()
	{
	 if (document.getElementById("dissertationtitle").value == "")
  	 {
     	 alert("Please enter dissertation title");
     	 return false;
  	 }

   	if (document.getElementById("author").value == "")
  	 {
     	 alert("Please enter author name");
     	 return false;
  	 }
  	 
	 if (document.getElementById("classyear").value == "")
  	 {
     	 alert("Please enter classyear ");
     	 return false;
  	 }
   	return true;

	}
</script>