<?php

include "top.php";
session_start();
$_SESSION["username"] = "";
$_SESSION["userType"] = "";
session_destroy();

?>

<h1>You have been logged out</h1>

<?php
include "login.php";
include "bottom.php";

?>