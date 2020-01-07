<?php

include "top.php";
include 'DBHandler.php';

$dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
$dbh->connect();
// $dbh->setSQLConnection($dbh->getDBConnection());

$dbh->delete($_GET["id"]);

echo '<a href="index.php">Back</a>';

?>