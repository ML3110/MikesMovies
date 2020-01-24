<?php

require_once 'ILoginBehaviour.php';

class SQLLogin implements ILoginBehaviour
{
    // Attributes
    private $pdo;
    private $username;
    private $password;

    // Methods
    public function CheckLogin($post)
    {
        $this->username = $post["username"];
        $this->password = $post["password"];

        $query = "SELECT * FROM user WHERE username = '" . $this->username . "' AND password = '" . $this->password . "'";

        $stmt = $this->pdo->prepare($query);

        $stmt->execute();

        // If the statement returns a 1, the login was valid
        $count = $stmt->rowCount();

        if ($count > 0)
        {
            session_start();

            $_SESSION["username"] = $this->username;

            echo "<h2>Welcome " . $_SESSION["username"] . "!</h2></br>";
            echo "<h2><a href='index.php'>Go to homepage</a></h2>";

            // return $_SESSION;
        }
        else 
        {
            // TODO: Observer stuff
            echo "Login Failed. Please re-try";
            include "login.php";
        }
    }

    // Properties
    public function SetConnection($data)
    {
        $this->pdo = $data;
    }
}

?>