<?php
session_start();

include "top.php";

if(@$_SESSION["username"])
{
    require_once 'DBHandler.php';

    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->Connect();
    
    $result = $dbh->read('id', $_GET["id"]);
    $id = $_GET["id"];
    $dbh->Disconnect();

    ?>
    <h2>Update</h2>

<form method="post" action="updateAction.php?id=<?php echo $id; ?>">
    Movie name: 
    <input type="text" name="name" value='<?php echo $result[0]["name"]; ?>' id="name">
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
    <input type="text" name="coverpic" value='<?php echo $result[0]["coverpic"];?>' id="coverpic">
    </br>
    Run time: 
    <input type="time" name="runtime" value = '<?php echo $result[0]["runtime"];?>'id="runtime">
    </br>
    Genre: 
    <select name="genre">
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
    </select>
    </br>
    Release Year: 
    <input type="text" name="releaseyear" value='<?php echo $result[0]["releaseyear"];?>' id="releaseyear">
    </br>
    Plot: 
    <input type="text" name="plot" value='<?php echo $result[0]["plot"];?>' id="plot" size="100">
    </br>
    <input type="submit" name="submit" value="Go!">
</form>

<a href="index.php">Back</a></br>

<?php
}

else 
{
    include "login.php";
}

include "bottom.php";
?>