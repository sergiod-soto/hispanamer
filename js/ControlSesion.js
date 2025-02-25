if (Number(localStorage.getItem("fechaSesion")) != new Date().getDate()) {
    localStorage.removeItem("sesion");
    return;
}


sesion = localStorage.getItem("sesion");
prg = localStorage.getItem("pregActual");

if (sesion != null ||
    sesion != undefined ||
    sesion != "" ||
    this.sesion[prg] != null) {

    // hay sesion activa, ponemos la pagina como debe:
    data = sesion[prg][data];


    for (let i = 0; i < data.length; i++) {
        new Function("return" + data[i].funcion)()(data[i].id, data[i].value);
    }
}

