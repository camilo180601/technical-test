<?php

$server = "localhost";
$database = "prueba_tecnica_dev";
$username = "root";
$password = "";

$db = mysqli_connect($server, $username, $password, $database);
mysqli_query($db, "SET NAMES 'utf8'");

?>