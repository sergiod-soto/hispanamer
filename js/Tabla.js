
/**
 * Ejecuta la funcion parametro al hacer clic en la cabecera
 * Ademas, hace que al tener funcion, el puntero se vuelva
 * una mano al pasar por encima
 * @param {*} f 
 */
function funcionCabecera(f) {
  // Se seleccionan todas las celdas de la cabecera
  const headers = document.querySelectorAll('thead th');
  headers.forEach(header => {
    header.addEventListener('click', function () {
      f(header);
    });
  });

  // pongo a toda la cabecera que el cursor sea una mano
  document.querySelectorAll("thead th").forEach(th => {
    th.style.cursor = "pointer";
  });
}

/**
 * Ejecuta la funcion parametro al hacer clic en una fila
 * @param {*} f 
 */
function funcionFila(f) {
  // Eventos para cada fila del cuerpo de la tabla
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach(f => f.classList.remove("fila-seleccionada"));
  rows.forEach((row, index) => {
    row.addEventListener('click', function () {
      const filas = document.querySelectorAll('tbody tr');
      filas.forEach(filas => filas.classList.remove("fila-seleccionada"));
      this.classList.add("fila-seleccionada");
      f(index);
    });
  });
}







