<?php

require_once 'ICRUDBehaviour.php';

class SQLCRUD implements ICRUDBehaviour
{

    // Attributes
    protected $pdo;

    // Methods
    public function create()
    {
        echo "SQL Create</br>";
    }

    public function read()
    {
        $query = "SELECT * FROM movie";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        return $rows;
    }

    public function update()
    {
        echo "SQL Update</br>";
    }

    public function delete()
    {
        echo "SQL Delete</br>";
    }

    // Properties
    public function setSQLConnection($data)
    {
        $this->pdo = $data;
    }
}

?>