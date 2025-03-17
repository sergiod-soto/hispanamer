
/**
 * Ejecuta la funcion parametro al hacer clic en la cabecera
 * Ademas, hace que al tener funcion, el puntero se vuelva
 * una mano al pasar por encima
 * @param {*} f 
 */
function funcionCabecera(f) {

  const cabeceras = document.getElementsByClassName("cabeceraTabla");

  for (const cabecera of cabeceras) {

    const divs = cabecera.children; // Obtiene los divs hijos

    for (const div of divs) {

      const hijo = div.firstChild; // Obtiene el primer hijo (puede ser un nodo de texto o un elemento)

      if (hijo) {

        // si el hijo es texto plano
        if (hijo.nodeType === Node.TEXT_NODE) {
          div.style.cursor = "pointer";
          div.addEventListener('click', function () {
            f(div);
          });

          // si el hijo es un elemento (como un icono, por ej)
        } else if (hijo.nodeType === Node.ELEMENT_NODE) {
          div.style.cursor = "pointer";
          div.addEventListener('click', function () {
            f(div);
          });
        }
      }
    }
  }



  // pongo a toda la cabecera que el cursor sea una mano
  document.querySelectorAll("thead th").forEach(th => {

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

function deseleccionarFilas() {
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach(f => f.classList.remove("fila-seleccionada"));
}


function sincronizarCabeceras() {
  let tabla = document.querySelector("table"); // Selecciona la tabla

  if (tabla === undefined || tabla === null) {
    return;
  }

  let cabecera = document.querySelector(".cabeceraTabla"); // Selecciona el div contenedor
  let columnas = tabla.querySelectorAll("colgroup col"); // Selecciona las columnas de la cabecera de la tabla
  let divs = cabecera.children; // Selecciona los divs dentro de cabeceraTabla

  if (columnas.length !== divs.length) {
    console.warn("Número de columnas y divs no coinciden. columnas.length: " + columnas.length + ", divs.length: " + divs.length);
    return;
  }

  columnas.forEach((columna, index) => {
    divs[index].style.width = `${columna.offsetWidth}px`; // Copia el ancho de cada columna
  });
}
window.addEventListener("load", sincronizarCabeceras);
window.addEventListener("resize", sincronizarCabeceras);










