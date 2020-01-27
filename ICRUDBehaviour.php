<?php

require_once 'SQLCRUD.php';

interface ICRUDBehaviour
{
    public function Create($post);
    public function Read($param = NULL, $data = NULL);
    public function Update($data);
    public function Delete($data);

    public function SetCRUDConnection($data);
}

?>