
var tablaIzq = document.getElementById("tablatablaIzq");




function clicIzqTablaIzq(index) {
    console.debug("clic izq, index: " + index);
}

function clicDerTablaIzq(index) {
    console.debug("clic der, index: " + index);

}


funcionFilaClicIzq(tablaIzq, (index) => { clicIzqTablaIzq(index) });
funcionFilaClicDer(tablaIzq, (index) => { clicDerTablaIzq(index) });