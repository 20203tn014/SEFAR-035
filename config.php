<?php
$user  = "root";
$password = "root";
$server = "localhost";
$database = "encuesta";

$connection = mysqli_connect($server, $user, $password) or die("No fue posible conectarse al Servidor :(");

mysqli_query($connection, "SET SESSION collation_connection ='utf8_unicode_ci'");

$db = mysqli_select_db($connection, $database) or die("No fue posible conectarse con la base de datos :(");
