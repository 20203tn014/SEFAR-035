<?php require 'vendor/autoload.php'; ?>
<?php
include('config.php');

$idPregunta = isset($_POST['idPregunta']) ? $_POST['idPregunta'] : null;

if ($idPregunta !== null) {
    $sql = "SELECT respuesta, COUNT(*) as count FROM respuestas WHERE id_pregunta = $idPregunta GROUP BY respuesta";
    $result = mysqli_query($connection, $sql);

    $data = array('1' => 0, '0' => 0);

    while ($row = mysqli_fetch_assoc($result)) {
        $respuesta = $row['respuesta'];
        $count = $row['count'];
        $data[$respuesta] = $count;
    }

    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'El ID de la pregunta no fue proporcionado.'));
}

mysqli_close($connection);
