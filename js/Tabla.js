function funcionCabecera(f) {
  // Se seleccionan todas las celdas de la cabecera
  const headers = document.querySelectorAll('thead th');
  headers.forEach(header => {
    header.addEventListener('click', function () {
      f();
    });
  });

  // pongo a toda la cabecera que el cursor sea una mano
  document.querySelectorAll("thead th").forEach(th => {
    th.style.cursor = "pointer";
  });
}


function funcionFila(f) {
  // Eventos para cada fila del cuerpo de la tabla
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach((row, index) => {
    row.addEventListener('click', function () {
      f(index);
    });
  });
}








