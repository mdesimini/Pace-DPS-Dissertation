<?php 

class _object_base
{
    var $fields;
    var $idField;
    var $lookupField;
    var $tableName;
    
    function __construct()
    {
        $this->fields = array();
        $this->idField = '';
        $this->lookupField = '';
        $this->tableName = '';
    }
    
    
    function create($data=false)
    {
        global $db;
        
        if(!$data) return false;
        
        $create = array();
        
        foreach($this->fields as $field)
        {
            if(isset($data[$field])&&$data[$field]!==false&&$field!=$this->idField)
            {
                $create[$field] = $data[$field];
                unset($data[$field]);
            }
        }
        
        $result = $db->insert($this->tableName,$create);
        
        return $db->lastID();
    }
    
    function modify($id=false,$data=false)
    {
        global $db;
        
        if(!$id||!$data) return false;
        
        $id = $db->clean($id,'int');
        $data = $db->clean($data);
        
        $update = array();
        
        $fields = $this->fields;
        
        foreach($fields as $key => $field)
        {
            if(isset($data[$field])&&$data[$field]!==false&&$field!=$this->idField)
            {
                $update[$field] = $data[$field];
                unset($data[$field]);
                unset($fields[$key]);
            }
        }
        
        foreach($fields as $field)
        {
            if($field!=$this->idField)
            {
                $update[$field] = 'null';
            }
        }
        
        
        
        $where = $this->idField."='".$id."'";
        
        return $db->update($this->tableName,$update,$where);
        
    }
    
    function delete($id=false)
    {
        global $db;
        
        if(!$id) return false;
        
        $id = $db->clean($id,'int');
        
        $sql = 'DELETE FROM '.$this->tableName.' WHERE '.$this->idField.'='.$id;
        
        $result = $db->query($sql);
        
        return $result;
        
    }
    
    
    function lookup($string=false,$field=false)
    {
        global $db;
        
        if(!$string) return null;
        $string = $db->clean($string);
        if($field)
            $field = $db->clean($field);
        else
            $field = $this->lookupField;
        
        if(trim($string)=='') return null;
        
        $sql = 'SELECT '.$field.' label, '.$this->idField.' id  FROM '.$this->tableName.' WHERE TRIM(LOWER('.$field.')) LIKE TRIM(LOWER("%'.$string.'%"))';
        
        $result = $db->query($sql);
        
        if($db->numRows($result))
        {
            $data = $db->getRow($result);
            return $data['id'];
        }
        
        $create = array();
        $create[$this->lookupField] = $string;
        
        return $this->create($create);
    }
    
    function autocomplete($string=false,$field=false)
    {
        global $db;
        if(!$string) return false;
        
        $string = $db->clean($string);
        if($field)
            $field = $db->clean($field);
        else
            $field = $this->lookupField;
        
        $sql = 'SELECT '.$field.' value, '.$field.' label  FROM '.$this->tableName.' WHERE TRIM(LOWER('.$field.')) LIKE TRIM(LOWER("%'.$string.'%"))';
        
        $result = $db->query($sql);
        
        if(!$result) return false;
        
        $out = $db->getResultArray($result);
        
        return $out;
    }
    
    function listing($start=false,$end=false,$orderBy=false,$orderDir=false,$where=false,$fields=false)
    {
        global $db;
        
        //@TODO: implement limiters and ordering
        $sql = 'SELECT * FROM '.$this->tableName.';';
        
        $result = $db->query($sql);
        
        if(!$result) return false;
        
        return $db->getResultArray($result);
    }
    
    function get($id=false)
    {
        global $db;
        
        if(!$id) return false;
        
        $id = $db->clean($id,'int');
        
        $sql = 'SELECT * FROM '.$this->tableName.' WHERE '.$this->idField.'='.$id;
        
        $result = $db->query($sql);
        
        if(!$result) return false;
        
        return $db->getRow($result);
    }
    
    function getName($id=false)
    {
        global $db;
        
        if(!$id) return false;
        
        $id = $db->clean($id,'int');
        
        $sql = 'SELECT * FROM '.$this->tableName.' WHERE '.$this->idField.'='.$id;
        
        $result = $db->query($sql);
        
        if(!$result) return false;
        
        $data = $db->getRow($result);
        
        if(!$data||!isset($data[$this->lookupField])) return false;
        
        return $data[$this->lookupField];
    }
    

    function checkadmin($username,$password)
    {
            
        global $db;


        
        foreach($this->personFields as $field)
        {
            $sql = "SELECT * FROM ".$this->tableName." where ".$field."='".$username."' and ".$field."='".$password."'";
            
            $result = $db->query($sql);
        
        if(!$result) return false;
        
        $data = $db->getResultArray($result);

	if (!$data) return false;

	return $_SESSION['auth'] = true;
        }

        
      
	        
        
    }


    function deletePerson($id)
    {
        global $db;
        
        if(!isset($this->personFields)||(isset($this->personFields)&&!sizeof($this->personFields)))
                return true;
        
        foreach($this->personFields as $field)
        {
            $sql = 'UPDATE '.$this->tableName.' SET '.$field.'=null WHERE '.$field."='".$id."'";
            
            $db->query($sql);
        }
        
    }
    
    function checkPerson($id)
    {
        global $db;
        
        if(!isset($this->personFieldsRequired)||(isset($this->personFieldsRequired)&&!sizeof($this->personFieldsRequired)))
                return false;
        
        $out = '';
        
        foreach($this->personFields as $field)
        {
            $sql = 'SELECT * FROM '.$this->tableName.' WHERE '.$field."='".$id."'";
            
            $res = $db->query($sql);
            
            $data = $db->getResultArray($res);
            
            foreach($data as $row)
                $out .= '<li><a href="'.URL_ROOT.'/dissertation/manage.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
            
        }
        
        if($out=='') return false;
        
        return $out;
    }
}

?>
