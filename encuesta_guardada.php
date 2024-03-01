<?php
include('config.php');
mysqli_set_charset($connection, "utf8mb4");

$nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
$puesto = mysqli_real_escape_string($connection, $_POST['puesto']);
$tiempoEmpresa = mysqli_real_escape_string($connection, $_POST['tiempoEmpresa']);
$centroTrabajo = mysqli_real_escape_string($connection, $_POST['centroTrabajo']);
$correo = mysqli_real_escape_string($connection, $_POST['correo']);

foreach ($_POST['respuesta'] as $idPreg => $respPreg) {
    $insertRespuesta = ("INSERT INTO respuestas(
        id_pregunta,
        codigo_encuesta,        
        creado,
        nombre_completo,
        puesto,
        tiempo_empresa,
        centro_trabajo,
        correo,
        respuesta
    )
    VALUES(
        '" . $idPreg . "',
        '" . $_POST['codigo'] . "',        
        NOW(),
        '" . $nombre . "',
        '" . $puesto . "',
        '" . $tiempoEmpresa . "',
        '" . $centroTrabajo . "',
        '" . $correo . "',
        '" . $respPreg . "'
    )");
    $resultadoInsert = mysqli_query($connection, $insertRespuesta);
}

echo json_encode(array("respuesta" => $resultadoInsert));
