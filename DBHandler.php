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
    public function Connect()
    {
        parent::Connect();
        // This sets a pdo session in the CRUD behaviour
        $this->SetCRUDConnection($this->GetDBConnection());
    }

    public function Disconnect()
    {
        parent::Disconnect();
    }

    // Methods - CRUD
    public function Create($post)
    {
        $this->CRUDBehaviour->Create($post);
    }
    public function Read($parameter = NULL, $data = NULL)
    {
        return $this->CRUDBehaviour->Read($parameter, $data);
    }
    public function Update($data)
    {
        $this->CRUDBehaviour->Update($data);
    }
    public function Delete($data)
    {
        $this->CRUDBehaviour->Delete($data);
    }

    // Properties
    public function GetDBConnection()
    {
        return parent::GetDBConnection();
    }

    public function SetCRUDConnection($data)
    {
        $this->CRUDBehaviour->SetCRUDConnection($data);
    }
}

?>