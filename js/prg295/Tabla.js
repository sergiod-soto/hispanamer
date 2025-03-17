funcionCabecera((header) => {

});


funcionFila((index) => {
    filaSeleccionadaTabla1 = index;

    setHabilitado(botonEditar.id, true);
    setHabilitado(botonBorrar.id, true);
});
