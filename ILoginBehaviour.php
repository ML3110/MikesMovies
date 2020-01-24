<?php

require_once 'SQLLogin.php';

interface ILoginBehaviour
{
    public function CheckLogin($post);

    public function SetConnection($data);
}

?>