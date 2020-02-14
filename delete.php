<?php
session_start();

include "top.php";

if (@$_SESSION && $_SESSION["userType"] == "admin")
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
    include "login.php";
}

?>