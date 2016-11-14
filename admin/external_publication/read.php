<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    $message = 'You must be logged in to access this page';
}
else
{
    try
    {
        $mysql_hostname = ' ';

        $mysql_username = ' ';

        $mysql_password = ' ';

        $mysql_dbname = ' ';

        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT username FROM users 
        WHERE user_id = :user_id");

        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        $stmt->execute();

        $username = $stmt->fetchColumn();

        if($username == false)
        {
            $message = 'Access Error';
        }
        else
        {
            $message = 'Welcome, '.$username;
            include('include/read_body.php');
        }
    }
    catch (Exception $e)
    {
        $message = 'We are unable to process your request. Please try again later"';
    }
}

?>

    

