<?php 

class database
{
   var $connection = null; 
   var $result = null;
   var $data = false;
   var $sql = null;
    
   function connect($host,$user,$pass)
   {
       $this->connection = mysql_connect($host, $user, $pass);
        if (!$this->connection) {
                die('Could not connect: ' . mysql_error());
        }
   }
   
   function setDB($name)
   {
        mysql_select_db($name, $this->connection);
   }
   
   function query($sql)
   {
       return $this->result = mysql_query($sql);
   }
   
   function clean($data,$type=false)
   {
       //@TODO: recursively escape and clean data
       //@TODO: type - int, string, ext. false is no special cleaning
       return $data;
   }
   
   function getRow($result=false)
   {
       if(!$result||is_null($result)) return false;
       
       return mysql_fetch_assoc($result);
   }
   
   
   function getResultArray($result=false)
   {
       if(!$result||is_null($result)) return false;
       
       $data = array();
       while($row=mysql_fetch_assoc($result))
           $data[] = $row;
       
       return $this->data = $data;
       
   }
   
   
   function insert($table=false,$data=false)
    {
        if(!$table)
            return false;

        $insertSQL = 'INSERT INTO '.$table.' SET ';


        $insertFields = array();
        foreach($data as $name => $value)
        {
            
            $insertFields[] = " ".$name."='".$this->clean($value)."' ";
        }

        $insertSQL .= implode(' , ',$insertFields);

        $this->sql =  $insertSQL;

        //if(!self::query($insertSQL,$connection)) return false;
        //@DEV
        if($this->query($insertSQL)) return false;
        
        return ($this->lastID($connection)?$this->lastID($connection):true);
    }
    
    function delete($table=false,$where=false,$limit=false)
    {
        $deleteSQL = "DELETE FROM ".$table." ";
        
        if(!is_array($where))
            $deleteSQL .= " WHERE ".strtolower($table)."_id=".$where;
        else
            $deleteSQL .= " WHERE ".$this->whereBuilder($where);

        $this->$sql =  $deleteSQL;

        
        return $this->query($deleteSQL,$connection);
    }

    function update($table=false,$data=false,$where=false,$limit=false)
    {
        
        
        if(!$table)
            return false;

        $updateSQL = 'UPDATE '.$table.' SET ';

        $updateFields = array();
        foreach($data as $name => $value)
        {
            if($value=='null')
                $updateFields[] = " ".$name."=null ";
            else
                $updateFields[] = " ".$name."='".$value."' ";
        }

        $updateSQL .= implode(' , ',$updateFields);
        
        $whereSQL = ' WHERE '.$where;
        
        $updateSQL .= " ".$whereSQL;
        
        $limitSQL = '';
        if($limit)
            $limitSQL = 'LIMIT '.$limit;
        
        $updateSQL .= " ".$limitSQL;
        
        $this->sql =  $updateSQL;
    
        return $this->query($updateSQL);
    }
   
    function lastID()
    {
        return mysql_insert_id();
    }
    
    function numRows($result)
    {
        if(!$result) return 0;
        return mysql_num_rows($result);
    }
    
    function whereBuilder($where=false)
    {
        if(!$where) return '';
        
        /*   ,$op=SQL_AND
        $whereSQL = array();
        foreach($where as $element)
        {
            foreach($element as $key => $value)
            {
                if($key==SQL_AND||$key==SQL_OR)
                    $whereSQL[] = ' ( '.self::whereBuilder($value,$key).' ) ';
                elseif($key==SQL_IN)
                {
                    $name = $value[0];
                    $data = $value[1];
                    foreach($data as $key => $value)
                        $data[$key] = "'".$value."'";
                    $dataStr = implode(', ',$data);
                    $whereSQL[] = $name.' IN ('.$dataStr.')';
                }
                elseif($key==SQL_CUSTOM)
                    $whereSQL[] = ' '.$value.' ';
                else
                {
                    if(strpos($value,'`')!==false)
                        $whereSQL[] = " ".$key."=".str_replace('`','',$value)." ";
                    else
                        $whereSQL[] = " ".$key."='".$value."' ";
                }
            }
        }
                
        return implode(' '.$op.' ',$whereSQL);
         
         */
    }
   
}

?>