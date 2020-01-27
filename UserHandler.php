<?php

require_once 'IDatabaseBehaviour.php';
require_once 'ILoginBehaviour.php';
require_once 'SQLDatabaseConnection.php';

class UserHandler extends SQLDatabaseConnection implements IDatabaseBehaviour, IloginBehaviour
{
    // Attributes
    private $dbType;
    private $dbBehaviour;
    private $loginBehaviour; // Need login

    // Constructor
    public function __construct($dbType, $host, $port, $username, $password, $dbName)
    {
        parent::__construct($host, $port, $username, $password, $dbName);

        $this->dbType = $dbType;
        $this->dbType = $this->dbType . "DatabaseConnection";
        $this->dbBehaviour = new $this->dbType;

        $this->dbType = $dbType;
        $this->dbType = $this->dbType . "Login";
        $this->loginBehaviour = new $this->dbType; // Need login
        $this->dbType = $dbType;
    }

    // Methods - DB
    public function Connect()
    {
        parent::Connect();
        $this->SetConnection($this->GetDBConnection());
    }

    public function Disconnect()
    {
        parent::Disconnect();
    }

    // Methods - user
    public function CheckLogin($post)
    {
        $this->loginBehaviour->CheckLogin($post);
    }

    // Properties
    public function GetDBConnection()
    {
        return parent::GetDBConnection();
    }

    public function SetConnection($data)
    {
        $this->loginBehaviour->SetConnection($data);
    }
}

?>