<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar Resultados</title>
</head>

<body>

    <?php
    include('config.php');
    date_default_timezone_set("America/Mexico_City");
    $fecha = date("d-m-Y");

    header("Content-Type: text/html;charset=utf-8");
    header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
    $filename = "ResultadosExcel_" . $fecha . ".xls";
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Disposition: attachment; filename=" . $filename . "");

    $DataEncuesta = ("SELECT 
                r.codigo_encuesta, 
                r.creado, r.nombre_completo, r.puesto, r.tiempo_empresa, r.centro_trabajo, r.correo, p.pregunta, r.respuesta
            FROM respuestas as r 
            INNER JOIN preguntas AS p ON p.id = r.id_pregunta AND p.status='1' ORDER BY r.creado ASC, r.codigo_encuesta ASC, p.id ASC, r.id DESC");

    $Data = mysqli_query($connection, $DataEncuesta);

    // Obtener todas las preguntas
    $preguntas = [];
    while ($preguntaRow = mysqli_fetch_assoc($Data)) {
        $codigoEncuesta = $preguntaRow['codigo_encuesta'];
        $pregunta = $preguntaRow['pregunta'];
        $respuesta = $preguntaRow['respuesta'];

        if (!isset($preguntas[$codigoEncuesta]['datos_trabajador'])) {
            $preguntas[$codigoEncuesta]['datos_trabajador'] = [
                'creado' => $preguntaRow['creado'],
                'nombre_completo' => $preguntaRow['nombre_completo'],
                'puesto' => $preguntaRow['puesto'],
                'tiempo_empresa' => $preguntaRow['tiempo_empresa'],
                'centro_trabajo' => $preguntaRow['centro_trabajo'],
                'correo' => $preguntaRow['correo'],
            ];
        }

        $preguntas[$codigoEncuesta][$pregunta] = $respuesta;
    }

    $encabezados = [
        'Marca temporal', 'Nombre del evaluado', 'Puesto del evaluado', 'Tiempo en la empresa', 'Empresa para la que trabaja', 'Correo electrónico'
    ];

    foreach (array_keys($preguntas) as $codigoEncuesta) {
        foreach (array_keys($preguntas[$codigoEncuesta]) as $pregunta) {
            if ($pregunta !== 'datos_trabajador') {
                $encabezados[] = $pregunta;
            }
        }
        break;
    }
    ?>

    <table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
        <thead>
            <tr style="background: #D0CDCD;">
                <?php foreach ($encabezados as $encabezado) : ?>
                    <th><?php echo $encabezado; ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($preguntas as $codigoEncuesta => $respuestasEncuesta) :
            ?>
                <tr>
                    <?php
                    $datosTrabajador = $respuestasEncuesta['datos_trabajador'];
                    ?>
                    <td><?php echo $datosTrabajador['creado']; ?></td>
                    <td><?php echo $datosTrabajador['nombre_completo']; ?></td>
                    <td><?php echo $datosTrabajador['puesto']; ?></td>
                    <td><?php echo $datosTrabajador['tiempo_empresa']; ?></td>
                    <td><?php echo $datosTrabajador['centro_trabajo']; ?></td>
                    <td><?php echo $datosTrabajador['correo']; ?></td>

                    <?php
                    foreach ($respuestasEncuesta as $key => $respuesta) :
                        if ($key !== 'datos_trabajador') :
                    ?>
                            <td><?php echo $respuesta; ?></td>
                    <?php endif;
                    endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>