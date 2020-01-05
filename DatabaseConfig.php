<?php

class DatabaseConfig
{
    protected $host;
    protected $port;
    protected $username;
    protected $password;
    protected $dbName;

    public function __construct($host = '', $port = 3306, $username = '', $password = '', $dbName = '')
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
    }
}


?>