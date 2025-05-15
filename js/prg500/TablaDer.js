var tablaDer = document.getElementById("tablaDer");



function clicIzqTablaDer(index, event) { }

function clicDerTablaDer(index, event) {
    mostrarMenu(desplegableTablaDerecha, event);
}

funcionFilaClicIzq(tablaDer, (index, event) => { clicIzqTablaIzq(index, event) });
funcionFilaClicDer(tablaDer, (index, event) => { clicDerTablaDer(index, event) });