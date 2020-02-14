<?php

session_start();

include "top.php";

// If user is admin, allow them to delete
if (@$_SESSION && $_SESSION["userType"] == "admin")
{
    include 'DBHandler.php';

    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->Connect();    
    $dbh->Delete($_GET["id"]);
    
    echo '<a href="index.php">Back</a>';
}

else 
{
    include "login.php";
}

?>