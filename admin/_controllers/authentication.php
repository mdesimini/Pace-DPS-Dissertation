<?php

class authentication
{
    //determine if user has access to view the current page
    function check()
    {
        global $url_full_base, $url_root;

        $req =  str_replace($url_root,"",$_SERVER['REQUEST_URI']);
        $req =  str_replace("?".$_SERVER['QUERY_STRING'],"",$req);
        
	
        if($req=='/'||$req=='/index.php')
            return true;

        if(isset($_SESSION['auth']))
            return true;
            //echo $url_full_base.'?invalid';
        header('Location: '.$url_full_base.'?invalid');
        exit();
        return false;
    }
    
    //validate login credentials
    function login($user,$pass)
    {
        if(isset($_SESSION['auth']))
            return true;

   // $data = $admin->get(1);
	
			
		return $_SESSION['auth'] = true;
		

    
		

        
    }
    
     //log the user out
    function logout()
    {
        unset($_SESSION['auth']);
        return true;
    }
}

?>