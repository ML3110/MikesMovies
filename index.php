<?php
session_start();

include "top.php";

if (@$_SESSION["username"])
{
    require_once "DBHandler.php";
    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->connect();
    // $dbh->setCRUDConnection($dbh->getDBConnection());

    echo '<div class="row">';
    include "searchbar.php";

    echo '</div>';

    echo '<div class="row">';

    if (empty($_POST))
    {
        $rows = $dbh->read();
    }

    else 
    {
        $rows = $dbh->read('name', $_POST["search"]);
    }

    $dbh->disconnect();

    foreach($rows as $row)
    {
        echo '<div class="column">';
            echo '<div class="card">';
                echo '<img src="images/' . $row["coverpic"] . '" class="cover" </br>' ;
                echo '<p>' . $row["name"] . '</p>';
                // echo '<a href="update.php"><button>Update</button></a>';
                echo '<a href="delete.php?id=' . $row["id"] . '"><button>Delete</button></a>';
                echo '<a href="details.php?id=' . $row["id"] . '">Details</a>';

            echo '</div>';
        echo '</br>';
        echo '</div>';
    }

    echo '<a href="create.php"><button>Add New</button></a>';
}

else
{
    include "login.php";
}


include "bottom.php";

?>