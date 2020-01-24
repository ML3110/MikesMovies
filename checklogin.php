<?php
include "top.php";
if(@$_POST)
{
    require_once 'UserHandler.php';

    $uh = new UserHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');
    $uh->connect();
    $uh->CheckLogin($_POST);
    $uh->disconnect();
}

else
{
    include "login.php";
}
include "bottom.php";
?>