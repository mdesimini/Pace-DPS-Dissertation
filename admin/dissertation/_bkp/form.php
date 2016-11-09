<form action="<?=$url_root?>/dissertation/index.php" method="post">

<table align="center">

		<tr><td><label>Title: </label></td>
		<td><input type="text" name="title" id="title" value="<?=(isset($data['title'])?$data['title']:'')?>"></td></tr>	
		<tr><td><label>Defense date: </label></td>
		<td><input type="text" name="defense_date" id="defense_date" value="<?=(isset($data['defense_date'])?$data['defense_date']:'')?>"></td></tr>
                <tr><td><label>Class year: </label></td>
		<td><input type="text" name="class_year" id="class_year" value="<?=(isset($data['class_year'])?$data['class_year']:'')?>"></td></tr>
                <tr><td><label>Author: </label></td>
		<td><input type="text" name="author_id" id="author_id" value="<?=(isset($data['author_id'])?$data['author_id']:'')?>"></td></tr>
                <tr><td><label>Advisor: </label></td>
		<td><input type="text" name="advisor_id" id="advisor_id" value="<?=(isset($data['advisor_id'])?$data['advisor_id']:'')?>"></td></tr>
		<tr><td><label>Committee member 1: </label></td>
		<td><input type="text" name="committee_1" id="committee_1" value="<?=(isset($data['committee_1'])?$data['committee_1']:'')?>"></td></tr>
                <tr><td><label>Committee member 2: </label></td>
		<td><input type="text" name="committee_2" id="committee_2" value="<?=(isset($data['committee_2'])?$data['committee_2']:'')?>"></td></tr>
                <tr><td><label>Committee member 3: </label></td>
		<td><input type="text" name="committee_3" id="committee_3" value="<?=(isset($data['committee_3'])?$data['committee_3']:'')?>"></td></tr>
		<tr><td><label>Subject category primary: </label></td>
		<td><input type="text" name="category_primary" id="category_primary" value="<?=(isset($data['category_primary'])?$data['category_primary']:'')?>"></td></tr>
		<tr><td><label>Subject category secondary: </label></td>
		<td><input type="text" name="category_secondary" id="category_secondary" value="<?=(isset($data['category_secondary'])?$data['category_secondary']:'')?>"></td></tr>
		<tr><td><label>Subject category tertiary: </label></td>
		<td><input type="text" name="category_tertiary" id="category_tertiary" value="<?=(isset($data['category_tertiary'])?$data['category_tertiary']:'')?>"></td></tr>
		<tr><td><label>Method used primary: </label></td>
		<td><input type="text" name="research_method_primary" id="research_method_primary" value="<?=(isset($data['research_method_primary'])?$data['research_method_primary']:'')?>"></td></tr>
		<tr><td><label>Method used secondary: </label></td>
		<td><input type="text" name="research_method_secondary" id="research_method_secondary" value="<?=(isset($data['research_method_secondary'])?$data['research_method_secondary']:'')?>"></td></tr>
		<tr><td><label>Method used tertiary: </label></td>
		<td><input type="text" name="research_method_tertiary" id="research_method_tertiary" value="<?=(isset($data['research_method_tertiary'])?$data['research_method_tertiary']:'')?>"></td></tr>
		<tr><td><label>Number of pages total: </label></td>
		<td><input type="text" name="num_pages_total" id="num_pages_total" value="<?=(isset($data['num_pages_total'])?$data['num_pages_total']:'')?>"></td></tr>
		<tr><td><label>Number of pages without appendices: </label></td>
		<td><input type="text" name="num_pages_wo_appendices" id="num_pages_wo_appendices" value="<?=(isset($data['num_pages_wo_appendices'])?$data['num_pages_wo_appendices']:'')?>"></td></tr>
		<tr><td><label>Number of figures: </label></td>
		<td><input type="text" name="num_figures" id="num_figures" value="<?=(isset($data['num_figures'])?$data['num_figures']:'')?>"></td></tr>
		<tr><td><label>Number of tables: </label></td>
		<td><input type="text" name="num_tables" id="num_tables" value="<?=(isset($data['num_tables'])?$data['num_tables']:'')?>"></td></tr>
		<tr><td><label>Number of cited references: </label></td>
		<td><input type="text" name="num_cited_references" id="num_cited_references" value="<?=(isset($data['num_cited_references'])?$data['num_cited_references']:'')?>"></td></tr>
		<tr><td><label>Number of bibliography references: </label></td>
		<td><input type="text" name="num_bibliography_docs" id="num_bibliography_docs" value="<?=(isset($data['num_bibliography_docs'])?$data['num_bibliography_docs']:'')?>"></td></tr>
		<tr><td><label>Title of external publication 1: </label></td>
		<td><input type="text" name="external_pub_1" id="external_pub_1" value="<?=(isset($data['external_pub_1'])?$data['external_pub_1']:'')?>"></td></tr>
		<tr><td><label>Title of external publication 2: </label></td>
		<td><input type="text" name="external_pub_2" id="external_pub_2" value="<?=(isset($data['external_pub_2'])?$data['external_pub_2']:'')?>"></td></tr>
                
	</table>
	
	<p align="center">
                 <?php if(isset($data['id'])): ?>
                <input type="hidden" name="id" id="id" value="<?=$data['id'];?>"/>
            <?php endif; ?>
		<input type="submit" name="submit" id="submit" class="buttonSubmit" value="Submit" />
		</p>  
</form>