<?php

session_start();

include "top.php";

if(@$_SESSION["username"])
{
    
    require_once 'DBHandler.php';
    
    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->connect();
    $dbh->update($_POST);    
    $dbh->disconnect();
}

else 
{
    include "login.php";
}

include "bottom.php";

?>