function setHabilitado(elementoID, bool) {
    try {
        var elemento = document.getElementById(elementoID);
    } catch (e) {
        throw "Elemento no encontrado (" + elementoID + ")"
    }
    if (bool) {
        // hay que habilitar
        if (elemento.classList.contains("deshabilitado")) {
            elemento.classList.remove("deshabilitado");
        }
        elemento.classList.add("habilitado");
    } else {
        // hay que deshabilitar
        if (elemento.classList.contains("habilitado")) {
            elemento.classList.remove("habilitado");
        }
        elemento.classList.add("deshabilitado");
    }
}

//
//
//

function setVisible(elementoID, bool) {
    try {
        var elemento = document.getElementById(elementoID);
    } catch (e) {
        throw "Elemento no encontrado (" + elementoID + ")"
    }
    if (bool) {
        // hay que volver visible
        if (elemento.classList.contains("invisible")) {
            elemento.classList.remove("invisible");
        }
        elemento.classList.add("visible");
    } else {
        // hay que volver invisible
        if (elemento.classList.contains("visible")) {
            elemento.classList.remove("visible");
        }
        elemento.classList.add("invisible");
    }
}


function setTransparente(elementoID, bool) {
    try {
        var elemento = document.getElementById(elementoID);
    } catch (e) {
        throw "Elemento no encontrado (" + elementoID + ")"
    }
    if (bool) {
        // hay que volver transparente
        if (elemento.classList.contains("opaco")) {
            elemento.classList.remove("opaco");
        }
        elemento.classList.add("transparente");
    } else {
        // hay que volver opaco
        if (elemento.classList.contains("transparente")) {
            elemento.classList.remove("transparente");
        }
        elemento.classList.add("opaco");
    }
}

function setBloqueada(tablaID, bool) {
    try {
        var elemento = document.getElementById(tablaID);
    } catch (e) {
        throw "Tabla no encontrada (" + tablaID + ")"
    }
    if (bool) {
        // hay que bloquearla
        if (elemento.classList.contains("tablaDesbloqueada")) {
            elemento.classList.remove("tablaDesbloqueada");
        }
        elemento.classList.add("tablaBloqueada");
    } else {
        // hay que desbloquearla
        if (elemento.classList.contains("tablaBloqueada")) {
            elemento.classList.remove("tablaBloqueada");
        }
        elemento.classList.add("tablaDesbloqueada");
    }
}