var botonNuevo = document.getElementById("id_21");
var botonEditar = document.getElementById("id_22");
var botonBorrar = document.getElementById("id_23");

var botonPDF = document.getElementById("id_24");
var botonExcel = document.getElementById("id_25");

var botonGuardado = document.getElementById("id_26");
var botonCancelar = document.getElementById("id_27");

var tabla = document.getElementById("id_28");

var cuerpoDatos = document.getElementById("id_32");



setHabilitado(botonEditar.id, false);
setHabilitado(botonBorrar.id, false);

setHabilitado(botonPDF.id, false);
setHabilitado(botonExcel.id, false);

setHabilitado(botonGuardado.id, false);
setHabilitado(botonCancelar.id, false);

setHabilitado(cuerpoDatos.id, false);








function funcionNuevo() {
    setHabilitado(botonNuevo.id, false);
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);

    setHabilitado(botonGuardado.id, true);
    setHabilitado(botonCancelar.id, true);

    deseleccionarFilas();
    setHabilitado(tabla.id, false);

    setHabilitado(cuerpoDatos.id, true);
}

function funcionEditar() {
    console.debug("clic en editar");

    setHabilitado(botonNuevo.id, false);
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);

    setHabilitado(botonGuardado.id, true);
    setHabilitado(botonCancelar.id, true);

    setHabilitado(tabla.id, true);
    setBloqueada(tabla.id, true);

    setHabilitado(cuerpoDatos.id, true);

}

function funcionBorrar() {
    console.debug("funcion borrar");
    deseleccionarFilas();
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);
}

function funcionGuardar() {
    console.debug("Funcion guardado");

    showPopup("Elemento guardado.", PopupTipo.OK);

    setHabilitado(botonNuevo.id, true);
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);

    setHabilitado(botonGuardado.id, false);
    setHabilitado(botonCancelar.id, false);

    setHabilitado(cuerpoDatos.id, false);

    setHabilitado(tabla.id, true);
    setBloqueada(tabla.id, false);
}

function funcionCancelar() {
    setHabilitado(botonNuevo.id, true);
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);

    setHabilitado(botonGuardado.id, false);
    setHabilitado(botonCancelar.id, false);

    setHabilitado(cuerpoDatos.id, false);

    setHabilitado(tabla.id, true);
    setBloqueada(tabla.id, false);

    if (filaSeleccionadaTabla1 !== undefined && filaSeleccionadaTabla1 !== null) {
        setHabilitado(botonEditar.id, true);
        setHabilitado(botonBorrar.id, true);
    }
}

/* #region  funciones */

function guardar() {

}

function borrar(){
    
}

/* #endregion */



botonNuevo.onclick = funcionNuevo;
botonEditar.onclick = funcionEditar;
botonBorrar.onclick = funcionBorrar;

botonGuardado.onclick = funcionGuardar;
botonCancelar.onclick = funcionCancelar;






