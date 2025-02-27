
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


                llaves = Object.keys(data)

                for (i = 0; i < llaves.length; i++) {
                    key = llaves[i];
                    try {
                        new Function("return" + data[key].funcion)()(key, data[key].value);
                    } catch (e) {
                        console.error("error cargando la funcion a ejecutar: " + e)
                    }
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

/**
 * No usar esta funcion, guardar con "guardar()"
 * 
 * En esta seccion elegimos de que manera se
 * guarda cada elemento por tipo
 * 
 * @param {Elemento} elemento 
 * @param {String} id 
 */
function guardarAux(elemento, id, value) {

    // primero, actualizo la fecha de la sesion
    let sesionJson = JSON.parse(localStorage.getItem("sesion"));
    sesionJson.fecha = new Date().getDate();

    prg = localStorage.getItem("prgActual");

    if (sesionJson[prg].data[id] == undefined) {
        sesionJson[prg].data[id] = {};
    }

    localStorage.setItem("sesion", JSON.stringify(sesionJson));


    switch (elemento) {
        case ("Button"):
            /**
             *  nada que hacer aqui
             */
            break;

        case ("CheckBox"):
            checked = value;

            funcion = (id, checked) => {
                document.getElementById(id).checked = checked
            };

            sesionJson[prg].data[id].funcion = funcion.toString();
            sesionJson[prg].data[id].value = checked;

            localStorage.setItem("sesion", JSON.stringify(sesionJson))
            break;

        case ("DateBox"):
            ///////////////////////////////////////////////////////////
            funcion = (id, value) => {
                value = JSON.parse(value)
                document.getElementById(id).querySelector(".fechaInput").value = value;
            }

            sesionJson[prg].data[id].funcion = funcion.toString();
            sesionJson[prg].data[id].value = JSON.stringify(value);

            localStorage.setItem("sesion", JSON.stringify(sesionJson))
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

            funcion = (id, value) => {
                document.getElementById(id).value = value
            };
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

/**
 * En esta parte elegimos que evento provoca que 
 * se guarde cada elemento por tipo
 * 
 * @param {Elemento} elemento 
 * @param {String} id 
 */
function guardar(elemento, id) {
    switch (elemento) {

        case ("Button"):
            /**
             *  nada que hacer aqui
             */
            break;

        case ("CheckBox"):
            document.getElementById(id).addEventListener("change", () => {
                guardarAux(Elemento.CheckBox, id, document.getElementById(id).checked)
            });
            break;

        case ("DateBox"):
            document.addEventListener("fechaSeleccionada" + id, (event) => {
                value = event.detail.date
                guardarAux(Elemento.DateBox, id, value);
            });
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
            document.getElementById(id).addEventListener("input", function () {
                guardarAux(Elemento.TextBox, id, document.getElementById(id).value);
            });
            break;

        case ("Texto"):

            break;

        case ("TimeBox"):

            break;
    }
}