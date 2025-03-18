
const PopupTipo = Object.freeze({
    OK: "bien",
    WARNING: "advertencia",
    ERROR: "error",
    NORMAL: "normal"
});





const timeDisplayed = 2000; // milisegundos que dura el popup visible

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
            if (new Date() - lastClickTime >= timeDisplayed) {
                popup.style.display = 'none';
            }
        },
        timeDisplayed);
}

function cambiarEstado(elemento, nuevoEstado) {
    elemento.className = elemento.className.replace(/(?<=\bpopup\s+)\S+/, nuevoEstado);
}