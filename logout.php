<?php

include "top.php";
session_start();
$_SESSION["username"] = "";
session_destroy();

?>

<h1>You have been loged out</h1>

<?php
include "login.php";
include "bottom.php";

?>