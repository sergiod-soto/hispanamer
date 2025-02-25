//#region

if (localStorage.getItem("sesion") == null) {
    // no hay sesion en localstorage
    prgActual = localStorage.getItem("prgActual");
    let sesion =
    {
        "fecha": new Date().getDate(),
        [prgActual]: {
            "data":
            {

            }
        }
    };
    localStorage.setItem("sesion", JSON.stringify(sesion));

} else {
    // hay sesion, pero o no hay fecha, o no es valida
    let sesion = JSON.parse(localStorage.getItem("sesion"))

    if (sesion.fecha != new Date().getDate()) {
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


                // new Function("return" + data[i].funcion)()(data[i].id, data[i].value);
                llaves = Object.keys(data)

                for (i = 0; i < llaves.length; i++) {
                    key = llaves[i];
                    new Function("return" + data[key].funcion)()(key, data[key].value);
                }
            }
        }
    }
}
//#endregion




//////////////////////////////////////////////////////////
/**
 *  Enum para elegir el tipo de elemento a guardar informacion
 */
const Elemento = {
    Button: "Button",
    CheckBox: "CheckBox",
    DateBox: "DateBox",
    HourBox: "HourBox",
    NoteBox: "NoteBox",
    PasswordBox: "PasswordBox",
    RadioButton: "RadioButton",
    SelectBox: "SelectBox",
    Tabla: "Tabla",
    TextBox: "TextBox",
    Texto: "Texto",
    TimeBox: "TimeBox",
};

/**
 * Pasa de id {string:id_X} a {int:X}
 * @param {String} texto
 * @returns id
 */
function extraerNumero(texto) {
    const match = texto.match(/^id_(\d+)$/);
    return match ? parseInt(match[1], 10) : null;
}

function guardar(elemento, id) {

    // primero, actualizo la fecha de la sesion
    let sesionJson = JSON.parse(localStorage.getItem("sesion"));
    sesionJson.fecha = new Date().getDate();
    localStorage.setItem("sesion", JSON.stringify(sesionJson));

    switch (elemento) {
        case ("Button"):

            break;
        case ("CheckBox"):

            break;
        case ("DateBox"):

            break;
        case ("HourBox"):

            break;
        case ("NoteBox"):

            break;
        case ("PasswordBox"):

            break;
        case ("RadioButton"):

            break;
        case ("SelectBox"):

            break;
        case ("Tabla"):

            break;
        case ("TextBox"):
            prg = localStorage.getItem("prgActual");

            value = document.getElementById(id).value;
            let funcion = (id, value) => {
                document.getElementById(id).value = value
            };
            sesionJson[prg].data[id] = {};
            sesionJson[prg].data[id].funcion = funcion.toString();
            sesionJson[prg].data[id].value = value;

            localStorage.setItem("sesion", JSON.stringify(sesionJson))
            break;
        case ("Texto"):

            break;
        case ("TimeBox"):

            break;
    }
}


