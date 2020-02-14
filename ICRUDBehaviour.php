<?php

require_once 'SQLCRUD.php';

interface ICRUDBehaviour
{
    public function Create($post);
    // Read has NULL parameters as if nothing is passed in it will read everything
    public function Read($param = NULL, $data = NULL);
    public function Update($data);
    public function Delete($data);

    public function SetCRUDConnection($data);
}

?>