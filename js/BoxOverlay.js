

/**
 * variables
 * 
 */
tiempoEspera = 300 // ms durante los cuales no se puede quitar
/**
 * 
 * 
 */














cerrable = false;

function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function showOverlay(idBoxOverlay) {
    document.getElementById("overlayBaseID").classList.remove('overlay-hidden');
    document.getElementById(idBoxOverlay).classList.remove('content-hidden');
    await wait(tiempoEspera);
    cerrable = true;
}

function hideOverlay() {
    document.getElementById("overlayBaseID").classList.add('overlay-hidden');

    document.querySelectorAll(".overlay-content").forEach(function (content) {
        content.classList.add('content-hidden');
    });

    cerrable = false;
}









const aux = (e) => {
    overlay = document.getElementById("overlayBaseID");



    dentro = false;
    document.querySelectorAll(".overlay-content").forEach(function (content) {
        if (e.target === content) {
            dentro = true;
        }
    });
    if (!dentro && cerrable) {
        hideOverlay();
    }
}







// Ocultar al hacer clic fuera del contenido
window.addEventListener('click', aux);







