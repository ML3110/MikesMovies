<?php

require_once 'SQLDatabaseConnection.php';

interface IDatabaseBehaviour
{
    public function connect();
    public function disconnect();
    public function getDBConnection();
}

?>