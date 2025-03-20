var tablaIzq = document.getElementById("tablatablaDer");



function clicIzqTablaDer(index, event) {
    console.debug("clic izq, index: " + index);
}

function clicDerTablaDer(index, event) {


}


funcionFilaClicIzq(tablaIzq, (index, event) => { clicIzqTablaDer(index, event) });
funcionFilaClicDer(tablaIzq, (index, event) => { clicDerTablaDer(index, event) });