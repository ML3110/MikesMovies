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
    // public $pd;

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
    }

    public function disconnect()
    {
        parent::disconnect();
    }

    // Methods - CRUD
    public function create()
    {
        $this->CRUDBehaviour->create();
    }
    public function read()
    {
        $this->CRUDBehaviour->read();
    }
    public function update()
    {
        $this->CRUDBehaviour->update();
    }
    public function delete()
    {
        $this->CRUDBehaviour->delete();
    }

    // Properties
    public function setSQLConnection($data)
    {
        $this->CRUDBehaviour->setSQLConnection($data);
    }
    public function getDBConnection()
    {
        return parent::getDBConnection();
    }
}

?>

<?php

$dbh = new DBHandler('SQL', 'mysql', 3306, 'root', 'docker', 'MikesMovies');

$dbh->connect();

$dbh->setSQLConnection($dbh->getDBConnection());

$dbh->read();

?>