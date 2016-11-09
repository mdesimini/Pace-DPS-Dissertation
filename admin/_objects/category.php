<?php

class category extends _object_base
{
    function __construct()
    {
        $this->fields = array('id','name');
        $this->idField = 'id';
        $this->lookupField = 'name';
        $this->tableName = 'category';
    }
    
}


?>




