<?php
if (!function_exists('getConnection')){
    function getConnection()
    {
        $servername = "localhost";
        $username ="root";
        $password ="root";
        $dbname ="garageadmin";

        return new mysqli($servername, $username, $password, $dbname);
    }
}
?>