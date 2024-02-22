window.addEventListener("load", (event) => {
    let bodyDocumento = document.body;
    bodyDocumento.classList.remove("loader");
    btnAccion((sustraerInt = 0));
});

function respuesta(idPregunta, idRespuesta) {
    let classIdPregunta = $(".class_" + idPregunta).removeClass("checkRespuesta");
    let spanIdPregunta = $("#spanId_" + idPregunta + "_" + idRespuesta).addClass(
        "checkRespuesta"
    );
    let inputRadio = document.querySelector(
        "#idRespuesta_" + idPregunta + "" + idRespuesta
    );
    inputRadio.checked = true;

    contadorChecked();
}

function contadorChecked() {
    let valorChecked = [];
    $("input[type=radio]:checked").each(function () {
        valorChecked.push(this.value);
        let totalChecked = valorChecked.length;
        let totalPreguntasBD = document.querySelector("#totalPreguntasBD");
        let totalPreguntas = Number(totalPreguntasBD.dataset.totalpreg);

        let porcentaje = (totalChecked * 100) / totalPreguntas;
        let porcentajeDecimal = Number(porcentaje.toFixed(3));
        let sustraerInt = Number(porcentaje.toFixed(3).substring(0, 3));

        btnAccion(sustraerInt);

        let barraProgreso = document.querySelector(".progress-bar");
        barraProgreso.style.width = `${porcentajeDecimal}%`;
        barraProgreso.textContent = `${sustraerInt}%`;
    });
}

function btnAccion(sustraerInt = 0) {
    let btnEnviar = document.querySelector("#btnEnviar");
    btnEnviar.disabled = true;

    if (sustraerInt == "100") {
        btnEnviar.disabled = false;
        btnEnviar.textContent = "Enviar encuesta";
    } else {
        btnEnviar.disabled = true;
    }
}

function guardarEncuesta() {
    let formEncuesta = $("#formEncuesta").serialize();
    let spanCodigo = document.querySelector("#codigo").textContent;
    let codigo = Number(spanCodigo);

    let nombre = $("#nombre").val();
    let puesto = $("#puesto").val();
    let tiempoEmpresa = $("#tiempoEmpresa").val();
    let centroTrabajo = $("#centroTrabajo").val();
    let correo = $("#correo").val();

    let dataSend =
        formEncuesta +
        "&codigo=" +
        codigo +
        "&nombre=" +
        nombre +
        "&puesto=" +
        puesto +
        "&tiempoEmpresa=" +
        tiempoEmpresa +
        "&centroTrabajo=" +
        centroTrabajo +
        "&correo=" +
        correo;

    $.ajax({
        url: "encuesta_guardada.php",
        type: "POST",
        data: dataSend,
        dataType: "json",
        success: function (data) {
            console.log(data);
            if (data.respuesta) {
                alert(
                    "Las respuestas se han registrado de manera exitosa, ya puede cerrar la encuesta."
                );
                location.href = "index.php";
            }
        },
    });
}
