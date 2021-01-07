<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
#for autoload

function autoload()
{

    spl_autoload_register(function ($className)
    {
        $filepath = explode("index.php", $_SERVER["SCRIPT_FILENAME"]) [0];
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $filepath = $filepath . $className . '.php';
        require_once $filepath;
    });
}


function router()
{
    $request = $_SERVER['REQUEST_URI'];
    $rootpath = (explode("/index.php", $_SERVER['SCRIPT_NAME']) [0]);
    switch ($request)
    {
        case "$rootpath/login":
            $loginController = new Controller\Login();
            $loginController->render();
            break;


        case "$rootpath/submit/login":
            $loginController = new Controller\Submit\Login();
            break;
        
            case "$rootpath/signup":
            $signUpController = new Controller\Signup();
            $signUpController->render();
            break;

        case "$rootpath/submit/signup":
            $signUpController = new Controller\Submit\Signup();
            break;

        case "$rootpath/dashboard":
            $dashboardController = new Controller\Dashboard();
            $dashboardController->render();    
            break;
    
        default:
            $loginController = new Controller\Login();
            $loginController->render();
            break;
    }
}
autoload();
router();
?>
