botones1 = document.getElementsByClassName("b1");


//console.dir(botones1);



// Verificar que el botón existe antes de agregar el evento
if (botones1) {
    botones1 = Array.from(botones1);
    for (let i = 0; i < botones1.length; i++) {
        botones1[i].addEventListener("click", function () {
            let fila = botones1[i]["parentElement"]["parentElement"]["id"]
            const partes = fila.split("_"); // ["idFila", "123"]
            const numero = parseInt(partes[1], 10);
            alert("clic en boton 1 de la fila: " + numero);
        });
    }

}
