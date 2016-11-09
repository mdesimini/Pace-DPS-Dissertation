<?php 

class externalPublication extends _object_base
{
    function __construct()
    {
        $this->fields = array('id',
            'titleofexternalpublication',
            'author',
            'othercitinginformation',
            'authorcommitteemember1',
            'authorcommitteemember2',
            'authorcommitteemember3',
            'authorcommitteemember4',
            'authorcommitteemember5');
        
       /* $this->personFields = array('author',
                            'othercitinginformation',
                            'authorcommitteemember1',
                            'authorcommitteemember2',
                            'authorcommitteemember3',
                            'authorcommitteemember4',
                            'authorcommitteemember5');
        
        $this->personFieldsRequired = array(
                             'author');
        
        */
        $this->idField = 'id';
        $this->lookupField = 'titleofexternalpublication';
        $this->tableName = 'externalpublication';
    }
    

        
        
        
        
}

?>