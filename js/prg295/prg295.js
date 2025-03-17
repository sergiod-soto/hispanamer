var botonNuevo = document.getElementById("id_21");
var botonEditar = document.getElementById("id_22");
var botonBorrar = document.getElementById("id_23");

var botonPDF = document.getElementById("id_24");
var botonExcel = document.getElementById("id_25");

var botonGuardado = document.getElementById("id_26");
var botonCancelar = document.getElementById("id_27");

var tabla = document.getElementById("id_28");





setHabilitado(botonPDF.id, false);
setHabilitado(botonExcel.id, false);
setHabilitado(botonGuardado.id, false);
setHabilitado(botonCancelar.id, false);
setHabilitado(botonEditar.id, false);
setHabilitado(botonBorrar.id, false);








function funcionNuevo() {
    setHabilitado(botonGuardado.id, true);
    setHabilitado(botonCancelar.id, true);
    setHabilitado(botonNuevo.id, false);
    deseleccionarFilas();
    setHabilitado(tabla.id, false);
}

function funcionEditar() {
    console.debug("clic en editar");
}

function funcionBorrar() {
    console.debug("funcion borrar");
    deseleccionarFilas();
    setHabilitado(botonEditar.id, false);
    setHabilitado(botonBorrar.id, false);
}

function funcionGuardar() {
    console.debug("Funcion guardado");
    setHabilitado(botonNuevo.id, true);
    setHabilitado(botonGuardado.id, false);
    setHabilitado(botonCancelar.id, false);
    setHabilitado(tabla.id, true);
}
function funcionCancelar() {
    setHabilitado(botonGuardado.id, false);
    setHabilitado(botonCancelar.id, false);
    setHabilitado(botonNuevo.id, true);
    setHabilitado(tabla.id, true);
}






botonNuevo.onclick = funcionNuevo;
botonEditar.onclick = funcionEditar;
botonBorrar.onclick = funcionBorrar;

botonGuardado.onclick = funcionGuardar;
botonCancelar.onclick = funcionCancelar;




