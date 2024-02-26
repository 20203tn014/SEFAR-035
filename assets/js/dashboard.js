document.addEventListener("DOMContentLoaded", function () {

    var btnDescargar = document.getElementById('btnDescargar');
    btnDescargar.addEventListener('click', descargarResultados);

    function descargarResultados() {
        Swal.fire({
            icon: "success",
            title: "¡Descarga exitosa!",
            showConfirmButton: false,
            timer: 3000
        });
        window.location.href = 'descargar_resultados.php';
    }


    var btnEliminar = document.getElementById('btnEliminar');
    btnEliminar.addEventListener('click', function () {
        eliminarRegistros();
    });

    function eliminarRegistros() {
        Swal.fire({
            title: '¿Está seguro que desea continuar?',
            text: 'Una vez realizada esta acción, no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#05a649',
            cancelButtonColor: '#e43243',
            confirmButtonText: 'Sí, eliminar registros',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'eliminar_registros.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            Swal.fire('¡Eliminación completa!', 'Todos los registros se han eliminado exitosamente.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                        } else {
                            Swal.fire('Error', 'No fue posible eliminar los registros. Por favor, inténtelo de nuevo más tarde.', 'error');
                        }
                    },
                    error: function (error) {
                        console.error('Error en la solicitud AJAX:', error);
                        Swal.fire('Error', 'Error en la solicitud. Por favor, inténtelo de nuevo más tarde.', 'error');
                    }
                });
            }
        });
    }


    actualizarGraficas();

    function actualizarGraficas() {

        actualizarGraficaDona("grafica1", 1);
        actualizarGraficaDona("grafica4", 4);

        actualizarGraficaPastel("grafica2", 2);
        actualizarGraficaPastel("grafica3", 3);

        actualizarGraficaLinea("grafica5", 5);
        actualizarGraficaLinea("grafica6", 6);
        actualizarGraficaLinea("grafica7", 7);
        actualizarGraficaLinea("grafica8", 8);
        actualizarGraficaLinea("grafica9", 9);
        actualizarGraficaLinea("grafica10", 10);

        actualizarGraficaBarra("grafica11", 11);
        actualizarGraficaBarra("grafica12", 12);
        actualizarGraficaBarra("grafica13", 13);
        actualizarGraficaBarra("grafica14", 14);
        actualizarGraficaBarra("grafica15", 15);
    }

    function actualizarGraficaDona(idGrafica, idPregunta) {
        $.ajax({
            url: "obtener_graficas.php",
            type: "POST",
            data: { idPregunta: idPregunta },
            dataType: "json",
            success: function (data) {
                dibujarGraficaDona(idGrafica, data);
            },
            error: function (error) {
                console.error("Error al obtener los datos:", error);
            },
        });
    }

    function dibujarGraficaDona(idGrafica, data) {
        var ctx = document.getElementById(idGrafica).getContext("2d");
        var chart = new Chart(ctx, {
            plugins: [ChartDataLabels],
            type: "doughnut",
            data: {
                labels: ["No", "Sí"],
                datasets: [
                    {
                        label: "Trabajadores",
                        data: Object.values(data),
                        backgroundColor: ["#8bbcff", "#ffd086"],
                        borderColor: ["#6eaaff", "#ffc16c"],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        display: false,
                    },
                },
                cutout: "60%",
                plugins: {
                    datalabels: {
                        formatter: function (value, ctx) {
                            return value;
                        },
                        color: "#0b0b0b",
                    },
                },
            },
        });
    }

    function actualizarGraficaPastel(idGrafica, idPregunta) {
        $.ajax({
            url: "obtener_graficas.php",
            type: "POST",
            data: { idPregunta: idPregunta },
            dataType: "json",
            success: function (data) {
                dibujarGraficaPastel(idGrafica, data);
            },
            error: function (error) {
                console.error("Error al obtener los datos:", error);
            },
        });
    }

    function dibujarGraficaPastel(idGrafica, data) {
        var ctx = document.getElementById(idGrafica).getContext("2d");
        var chart = new Chart(ctx, {
            plugins: [ChartDataLabels],
            type: "pie",
            data: {
                labels: ["No", "Sí"],
                datasets: [
                    {
                        label: "Trabajadores",
                        data: Object.values(data),
                        backgroundColor: ["#8affb8", "#ff85d0"],
                        borderColor: ["#6dffac", "#ff6ac7"],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        display: false,
                    },
                },
                cutout: "10%",
                plugins: {
                    datalabels: {
                        formatter: function (value, ctx) {
                            return value;
                        },
                        color: "#0b0b0b",
                    },
                },
            },
        });
    }

    function actualizarGraficaLinea(idGrafica, idPregunta) {
        $.ajax({
            url: "obtener_graficas.php",
            type: "POST",
            data: { idPregunta: idPregunta },
            dataType: "json",
            success: function (data) {
                dibujarGraficaLinea(idGrafica, data);
            },
            error: function (error) {
                console.error("Error al obtener los datos:", error);
            },
        });
    }

    function dibujarGraficaLinea(idGrafica, data) {
        var ctx = document.getElementById(idGrafica).getContext("2d");
        var chart = new Chart(ctx, {
            type: "line",
            data: {
                labels: ["No", "Sí"],
                datasets: [
                    {
                        label: "Trabajadores",
                        data: Object.values(data),
                        backgroundColor: ["#8bbcff", "#ff8786"],
                        borderColor: ["#6eaaff", "#ff7670"],
                        pointStyle: "circle",
                        pointRadius: 5,
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                    },
                },
            },
        });
    }

    function actualizarGraficaBarra(idGrafica, idPregunta) {
        $.ajax({
            url: "obtener_graficas.php",
            type: "POST",
            data: { idPregunta: idPregunta },
            dataType: "json",
            success: function (data) {
                dibujarGraficaBarra(idGrafica, data);
            },
            error: function (error) {
                console.error("Error al obtener los datos:", error);
            },
        });
    }

    function dibujarGraficaBarra(idGrafica, data) {
        var ctx = document.getElementById(idGrafica).getContext("2d");
        var chart = new Chart(ctx, {
            plugins: [ChartDataLabels],
            type: "bar",
            data: {
                labels: ["No", "Sí"],
                datasets: [
                    {
                        label: "Trabajadores",
                        data: Object.values(data),
                        backgroundColor: ["#a08cff", "#8bff6a"],
                        borderColor: ["#8b6dff", "#81c769"],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                plugins: {
                    datalabels: {
                        formatter: function (value, ctx) {
                            return value;
                        },
                        color: "#0b0b0b",
                    },
                },
            }
        });
    }
});
