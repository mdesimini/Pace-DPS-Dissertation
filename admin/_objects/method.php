<?php

class method extends _object_base
{
    function __construct()
    {
        $this->fields = array('id','title');
        $this->idField = 'id';
        $this->lookupField = 'title';
        $this->tableName = 'method';
    }
}

?>
