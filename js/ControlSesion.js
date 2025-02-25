if (localStorage.getItem("sesion") == null) {
    // no hay sesion en localstorage
    prgActual = localStorage.getItem("prgActual");
    window.alert("sesion null");
    let sesion =
    {
        "fecha": new Date().getDate(),
        [prgActual]: {
            "data": [
                {
                    "id": "",
                    "funcion": "",
                    "value": ""
                }
            ]
        }
    };
    localStorage.setItem("sesion", JSON.stringify(sesion));







} else {
    // hay sesion, pero o no hay fecha, o no es valida
    let sesion = JSON.parse(localStorage.getItem("sesion"))

    if (sesion.fecha != new Date().getDate()) {
        window.alert("sin fecha");

        localStorage.removeItem("sesion");






    } else {
        // hay sesion correcta
        sesion = localStorage.getItem("sesion");
        prg = localStorage.getItem("prgActual");


        if (sesion != null) {
            sesion = JSON.parse(sesion);

            if (sesion[prg] != null) {
                // hay sesion activa, ponemos la pagina como debe:
                data = sesion[prg].data;

                for (let i = 0; i < data.length; i++) {
                    new Function("return" + data[i].funcion)()(data[i].id, data[i].value);
                }
            }

        }
    }
}



