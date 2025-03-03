var lastClickTime = new Date();


function showPopup(texto, tipo) {
    lastClickTime = new Date();

    var popup = document.getElementById('popup');
    popup.innerHTML = texto;

    // cambiar la clase en funcion del 'tipo'
    cambiarEstado(popup, tipo);

    popup.style.display = 'flex'; // Muestra el popup

    setTimeout(
        function () {
            if (new Date() - lastClickTime >= 2000) {
                popup.style.display = 'none';
            }
        },
        2000);
}

function cambiarEstado(elemento, nuevoEstado) {
    elemento.className = elemento.className.replace(/(?<=\bpopup\s+)\S+/, nuevoEstado);
}