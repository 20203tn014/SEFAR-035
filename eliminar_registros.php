<?php
include('config.php');

$connection = new mysqli($server, $user, $password, $database);

if ($connection->connect_error) {
    die("Conexión fallida: " . $connection->connect_error);
}

$sql = "DELETE FROM respuestas";
$result = $connection->query($sql);

if ($result) {
    $response['success'] = true;
} else {
    $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);

$connection->close();