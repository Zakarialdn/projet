<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

// OK 👍

class LogoutController
{
    private $logout;

    public function getlogout(){
        session_destroy();
        header('Location: index.php?action=home');
       return $this->logout;
        //var_dump($logout);
    }
}
?>