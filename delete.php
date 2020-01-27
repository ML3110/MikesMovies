<?php
session_start();

include "top.php";

if (@$_SESSION)
{
    include 'DBHandler.php';

    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->Connect();
    // $dbh->setCRUDConnection($dbh->getDBConnection());
    
    $dbh->Delete($_GET["id"]);
    
    echo '<a href="index.php">Back</a>';
}

else 
{
    include "index.php";
}

?>