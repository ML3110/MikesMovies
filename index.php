<?php
session_start();

include "top.php";

// If user is logged in display homepage
if (@$_SESSION["username"])
{
    require_once "DBHandler.php";
    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->Connect();

    echo '<div class="row">';
    include "searchbar.php";

    echo '</div>';

    echo '<div class="row">';

    // If post data is empty, there hasn't been a search
    // attempt. Display everything.
    if (empty($_POST))
    {
        $rows = $dbh->Read();
    }

    // If post data contains a search item, display the
    // relevant searches
    else 
    {
        $rows = $dbh->Read('name', $_POST["search"]);

    }

    $dbh->Disconnect();

    foreach($rows as $row)
    {
        echo '<div class="column">';
            echo '<div class="card">';
                echo '<img src="images/' . $row["coverpic"] . '" class="cover" </br>' ;
                echo '<p>' . $row["name"] . '</p>';
                if($_SESSION["userType"] == "admin")
                {
                    echo '<a href="update.php?id=' . $row["id"] . '"><button>Update</button></a>';
                    echo '<a href="delete.php?id=' . $row["id"] . '"><button>Delete</button></a>';    
                }
                echo '<a href="details.php?id=' . $row["id"] . '">Details</a>';
            echo '</div>';
        echo '</br>';
        echo '</div>';
    }

    if($_SESSION["userType"] == "admin")
    {
        echo '<a href="create.php"><button>Add New</button></a>';
    }
}

else
{
    include "login.php";
}

include "bottom.php";

?>