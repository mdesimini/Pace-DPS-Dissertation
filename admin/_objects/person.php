<?php

class person extends _object_base
{
    function __construct()
    {
        $this->fields = array('id','Name','Institution');
        $this->personFields = array();
        $this->idField = 'id';
        $this->lookupField = 'Name';
        $this->tableName = 'committeemembers';
    }
    

        
        
}

?>
