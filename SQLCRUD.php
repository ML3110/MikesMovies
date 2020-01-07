<?php

require_once 'ICRUDBehaviour.php';

class SQLCRUD implements ICRUDBehaviour
{
    // Attributes
    private $pdo;

    // Methods
    public function create($post)
    {
        //TODO: Prepared statements
        $query = "INSERT INTO movie (";

        foreach($post as $key => $value)
        {
            if ($key == "submit")
            {
                $query = rtrim($query, ", ");
                $query = $query . ")";
                continue;
            }
            $query = $query . "`" . $key . "`, ";
        }

        $query = $query . " VALUES (";

        foreach ($post as $key => $value) {
            if ($key == "submit")
            {
                $query = rtrim($query, ", ");
                $query = $query . ");";
                continue;
            }
            $query = $query . "'" . $value . "', ";
        }

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
    }

    public function read($parameter = NULL, $data = NULL)
    {
        $query = "SELECT * FROM movie";

        // TODO: Prepared statement
        // If a parameter is set, perform a search on that
        // by appending to the query

        // TODO: Look at if only one parameter passed
        // TODO: If ID is passed, LIKE will break
        if ($data && $parameter)
        {
            $query = $query . " WHERE $parameter LIKE '%" . $data . "%'";
        }

        // Prepare statement
        $stmt = $this->pdo->prepare($query);

        // Execute statement
        $stmt->execute();

        // Get all results
        $result = $stmt->fetchAll();

        // Return result(s)
        return $result;
    }

    public function update()
    {
        echo "SQL Update</br>";
    }

    public function delete($data)
    {
        $query = "DELETE FROM movie WHERE movie.id = " . $data;

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        if($stmt->execute())
        {
            echo "Record deleted</br>";
        }
        else
        {
            echo "Error deleting record</br>";
        }
    }

    // Properties
    public function setSQLConnection($data)
    {
        $this->pdo = $data;
    }
}

?>