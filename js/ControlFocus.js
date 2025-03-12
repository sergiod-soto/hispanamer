
const mapa = new Map();

function setFocos(arrayFocos) {

    //      PROGRAMACION DEFENSIVA
    //
    //      - array vacio
    //      - indeterminacion siguiente elemento (a->b, a->c)
    //

    if (arrayFocos.length <= 1) {
        throw "arrayFocos.length <= 1";
    }

    for (let i = 0; i < arrayFocos.length - 1; i++) {
        if (mapa.get(arrayFocos[i]) != undefined) {
            throw "Indeterminación añadiendo focos: " + arrayFocos[i] + " añadido multiples veces.";
        }
        mapa.set(arrayFocos[i], arrayFocos[i + 1]);
        setFoco(arrayFocos[i], arrayFocos[i + 1]);
    }








    /**
     *  Enlaza un elemento con su siguiente 'Tab' y su siguiente 'Enter'
     * 
     *  Este metodo se encarga de detectar cuando se debe cambiar el foco y
     *  que hacer cuando en un elemento se presionan TAB o ENTER
     * 
     *  En los siguientes metodos se define que se hace cuando se llega a
     *  un elemento porque en otro se ha presionado TAB o ENTER
     * 
     *  ******************************************************************
     * 
     *  A futuro, deberia ampliarse para aceptar el uso de flechas y/u otros
     *  inputs.
     * 
     *  Por ejemplo, cambiar el movimiento de los radioButton a flechas
     *  en lugar del tab
     * 
     *  ******************************************************************
     * 
     * 
     * 
     * 
     * @param {*} elementoActualID 
     * @param {*} elementoTabID 
     * @param {*} elementoEnterID 
     */
    function setFoco(elementoActualID, elementoSiguienteID) {
        var elementoActual = document.getElementById(elementoActualID);
        var elementoSiguiente = document.getElementById(elementoSiguienteID);

        switch (elementoActual.getAttribute("data-tipo")) {

            case ("Button"):
                // no hace falta hacer nada (creo)
                break;

            case ("CheckBox"):
                elementoActual.addEventListener("keydown", function (event) {
                    if (event.key === "Enter" &&
                        document.activeElement === elementoActual) {

                        elementoActual.checked = !elementoActual.checked;
                        event.preventDefault();
                        auxEnter(elementoActual, elementoSiguiente, event);
                    }
                });
                break;

            case ("DateBox"):
                throw "no se puede poner un datebox como objetivo de foco"

            case ("NoteBox"):
                elementoActual.addEventListener("keydown", function (event) {
                    if (event.key === "Tab" && !event.shiftKey) {

                        event.preventDefault();
                        auxTab(elementoActual, elementoSiguiente, event);
                    }
                });
                break;

            case ("PasswordBox"):
                elementoActual.addEventListener("keydown", function (event) {
                    if (event.key === "Tab" && !event.shiftKey) {

                        event.preventDefault();
                        auxTab(elementoActual, elementoSiguiente, event);
                    }
                });
                break;

            case ("RadioButton"):

                elementoActual.addEventListener("keydown", function (event) {

                    var idActivo = extraerX(document.activeElement.id);

                    if ((event.key === "Tab" && !event.shiftKey) &&
                        idActivo === elementoActual.id) {

                        event.preventDefault();
                        auxTab(elementoActual, elementoActual, event);
                    }
                    if (event.key === "Enter" &&
                        idActivo === elementoActual.id) {
                        event.preventDefault();

                        radioButtons.get(elementoActual.id).forEach(element => {
                            element.checked = false;
                        });
                        event.target.checked = true;

                        auxEnter(elementoActual, elementoSiguiente, event);
                    }
                });
                break;

            case ("SelectBox"):

                break;

            case ("Tabla"):
                // TODO
                break;

            case ("TextBox"):
                elementoActual.addEventListener("keydown", function (event) {
                    if ((event.key === "Tab" && !event.shiftKey) ||
                        event.key === "Enter" &&
                        document.activeElement === elementoActual) {

                        event.preventDefault();
                        auxTab(elementoActual, elementoSiguiente, event);
                    }
                });
                break;

            case ("Texto"):
                // DEJAR VACIO
                break;

            case ("TimeBox"):
                throw "no se puede poner un timebox como objetivo de foco"

            default:
                throw "Tipo de elemento desconocido";
        }

        /**
         *  Esta es la funcion que decide como se cambia el foco 
         *  en funcion del elemento objetivo cuando se hace TAB
         * 
         * @param {*} elementoActual        // de donde viene el foco
         * @param {*} elementosiguiente     // a donde va el foco
         */

        function auxTab(elementoActual, elementoSiguiente, event) {
            switch (elementoSiguiente.getAttribute("data-tipo")) {

                case ("Button"):
                    // no hace falta hacer nada
                    break;

                case ("CheckBox"):
                    elementoSiguiente.focus();
                    break;

                case ("DateBox"):
                    throw "no se puede poner un datebox como objetivo de siguiente foco"

                case ("NoteBox"):
                    elementoSiguiente.focus();
                    break;

                case ("PasswordBox"):
                    elementoSiguiente.focus();
                    break;

                case ("RadioButton"):
                    if (elementoActual != elementoSiguiente) {

                        // entro al radio button desde un elemento externo
                        // tengo que poner el foco en el elemento [0]
                        var selector = radioButtons.get(elementoSiguiente.id);
                        var aux = false;
                        selector.forEach(radio => {
                            if (radio.checked == true) {
                                aux = true;
                                radio.focus();
                                return;
                            }
                        });
                        if (!aux) {
                            // no deberia entrar aqui, pero bueno.

                            console.debug("no deberia entrar");
                            selector[0].checked = true;
                            selector[0].focus();
                        }

                    } else {

                        // He tabulado desde el mismo radioButton.
                        // He de cambiar el focus
                        var idRadioActivo = extraerY(document.activeElement.id);
                        try {
                            radioButtons.get(elementoActual.id)[parseInt(idRadioActivo) + 1].focus();
                        } catch (err) {
                            radioButtons.get(elementoActual.id)[0].focus();

                        }

                    }
                    break;

                case ("SelectBox"):

                    break;

                case ("Tabla"):
                    // TODO
                    break;

                case ("TextBox"):
                    elementoSiguiente.focus();
                    break;

                case ("Texto"):
                    // DEJAR VACIO
                    break;

                case ("TimeBox"):
                    throw "no se puede poner un timebox como objetivo de siguiente foco"

                default:
                    throw "Tipo de elemento desconocido";
            }
        };


        /**
         *  Esta es la funcion que decide como se cambia el foco 
         *  en funcion del elemento objetivo cuando se hace ENTER
         * 
         * @param {*} elementoActual        // de donde viene el foco
         * @param {*} elementosiguiente     // a donde va el foco
         */

        function auxEnter(elementoActual, elementosiguiente, event) {

            switch (elementosiguiente.getAttribute("data-tipo")) {

                case ("Button"):
                    // no hace falta hacer nada
                    break;

                case ("CheckBox"):
                    elementoSiguiente.focus();
                    break;

                case ("DateBox"):
                    throw "no se puede poner un datebox como objetivo de siguiente foco"

                case ("NoteBox"):


                    break;

                case ("PasswordBox"):
                    elementoSiguiente.focus();
                    break;

                case ("RadioButton"):

                    var selector = radioButtons.get(elementoSiguiente.id);
                    var aux = false;
                    selector.forEach(radio => {
                        if (radio.checked == true) {
                            aux = true;
                            radio.focus();
                            return;
                        }
                    });
                    if (!aux) {
                        // no deberia entrar aqui, pero bueno.

                        console.debug("no deberia entrar");
                        selector[0].checked = true;
                        selector[0].focus();
                    }

                    break;

                case ("SelectBox"):


                    break;

                case ("Tabla"):
                    // TODO
                    break;

                case ("TextBox"):
                    elementoSiguiente.focus();
                    break;

                case ("Texto"):
                    // DEJAR VACIO
                    break;

                case ("TimeBox"):
                    throw "no se puede poner un timebox como objetivo de siguiente foco"

                default:
                    throw "Tipo de elemento desconocido";
            }
        };

        function extraerX(id) {
            // Si la cadena ya es del tipo "id_X", la retornamos tal cual
            if (/^id_\d+$/.test(id)) {
                return id;
            }

            // Si la cadena es del tipo "rb_id_X_Y", extraemos "id_X"
            const match = id.match(/^rb_(id_\d+)_\d+$/);
            return match ? match[1] : null; // Retorna "id_X" o null si no coincide
        }

        function extraerY(id) {
            const match = id.match(/^rb_id_\d+_(\d+)$/);
            return match ? match[1] : null; // Retorna "Y" o null si no coincide
        }
    }
}
