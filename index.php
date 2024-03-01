<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/FaviconR&B.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/encuesta.css">
    <title>Cuestionario NOM-035 - R&B Consulting</title>
</head>

<body class="loader">

    <div id="mainForm">
        <div id="encuesta">
            <table id="header">
                <tbody>
                    <tr>
                        <td rowspan="4" style="text-align:center"><img src="assets/img/LogoR&B.png" class="logo" alt="R&B Consulting"></td>
                        <td rowspan="3" class="text-center text-bold">Sistema para encuestas electrónicas bajo la NOM-035 para la identificación de factores de riesgo psicosocial</td>
                        <td><small><strong>Identificador:</strong> <span id="codigo"><?php echo rand(); ?></span></small></td>
                    </tr>
                    <tr>
                        <td><small><strong>SEFAR-035:</strong> <?php echo 'V.1'; ?></small></td>
                    </tr>
                    <tr>
                        <td>
                            <small>
                                <strong>Fecha:</strong>
                                <?php date_default_timezone_set('America/Mexico_City');
                                echo date('d/m/Y'); ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center text-bold">NOM-035-STPS-2018 - Guía de Referencia I</td>
                        <td><small><strong>Tipo:</strong> <?php echo 'Encuesta'; ?></small></td>
                    </tr>
                </tbody>
            </table>

            <?php
            include('config.php');
            mysqli_set_charset($connection, "utf8mb4");
            $preguntasBD = ("SELECT * FROM preguntas WHERE status='1'");
            $query = mysqli_query($connection, $preguntasBD);

            $arrayRespuestas = array(
                "1" => "SI",
                "0" => "NO",
            );
            ?>

            <p id="totalPreguntasBD" data-totalPreg="<?php echo mysqli_num_rows($query); ?>"></p>

            <br>
            <h4 class="text-center">Cuestionario para identificar a los trabajadores que fueron sujetos a acontecimientos traumáticos severos
                <hr>
            </h4>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre" style="font-size: 16px;">Nombre completo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="puesto" style="font-size: 16px;">Puesto:</label>
                            <input type="text" class="form-control" id="puesto" name="puesto" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tiempoEmpresa" style="font-size: 16px;">Tiempo en la empresa:</label>
                            <input type="text" class="form-control" id="tiempoEmpresa" name="tiempoEmpresa" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="centroTrabajo" style="font-size: 16px;">Centro de trabajo:</label>
                            <input type="text" class="form-control" id="centroTrabajo" name="centroTrabajo" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="correo" style="font-size: 16px;">Correo electrónico:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <form id="formEncuesta" onsubmit="guardarEncuesta();return(false);">
                <table class="space padding-sm">
                    <thead>
                        <tr id="cabecera">
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Pregunta</th>
                            <th style="text-align: center;">Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $grupoActual = "";
                        while ($dataRow = mysqli_fetch_array($query)) {
                            if ($grupoActual != $dataRow['grupo']) {
                                $grupoActual = $dataRow['grupo'];
                                $nombreGrupo = obtenerNombreGrupo($grupoActual);
                                echo "<tr><td colspan='3' class='text-center'><br><h5>$nombreGrupo</h5></td></tr>";
                            }
                        ?>
                            <tr id="pregunta_<?php echo $dataRow['id']; ?>">
                                <td style="text-align: center;"><?php echo $dataRow['id']; ?></td>
                                <td style="font-size: 14px;"><?php echo nl2br($dataRow['pregunta']); ?></td>
                                <td width="150">
                                    <p class="opciones">
                                        <?php
                                        foreach ($arrayRespuestas as $clave => $valor) { ?>
                                            <span class="class_<?php echo $dataRow['id']; ?>" id="spanId_<?php echo $dataRow['id'] . '_' . $clave; ?>" onclick="respuesta('<?php echo $dataRow['id']; ?>','<?php echo $clave; ?>')">
                                                <input type="radio" name="respuesta[<?php echo $dataRow['id']; ?>]" id="idRespuesta_<?php echo $dataRow['id'] . $clave; ?>" value="<?php echo $clave; ?>">
                                                <label for="idRespuesta_<?php echo $dataRow['id'] . $clave; ?>">
                                                    <?php echo ($valor); ?>
                                                </label>
                                            </span>
                                        <?php } ?>
                                    </p>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php
                        function obtenerNombreGrupo($ordenGrupo)
                        {
                            switch ($ordenGrupo) {
                                case 'I':
                                    return 'I.- Acontecimiento traumático severo';
                                case 'II':
                                    return 'II.- Recuerdos persistentes sobre el acontecimiento (durante el último mes):';
                                case 'III':
                                    return 'III.- Esfuerzo por evitar circunstancias parecidas o asociadas al acontecimiento (durante el último mes):';
                                case 'IV':
                                    return 'IV.- Afectación (durante el último mes):';
                                default:
                                    return 'Grupo no especificado';
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <button type="submit" class="btn btn-primary" id="btnEnviar">Todas las preguntas deben ser contestadas</button>
            </form>

            <div class="progreso">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                    0%
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

    <script src="assets/js/encuesta.js"></script>
</body>

</html>