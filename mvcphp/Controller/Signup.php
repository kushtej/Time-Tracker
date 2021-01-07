<?php
namespace Controller; 
class Signup
{
    public function __construct(){

    }
    public function render(){
        $template = 'Signup.phtml';
        $filepath = explode("index.php",$_SERVER["SCRIPT_FILENAME"])[0];
        require_once($filepath.'View'.DIRECTORY_SEPARATOR.$template);

    }

}