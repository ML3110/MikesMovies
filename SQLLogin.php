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
        // Sanitize example. Remove special chars from username
        $this->username = preg_replace('/[^A-Za-z0-9\-]/', '', $post["username"]);

        // Sanitize example. Allow special chars but remove html tags
        $this->password = filter_var($post["password"], FILTER_SANITIZE_STRING);

        $query = "SELECT * FROM user WHERE username = :username AND password = :password";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        $stmt->execute();

        $adminCheck = $stmt->fetch();

        // If the statement returns a 1, the login was valid
        $count = $stmt->rowCount();

        if ($count > 0)
        {
            session_start();

            $_SESSION["username"] = $this->username;
            
            if ($adminCheck["isAdmin"] == 1)
            {
                $_SESSION["userType"] = "admin";
            }
            else 
            {
                $_SESSION["userType"] = "standard";
            }

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