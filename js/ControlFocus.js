/**
 *  Enlaza un elemento con su siguiente 'Tab' y su siguiente 'Enter'
 * 
 *  Este metodo se encarga de detectar cuando se debe cambiar el foco
 * 
 *  El otro metodo (sgv8s8fvd()) no se debe llamar y es el que se encarga de 
 *  decidir como cambiarlo
 * 
 * 
 * @param {*} elementoActualID 
 * @param {*} elementoTabID 
 * @param {*} elementoEnterID 
 */

function setFoco(elementoActualID, elementoSiguienteID) {
    var elementoActual = document.getElementById(elementoActualID);
    var elementoSiguiente = document.getElementById(elementoSiguienteID);

    console.debug(elementoActual)

    switch (elementoActual.getAttribute("data-tipo")) {

        case ("Button"):


            break;

        case ("CheckBox"):


            break;

        case ("DateBox"):


            break;

        case ("NoteBox"):


            break;

        case ("PasswordBox"):


            break;

        case ("RadioButton"):
            elementoActual.addEventListener("keydown", function (event) {
                if ((event.key === "Tab" && !event.shiftKey) &&
                    document.activeElement === elementoActual) {

                    event.preventDefault();
                    auxTab(elementoActual, elementoActual, event);
                }
                if (event.key === "Enter" &&
                    document.activeElement === elementoActual) {

                    event.preventDefault();
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
                    auxTab(elementoActual, elementoTab, event);
                }
            });
            break;

        case ("Texto"):
            // DEJAR VACIO
            break;

        case ("TimeBox"):

            break;
    }

    /**
     *  Esta es la funcion que decide como se cambia el foco 
     *  en funcion del elemento objetivo cuando se hace TAB
     * 
     * @param {*} elementoActual 
     * @param {*} elementoTab 
     * @param {*} elementoEnter 
     */

    function auxTab(elementoActual, elementoTab, event) {
        switch (elementoTab.getAttribute("data-tipo")) {

            case ("Button"):


                break;
            case ("CheckBox"):


                break;
            case ("DateBox"):


                break;
            case ("NoteBox"):


                break;
            case ("PasswordBox"):


                break;
            case ("RadioButton"):

                if (elementoActual != elementoTab) {
                    // entro al radio button desde un elemento externo
                    // tengo que poner el foco en el elemento [0]
                } else {

                }






                break;
            case ("SelectBox"):


                break;
            case ("Tabla"):
                // TODO
                break;

            case ("TextBox"):
                elementoTab.focus();
                break;
            case ("Texto"):
                // DEJAR VACIO
                break;
            case ("TimeBox"):

                break;
        }
    };


    /**
     *  Esta es la funcion que decide como se cambia el foco 
     *  en funcion del elemento objetivo cuando se hace ENTER
     * 
     * @param {*} elementoActual 
     * @param {*} elementoTab 
     * @param {*} elementoEnter 
     */

    function auxEnter(elementoActual, elementoEnter, event) {
        switch (elementoTab.getAttribute("data-tipo")) {

            case ("Button"):


                break;
            case ("CheckBox"):


                break;
            case ("DateBox"):


                break;
            case ("NoteBox"):


                break;
            case ("PasswordBox"):


                break;
            case ("RadioButton"):


                console.debug("entra enter")






                break;
            case ("SelectBox"):


                break;
            case ("Tabla"):
                // TODO
                break;

            case ("TextBox"):
                elementoTab.focus();
                break;
            case ("Texto"):
                // DEJAR VACIO
                break;
            case ("TimeBox"):

                break;
        }
    };

    function obtenerRadioButtonSeleccionado(rb) {
        rb = radioButtons.get(rb);
        for (let i = 0; i < rb.lenth; i++) {
            if (rb[i].checked == true) {
                return rb[i];
            }
        }
        return rb[0];
    }
}