<?php
namespace Controller; 
class Dashboard 
{

    public function render(){
        $template = 'Dashboard.phtml';
        $filepath = explode("index.php",$_SERVER["SCRIPT_FILENAME"])[0];
        require_once($filepath.'View'.DIRECTORY_SEPARATOR.$template);

    }

}
