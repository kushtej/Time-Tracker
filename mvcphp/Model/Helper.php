<?php
namespace Model;

class Helper
{

    public function buildUrl()
    {
        $http = $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS'] ? 'http' : 'https';
        $domain = $_SERVER['HTTP_HOST'] . '/' . explode("/", $_SERVER['REQUEST_URI']) [1];
        $url = $http . '://' . $domain;
        return $url;
    }

    public function getConnection()
    {
        $serverName = "localhost";
        $dbUserName = "root";
        $dbPassword = "Kush007_tej";
        $dbName = "phpmvc";
        $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
        if ($conn->connect_error)
        {
            return false;
        }
        return $conn;
    }

    public function verifyUser($email, $psw)
    {
        $sql = "SELECT count(*) FROM user where email='$email'and password='$psw'";
        $conn = $this->getConnection();

        if ($result = mysqli_query($conn, $sql))
        {
            $rowcount = mysqli_num_rows($result);
            if ($rowcount)
            {
                session_start();
                $_SESSION["email"] = $_POST["email"];
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function registerUser($firstName, $lastName, $email, $psw)
    {
        $sql = "INSERT INTO user(first_name,last_name,email,password) values ('$firstName','$lastName','$email','$psw')";
        $conn = $this->getConnection();
        if ($conn->query($sql) === true)
        {
            session_start();

            $_SESSION["email"] = $_POST["email"];
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
