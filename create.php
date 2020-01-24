<?php
session_start();

include "top.php";

if(@$_SESSION["username"])
{
    require_once 'DBHandler.php';
    ?>
    <h2>Add</h2>

<form method="post">
    Movie name: 
    <input type="text" name="name" id="name">
    </br>
    Age rating: 
    <select name="agerating">
        <option value="U">U</option>
        <option value="PG">PG</option>
        <option value="12">12</option>
        <option value="15">15</option>
        <option value="18">18</option>
    </select>
    </br>
    Cover Image: 
    <input type="text" name="coverpic" id="coverpic">
    </br>
    Run time: 
    <input type="time" name="runtime" id="runtime">
    </br>
    Genre: 
    <select name="genre">
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
    </select>
    </br>
    Release Year: 
    <input type="text" name="releaseyear" id="releaseyear">
    </br>
    Plot: 
    <input type="text" name="plot" id="plot">
    </br>
    <input type="submit" name="submit" value="Go!">
</form>

<a href="index.php">Back</a></br>

<?php
$dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
$dbh->connect();
// $dbh->setCRUDConnection($dbh->getDBConnection());
$dbh->create($_POST);

$dbh->disconnect();
}

else 
{
    include "login.php";
}

include "bottom.php";
?>