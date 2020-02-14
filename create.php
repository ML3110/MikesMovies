<?php

session_start();

include "top.php";

// If the user is an admin, display the options to add
if(@$_SESSION["username"] && $_SESSION["userType"] == "admin")
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
        <option value="Fantasy">Fantasy</option>
        <option value="Drama">Drama</option>
        <option value="Horror">Horror</option>
        <option value="Thriller">Thriller</option>
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
$dbh->Connect();
$dbh->Create($_POST);
$dbh->Disconnect();
}

else 
{
    include "login.php";
}

include "bottom.php";
?>