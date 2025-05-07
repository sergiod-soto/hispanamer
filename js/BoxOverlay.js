var lastBoxOverlay = null;

function showOverlay(idBoxOverlay) {
    const overlay = document.getElementById(idBoxOverlay);
    const content = document.getElementById('overlay-content');
    content.innerHTML = htmlContent;
    overlay.classList.remove('overlay-hidden');
    lastBoxOverlay = idBoxOverlay;
  }

  function hideOverlay() {
    document.getElementById(lastBoxOverlay).classList.add('overlay-hidden');
  }

  // Ocultar al hacer clic fuera del contenido
  window.addEventListener('click', function(e) {
    const overlay = document.getElementById(lastBoxOverlay);
    const content = overlay.querySelector(".overlay-content");
    if (e.target !== content) {
      hideOverlay();
    }
  });