<?php

require_once 'SQLDatabaseConnection.php';

interface IDatabaseBehaviour
{
    public function Connect();
    public function Disconnect();
    public function GetDBConnection();
}

?>