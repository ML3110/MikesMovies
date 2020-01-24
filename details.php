<?php
session_start();

include "top.php";

if (@$_SESSION)
{
    include "DBHandler.php";
    $dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $dbh->connect();
    // $dbh->setCRUDConnection($dbh->getDBConnection());
    
    $result = $dbh->read('id', $_GET["id"]);
    $dbh->disconnect();
    
    echo '</br>';
    
    echo '<div class="row2">';
        echo '<div class="card">';
            echo '<h2>'. $result[0]["name"] . '</h2>';
            echo '<div class="col">';
                echo '<img src="images/' . $result[0]["coverpic"] . '" class="coverLarge" </br>' ;
            echo '</div>';
            echo '<b>Age rating: </b>' . $result[0]["agerating"];
            echo '</br></br>';
            echo '<b>Run time: </b>' . $result[0]["runtime"];
            echo '</br></br>';
            echo '<b>Genre: </b>' . $result[0]["genre"];
            echo '</br></br>';
            echo '<b>Release year: </b>' . $result[0]["releaseyear"];
            echo '</br></br>';
            echo '<b>Plot: </b>' . $result[0]["plot"];
            echo '<div class="row2">';
                echo '<a href="index.php"><button>Back</button></a>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}

else
{
    include "login.php";
}


?>