<?php

require_once 'ICRUDBehaviour.php';

class SQLCRUD implements ICRUDBehaviour
{
    // Attributes
    private $pdo;

    // Methods
    public function Create($post)
    {
        $query = "INSERT INTO movie (`name`, `agerating`, `coverpic`, `runtime`, `genre`, `releaseyear`, `plot`) VALUES (:name, :agerating, :coverpic, :runtime, :genre, :releaseyear, :plot)";

        // Prepare statement
        $stmt = $this->pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $_POST["name"]);
        $stmt->bindParam(':agerating', $_POST["agerating"]);
        $stmt->bindParam(':coverpic', $_POST["coverpic"]);
        $stmt->bindParam(':runtime', $_POST["runtime"]);
        $stmt->bindParam(':genre', $_POST["genre"]);
        $stmt->bindParam(':releaseyear', $_POST["releaseyear"]);
        $stmt->bindParam(':plot', $_POST["plot"]);

        // Execute
        $stmt->execute();
    }

    public function Read($parameter = NULL, $data = NULL)
    {
        $query = "SELECT * FROM movie";

        $data = filter_var($data, FILTER_SANITIZE_STRING);

        // If a parameter is set, perform a search on that
        // by appending to the query
        if ($data)
        {
            // If name, need to change the data slightly
            if ($parameter == "name")
            {
                $query = $query . " WHERE name LIKE :data";
                $data = "%".$data."%";
            }
            
            // If not name (likely ID in this scenario), 
            // append to query
            else
            {
                $query = $query . " WHERE $parameter = :data";
            }

            // Prepare
            $stmt = $this->pdo->prepare($query);

            // Bind parameter
            $stmt->bindParam(':data', $data);
        }

        // If not, this will return everything
        else 
        {
            $stmt = $this->pdo->prepare($query);
        }

        // Execute statement
        $stmt->execute();

        // Get all results
        $result = $stmt->fetchAll();

        // Return result(s)
        return $result;
    }

    public function Update($data)
    {
        // Query
        $query = "UPDATE `movie` SET `name` = :name, `agerating` = :agerating, `coverpic` = :coverpic, `runtime` = :runtime, `genre` = :genre, `releaseyear` = :releaseyear, `plot` = :plot WHERE `movie`.`id` = " . $_GET["id"];

        // Prepare
        $stmt = $this->pdo->prepare($query);

        // Bind
        $stmt->bindParam(':name', $_POST["name"]);
        $stmt->bindParam(':agerating', $_POST["agerating"]);
        $stmt->bindParam(':coverpic', $_POST["coverpic"]);
        $stmt->bindParam(':runtime', $_POST["runtime"]);
        $stmt->bindParam(':genre', $_POST["genre"]);
        $stmt->bindParam(':releaseyear', $_POST["releaseyear"]);
        $stmt->bindParam(':plot', $_POST["plot"]);

        // If successful
        if($stmt->execute())
        {
            echo "Success</br>";
            echo "<a href='index.php'>Home</a>";
        }
        else 
        {
            echo "Update failed";
            echo "<a href='index.php'>Home</a>";
        }
    }

    public function Delete($data)
    {
        $query = "DELETE FROM movie WHERE movie.id = :data";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':data', $data);

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
    public function SetCRUDConnection($data)
    {
        $this->pdo = $data;
    }
}

?>