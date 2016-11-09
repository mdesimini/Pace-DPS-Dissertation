<?php 

class dissertation extends _object_base
{
    function __construct()
    {
        $this->fields = array('authorid',
                             'dissertationtitle',
                             'dateofsuccessfuldefense',
                             'classyear',
                             'author',
                             'earlieradvisor1',
                             'earlieradvisor2',
                             'numberofpagestotal',
                             'numberofpageswithoutappendices',
                             'numberoffigures',
                             'numberoftables',
                             'numberofnumberedandcitedreferences',
                             'numberofbibliographydocuments',
                             'monthstocompletion',
                             'fractionofyearsnotenrolled',
                             'primarymethodused',
                             'secondarymethodused',
                             'tertiarymethodused',
                             'titleofexternalpublication1',
                             'titleofexternalpublication2',							 
                             'committeemember1',
                             'committeemember2',
                             'committeemember3',
                             'committeemember4',
                             'committeemember5',
                             'primarysubjectcategory',
                             'secondarysubjectcategory',
                             'tertiarysubjectcategory',
			     'abstract');
       
	   $this->personFieldsRequired = array(
                             'authorid',
                             'committeemember1');
      
        $this->idField = 'authorid';
        $this->lookupField = 'dissertationtitle';
        $this->tableName = 'dissertation';
    }
    
  
        
        
        
}
    


?>