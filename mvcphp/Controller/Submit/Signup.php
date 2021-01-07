<?php
namespace Controller\Submit; 
class Signup
{
    public function __construct(){
        $helper = new \Model\Helper();

        if (isset($_POST) &&  isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["email"]) && isset($_POST["password"])) 
        {




           $isUserRegistered = $helper->registerUser(($_POST["first-name"]),($_POST["last-name"]),($_POST["email"]),($_POST["password"]));
           if($isUserRegistered)
           {


                  header("Location: ". $helper->buildUrl(). "/dashboard"); 
           } 
           else 
           {
                header("Location: ". $helper->buildUrl(). "/"); 
           }           
        } 
        else 
        {
            header("Location: ". $helper->buildUrl(). "/signup"); 
        }

    }


}
