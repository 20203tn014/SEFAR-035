<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/FaviconR&B.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/encuesta.css">
    <title>Dashboard - R&B Consulting</title>
</head>

<body class="loader">

    <div id="mainForm">
        <div id="encuesta">
            <table id="header">
                <tbody>
                    <tr>
                        <td rowspan="2" style="vertical-align: middle; text-align: center;">
                            <img src="assets/img/LogoR&B.png" class="logo" alt="R&B Consulting" style="max-width: 100%; display: block; margin: 0 auto;">
                        </td>
                        <td class="text-center text-bold main-text" style="font-size: 24px;">DASHBOARD DE RESULTADOS</td>
                    </tr>
                    <tr>
                        <td class="text-center text-bold sub-text" style="font-size: 16px;">NOM-035-STPS-2018 - Guía de Referencia I</td>
                    </tr>
                </tbody>
            </table>
            <br><br><br>
            <!-- Pregunta 1 -->
            <div class="row">
                <div class="col-md-8">
                    <p>1.- ¿Ha presenciado o sufrido alguna vez, durante o con motivo del trabajo un acontecimiento como los siguientes:
                        <br><br>
                        Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?
                        <br><br>
                        Asaltos?
                        <br><br>
                        Actos violentos que derivaron en lesiones graves?
                        <br><br>
                        Secuestro?
                        <br><br>
                        Amenazas?, o Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?
                    </p>
                </div>
                <div class="col-md-4">
                    <!-- Gráfica pregunta 1 -->
                    <canvas id="grafica1"></canvas>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                <!-- Pregunta 2 -->
                <div class="col-md-4">
                    <p>2.- ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</p>
                </div>
                <!-- Pregunta 3 -->
                <div class="col-md-4">
                    <p>3.- ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</p>
                </div>
                <!-- Pregunta 4 -->
                <div class="col-md-4">
                    <p>4.- ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</p>
                </div>
            </div>
            <div class="row">
                <!-- Gráfica pregunta 2 -->
                <div class="col-md-4">
                    <canvas id="grafica2"></canvas>
                </div>
                <!-- Gráfica pregunta 3 -->
                <div class="col-md-4">
                    <canvas id="grafica3"></canvas>
                </div>
                <!-- Gráfica pregunta 4 -->
                <div class="col-md-4">
                    <canvas id="grafica4"></canvas>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                <!-- Pregunta 5 -->
                <div class="col-md-4">
                    <p>5.- ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</p>
                </div>
                <!-- Pregunta 6 -->
                <div class="col-md-4">
                    <p>6.- ¿Ha tenido dificultad para recordar alguna parte importante del evento?</p>
                </div>
                <!-- Pregunta 7 -->
                <div class="col-md-4">
                    <p>7.- ¿Ha disminuido su interés en sus actividades cotidianas?</p>
                </div>
            </div>
            <div class="row">
                <!-- Gráfica pregunta 5 -->
                <div class="col-md-4">
                    <canvas id="grafica5"></canvas>
                </div>
                <!-- Gráfica pregunta 6 -->
                <div class="col-md-4">
                    <canvas id="grafica6"></canvas>
                </div>
                <!-- Gráfica pregunta 7 -->
                <div class="col-md-4">
                    <canvas id="grafica7"></canvas>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                <!-- Pregunta 8 -->
                <div class="col-md-4">
                    <p>8.- ¿Se ha sentido usted alejado o distante de los demás?</p>
                </div>
                <!-- Pregunta 9 -->
                <div class="col-md-4">
                    <p>9.- ¿Ha notado que tiene dificultad para expresar sus sentimientos?</p>
                </div>
                <!-- Pregunta 10 -->
                <div class="col-md-4">
                    <p>10.- ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</p>
                </div>
            </div>
            <div class="row">
                <!-- Gráfica pregunta 8 -->
                <div class="col-md-4">
                    <canvas id="grafica8"></canvas>
                </div>
                <!-- Gráfica pregunta 9 -->
                <div class="col-md-4">
                    <canvas id="grafica9"></canvas>
                </div>
                <!-- Gráfica pregunta 10 -->
                <div class="col-md-4">
                    <canvas id="grafica10"></canvas>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                <!-- Pregunta 11 -->
                <div class="col-md-4">
                    <p>11.- ¿Ha tenido usted dificultades para dormir?</p>
                </div>
                <!-- Pregunta 12 -->
                <div class="col-md-4">
                    <p>12.- ¿Ha estado particularmente irritable o le han dado arranques de coraje?</p>
                </div>
                <!-- Pregunta 13 -->
                <div class="col-md-4">
                    <p>13.- ¿Ha tenido dificultad para concentrarse?</p>
                </div>
            </div>
            <div class="row">
                <!-- Gráfica pregunta 11 -->
                <div class="col-md-4">
                    <canvas id="grafica11"></canvas>
                </div>
                <!-- Gráfica pregunta 12 -->
                <div class="col-md-4">
                    <canvas id="grafica12"></canvas>
                </div>
                <!-- Gráfica pregunta 13 -->
                <div class="col-md-4">
                    <canvas id="grafica13"></canvas>
                </div>
            </div>
            <hr>
            <br>
            <br>
            <div class="row" style="text-align: center;">
                <!-- Pregunta 14 -->
                <div class="col-md-4">
                    <p>14.- ¿Ha estado nervioso o constantemente en alerta?</p>
                </div>
                <!-- Pregunta 15 -->
                <div class="col-md-4">
                    <p>15.- ¿Se ha sobresaltado fácilmente por cualquier cosa?</p>
                </div>
                <!-- Botón para Descargar -->
                <div class="col-md-4">
                    <button id="btnDescargar" class="dashboard-btn-success btn-success btn btn-lg" style="width: 100%; height: 50px;">
                        <img src="./assets/img/excel.png" alt="Descargar resultados" style="max-width: 24px; margin-right: 5px;">
                        Descargar resultados
                    </button>
                </div>
            </div>
            <div class="row">
                <!-- Gráfica pregunta 14 -->
                <div class="col-md-4">
                    <canvas id="grafica14"></canvas>
                </div>
                <!-- Gráfica pregunta 15 -->
                <div class="col-md-4">
                    <canvas id="grafica15"></canvas>
                </div>
                <!-- Botón para Eliminar -->
                <div class="col-md-4">
                    <hr>
                    <button id="btnEliminar" class="dashboard-btn-danger btn-danger btn btn-lg" style="width: 100%; height: 50px;">
                        <img src="./assets/img/delete.png" alt="Eliminar registros" style="max-width: 24px; margin-right: 10px;">
                        Eliminar registros
                    </button>
                </div>
            </div>
            <br><br>
            <hr>
            <div>
                <p style="text-align: center;">R&B Consulting</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/encuesta.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>