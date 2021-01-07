<?php
namespace Controller\Submit; 
class Login 
{
    public function __construct(){
        $helper = new \Model\Helper();

        if (isset($_POST) && isset($_POST["email"]) && isset($_POST["password"])) {


           $isValiduser = $helper->verifyUser(($_POST["email"]),($_POST["password"]));
           if($isValiduser == true)
           {
                header("Location: ". $helper->buildUrl(). "/dashboard"); 
           } 
           else
           {
            header("Location: ". $helper->buildUrl(). "/login"); 
           }
        }
        else{
            header("Location: ". $helper->buildUrl(). "/"); 
        }
    }
}
