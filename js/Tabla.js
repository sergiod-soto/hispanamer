document.addEventListener('DOMContentLoaded', function () {
  // Se seleccionan todas las celdas de la cabecera
  const headers = document.querySelectorAll('thead th');
  headers.forEach(header => {
    header.addEventListener('click', function () {
      // Acción a ejecutar al hacer clic en cada cabecera
      console.log("Se hizo clic en la cabecera:", this.textContent.trim());
      // Aquí puedes añadir la funcionalidad adicional deseada.
    });
  });
});