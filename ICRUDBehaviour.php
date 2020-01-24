<?php

require_once 'SQLCRUD.php';

interface ICRUDBehaviour
{
    public function create($post);
    public function read($param = NULL, $data = NULL);
    public function update($data);
    public function delete($data);

    public function setCRUDConnection($data);
}

?>