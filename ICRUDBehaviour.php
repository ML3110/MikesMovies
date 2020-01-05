<?php

require_once 'SQLCRUD.php';

interface ICRUDBehaviour
{
    public function create();
    public function read();
    public function update();
    public function delete();

    public function setSQLConnection($data);
}

?>