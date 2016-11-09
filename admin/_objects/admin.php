<?php

class admin extends _object_base
{
    function __construct()
    {
        $this->fields = array('id','username','password');
        $this->personFields = array('username','password');
        $this->idField = 'id';
        $this->lookupField = 'username';
        $this->tableName = 'admin';
    }
    

        
        
}

?>
