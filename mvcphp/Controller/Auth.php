<?php
namespace Controller; 
class Auth 
{
    public function __construct(){
        session_start();
        if(!isset($_SESSION["email"])){
            $helper = new \Model\Helper();
            header("Location: ". $helper->buildUrl(). "/"); 

        }
    }
}
