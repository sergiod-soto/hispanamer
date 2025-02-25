localStorage.getItem("sesion").fecha = new Date().getDate();

let texto = getElementById("id_1").value;
let sesion = localStorage.getItem("sesion");
prg = localStorage.getItem("pregActual");

let funcion = (id, value) => {
    document.getelementById(id).value = value
};

sesion[prg]["data"][0]["id"] = "id_1";
sesion[prg]["data"][0]["funcion"] = funcion.toString();
sesion[prg]["data"][0]["value"] = texto;
