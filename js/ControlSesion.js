
// se cambia a que no haga falta guardar nada


// //#region

// if (localStorage.getItem("sesion") == null) {
//     // no hay sesion en localstorage
//     prgActual = localStorage.getItem("prgActual");
//     let sesion =
//     {
//         "fecha": new Date().getDate(),
//         [prgActual]: {
//             "data":
//             {

//             }
//         }
//     };
//     localStorage.setItem("sesion", JSON.stringify(sesion));

// } else {
//     // hay sesion, pero o no hay fecha, o no es valida
//     let sesion = JSON.parse(localStorage.getItem("sesion"))

//     if (sesion.fecha != new Date().getDate()) {
//         localStorage.removeItem("sesion");

//     } else {
//         // hay sesion correcta
//         sesion = localStorage.getItem("sesion");
//         prg = localStorage.getItem("prgActual");


//         if (sesion != null) {
//             sesion = JSON.parse(sesion);

//             if (sesion[prg] != null) {
//                 // hay sesion activa, ponemos la pagina como debe:
//                 data = sesion[prg].data;


//                 llaves = Object.keys(data)

//                 for (i = 0; i < llaves.length; i++) {
//                     key = llaves[i];
//                     try {
//                         new Function("return" + data[key].funcion)()(key, data[key].value);
//                     } catch (e) {
//                         console.error("error cargando la funcion a ejecutar: " + e)
//                     }
//                 }
//             }
//         }
//     }
// }


// //#endregion




// //////////////////////////////////////////////////////////
// /**
//  *  Enum para elegir el tipo de elemento a guardar informacion
//  */
// const Elemento = {
//     Button: "Button",
//     CheckBox: "CheckBox",
//     DateBox: "DateBox",
//     NoteBox: "NoteBox",
//     PasswordBox: "PasswordBox",
//     RadioButton: "RadioButton",
//     SelectBox: "SelectBox",
//     Tabla: "Tabla",
//     TextBox: "TextBox",
//     Texto: "Texto",
//     TimeBox: "TimeBox",
// };




// /**
//  * Se guarda cada elemento por tipo
//  * 
//  * @param {String} id 
//  */

// function guardar(ids) {

//     if (ids === undefined || ids === null || ids.length <= 0) {
//         throw "Para guardar, ingrese array de ids.";
//     }
//     ids.forEach((element, i) => {
//         if (element === undefined || element === null || element == "") {
//             throw "No se pueden guardar elementos vacios (elemento n: " + i + ")";
//         }
//         if (document.getElementById(element) === undefined || document.getElementById(element) === null) {
//             throw "Elemento n: " + i + " (" + element + ") no encontrado.";
//         }
//     });

//     ids.forEach(element => {
//         guardarElemento(element);
//     });

//     function guardarElemento(id) {

//         // obtengo el atributo "data-tipo" del elemento con "id"
//         elemento = document.getElementById(id).getAttribute("data-tipo");
//         switch (elemento) {

//             case ("Button"):
//                 /**
//                  *  nada que hacer aqui
//                  */
//                 break;

//             case ("CheckBox"):
//                 document.getElementById(id).addEventListener("change", () => {
//                     guardarAux(Elemento.CheckBox, id, document.getElementById(id).checked)
//                 });
//                 break;

//             case ("DateBox"):
//                 document.addEventListener("fechaSeleccionada" + id, (event) => {
//                     value = event.detail.date
//                     guardarAux(Elemento.DateBox, id, value);
//                 });
//                 break;

//             case ("NoteBox"):
//                 document.getElementById(id).addEventListener("input", function () {
//                     guardarAux(Elemento.NoteBox, id, document.getElementById(id).value);
//                 });
//                 break;

//             case ("PasswordBox"):
//                 document.getElementById(id).addEventListener("input", function () {
//                     guardarAux(Elemento.PasswordBox, id, document.getElementById("input" + id).value);
//                 });
//                 break;

//             case ("RadioButton"):
//                 document.getElementById(id).addEventListener("input", function (event) {
//                     guardarAux(Elemento.RadioButton, id, event.target.value);
//                 });
//                 break;

//             case ("SelectBox"):
//                 document.getElementById(id).addEventListener("change", function () {
//                     guardarAux(Elemento.SelectBox, id, document.getElementById("select" + id).value);
//                 });
//                 break;

//             case ("Tabla"):
//                 document.getElementById(id).childNodes[3].addEventListener("scroll", function () {
//                     guardarAux(Elemento.Tabla, id, document.getElementById(id).childNodes[3].scrollTop);
//                 });
//                 break;

//             case ("TextBox"):
//                 document.getElementById(id).addEventListener("input", function () {
//                     guardarAux(Elemento.TextBox, id, document.getElementById(id).value);
//                 });
//                 break;

//             case ("Texto"):
//                 // DEJAR VACIO
//                 break;

//             case ("TimeBox"):
//                 document.addEventListener("horaSeleccionada" + id, (event) => {
//                     value = event.detail.time;
//                     guardarAux(Elemento.TimeBox, id, value);
//                 });
//                 break;
//         }



//         /** 
//          * En esta seccion elegimos de que manera se
//          * guarda cada elemento por tipo
//          * 
//          * @param {Elemento} elemento 
//          * @param {String} id 
//          * @param {*} value
//          */
//         function guardarAux(elemento, id, value) {
//             // primero, actualizo la fecha de la sesion
//             let sesionJson = JSON.parse(localStorage.getItem("sesion"));
//             sesionJson.fecha = new Date().getDate();

//             prg = localStorage.getItem("prgActual");

//             if (prg == null || prg == undefined) {
//                 return;
//             }

//             if (sesionJson[prg].data[id] == undefined) {
//                 sesionJson[prg].data[id] = {};
//             }

//             localStorage.setItem("sesion", JSON.stringify(sesionJson));


//             switch (elemento) {
//                 case ("Button"):
//                     /**
//                      *  nada que hacer aqui
//                      */
//                     break;

//                 case ("CheckBox"):
//                     checked = value;

//                     funcion = (id, checked) => {
//                         document.getElementById(id).checked = checked
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = checked;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("DateBox"):
//                     funcion = (id, value) => {
//                         value = JSON.parse(value)
//                         document.getElementById(id).querySelector(".fechaInput").value = value;
//                     }

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = JSON.stringify(value);

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("NoteBox"):
//                     funcion = (id, value) => {
//                         document.getElementById(id).value = value
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("PasswordBox"):
//                     funcion = (id, value) => {
//                         document.getElementById("input" + id).value = value
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("RadioButton"):
//                     funcion = (id, value) => {
//                         document.getElementById(id).
//                             querySelector(`input[type="radio"][value="${value}"]`).checked = true;
//                     }

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("SelectBox"):
//                     funcion = (id, value) => {
//                         document.getElementById("select" + id).value = value
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson));
//                     break;

//                 case ("Tabla"):
//                     funcion = (id, value) => {
//                         document.getElementById(id).childNodes[3].scrollTop = value
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("TextBox"):

//                     funcion = (id, value) => {
//                         document.getElementById(id).value = value
//                     };

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;

//                 case ("Texto"):
//                     // DEJAR VACIO
//                     break;

//                 case ("TimeBox"):

//                     funcion = (id, value) => {
//                         document.getElementById(id).querySelector(".timeInput").value = value;
//                     }

//                     sesionJson[prg].data[id].funcion = funcion.toString();
//                     sesionJson[prg].data[id].value = value;

//                     localStorage.setItem("sesion", JSON.stringify(sesionJson))
//                     break;
//             }
//         }
//     }
// }



document.addEventListener("keydown", function (event) {
    if (event.key === "F5" || (event.ctrlKey && event.key === "r")) {
        event.preventDefault();
        if (confirm("¿Seguro que quieres salir de la página?")) {
            location.reload();
        }
    }
});