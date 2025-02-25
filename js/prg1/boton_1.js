document.getElementById("id_2").addEventListener("click", () => {

    let sesionJson = JSON.parse(localStorage.getItem("sesion"));
    sesionJson.fecha = new Date().getDate();
    localStorage.setItem("sesion", JSON.stringify(sesionJson));

    let texto = document.getElementById("id_1").value;
    prg = localStorage.getItem("prgActual");

    let funcion = (id, value) => {
        document.getElementById(id).value = value
    };

    sesionJson[prg].data[0].id = "id_1";
    sesionJson[prg].data[0].funcion = funcion.toString();
    sesionJson[prg].data[0].value = texto;

    localStorage.setItem("sesion", JSON.stringify(sesionJson))
});


