
var tablaIzq = document.getElementById("tablatablaIzq");




function clicIzqTablaIzq(index, event) {
    console.debug("clic izq, index: " + index);
}

function clicDerTablaIzq(index, event) {

    mostrarMenu("desplegableid_0", event);

}


funcionFilaClicIzq(tablaIzq, (index, event) => { clicIzqTablaIzq(index, event) });
funcionFilaClicDer(tablaIzq, (index, event) => { clicDerTablaIzq(index, event) });