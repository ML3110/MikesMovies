<?php

require_once 'IDatabaseBehaviour.php';
require_once 'ICRUDBehaviour.php';
require_once 'SQLDatabaseConnection.php';

class DBHandler extends SQLDatabaseConnection implements IDatabaseBehaviour, ICRUDBehaviour 
{
    // Attributes
    private $dbType;
    private $dbBehaviour;
    private $CRUDBehaviour;

    // Constructor
    public function __construct($dbType, $host, $port, $username, $password, $dbName)
    {
        parent::__construct($host, $port, $username, $password, $dbName);

        $this->dbType = $dbType;
        $this->dbType = $this->dbType . "DatabaseConnection";
        $this->dbBehaviour = new $this->dbType;

        $this->dbType = $dbType;
        $this->dbType = $this->dbType . "CRUD";
        $this->CRUDBehaviour = new $this->dbType;

        $this->dbType = $dbType;
    }

    // Methods - DB
    public function connect()
    {
        parent::connect();
        // This sets a pdo session in the CRUD behaviour
        $this->setCRUDConnection($this->getDBConnection());
    }

    public function disconnect()
    {
        parent::disconnect();
    }

    // Methods - CRUD
    public function create($post)
    {
        $this->CRUDBehaviour->create($post);
    }
    public function read($parameter = NULL, $data = NULL)
    {
        return $this->CRUDBehaviour->read($parameter, $data);
    }
    public function update()
    {
        $this->CRUDBehaviour->update();
    }
    public function delete($data)
    {
        $this->CRUDBehaviour->delete($data);
    }

    // Properties
    public function getDBConnection()
    {
        return parent::getDBConnection();
    }

    public function setCRUDConnection($data)
    {
        $this->CRUDBehaviour->setCRUDConnection($data);
    }
}

?>