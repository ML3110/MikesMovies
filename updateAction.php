<?php

session_start();

include "top.php";

if(@$_SESSION["username"])
{
    
    require_once 'DBHandler.php';
    
    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->Connect();
    $dbh->Update($_POST);    
    $dbh->Disconnect();
}

else 
{
    include "login.php";
}

include "bottom.php";

?>