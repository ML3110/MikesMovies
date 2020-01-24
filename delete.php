<?php
session_start();

include "top.php";

if (@$_SESSION)
{
    include 'DBHandler.php';

    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->connect();
    // $dbh->setCRUDConnection($dbh->getDBConnection());
    
    $dbh->delete($_GET["id"]);
    
    echo '<a href="index.php">Back</a>';
}

else 
{
    include "index.php";
}

?>