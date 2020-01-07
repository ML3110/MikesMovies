<?php

require_once 'DBHandler.php';

$dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
$dbh->connect();

print_r($_POST);

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM user WHERE username = " . $username . " AND password = " . $password;

echo($query);

?>