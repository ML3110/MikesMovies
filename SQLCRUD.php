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

    public function read($parameter, $data = NULL)
    {
        // Returns all rows if no data specified
        if(!$data || !$parameter)
        {
            $query = "SELECT * FROM movie";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return $result;
        }

        // If the ID has been passed, return just the one result
        else
        {
            $query = "SELECT * FROM movie WHERE $parameter = " .$data;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        }
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