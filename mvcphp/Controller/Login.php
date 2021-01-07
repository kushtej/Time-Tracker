<?php
namespace Controller; 
class Login 
{

    public function render(){
        $template = 'Login.phtml';
        $filepath = explode("index.php",$_SERVER["SCRIPT_FILENAME"])[0];
        require_once($filepath.'View'.DIRECTORY_SEPARATOR.$template);
    }

}
