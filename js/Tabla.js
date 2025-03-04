function functionCabecera(f) {
  // Se seleccionan todas las celdas de la cabecera
  const headers = document.querySelectorAll('thead th');
  headers.forEach(header => {
    header.addEventListener('click', function () {
      f();
    });
  });

}


function functionFila(f) {
  // Eventos para cada fila del cuerpo de la tabla
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach((row, index) => {
    row.addEventListener('click', function () {
      f(index);
    });
  });


}








