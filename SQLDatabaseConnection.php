<?php

require_once 'IDatabaseBehaviour.php';

class SQLDatabaseConnection implements IDatabaseBehaviour
{
    // Attributes
    protected $host;
    protected $port;
    protected $username;
    protected $password;
    protected $dbName;
    protected $pdo;

    // Constructor
    public function __construct($host = '', $port = 3306, $username = '', $password = '', $dbName = '')
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->pdo = NULL;
    }

    // Methods
    public function connect()
    {
        // If the pdo isn't set, instantiate a new PDO
        if (!isset($this->pdo))
        {
            $dsn = 'mysql:host=' . $this->host . ':' . $this->port . ';dbname=' . $this->dbName;
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        }
    }

    public function disconnect()
    {
        // If the pdo contains other than NULL,
        // set it to NULL to disconnect it
        if (isset($this->pdo))
        {
            $this->pdo = NULL;
            echo "Disconnected";
        }
    }

    // Properties
    public function getDBConnection()
    {
        return $this->pdo;
    }
}

?>