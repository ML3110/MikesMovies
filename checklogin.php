<?php

include "top.php";

// If there is post data, run the relevant check
if(@$_POST)
{
    require_once 'UserHandler.php';

    $uh = new UserHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $uh->Connect();
    $uh->CheckLogin($_POST);
    $uh->Disconnect();
}

else
{
    include "login.php";
}

include "bottom.php";
?>