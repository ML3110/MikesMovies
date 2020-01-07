<?php

require_once 'SQLCRUD.php';

interface ICRUDBehaviour
{
    public function create($post);
    public function read($param = NULL, $data = NULL);
    public function update();
    public function delete($data);

    public function setSQLConnection($data);
}

?>