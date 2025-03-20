
/**
 * Ejecuta la funcion parametro al hacer clic en la cabecera
 * Ademas, hace que al tener funcion, el puntero se vuelva
 * una mano al pasar por encima
 * @param {*} f 
 */
function funcionCabeceraClicIzq(tabla, f) {

  const cabecera = tabla.firstChild;

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



  // pongo a toda la cabecera que el cursor sea una mano
  document.querySelectorAll("thead th").forEach(th => {

  });
}

/**
 * Ejecuta la funcion parametro al hacer clic en una fila
 * @param {*} f 
 */
function funcionFilaClicIzq(tabla, f) {
  // Eventos para cada fila del cuerpo de la tabla
  const rows = tabla.querySelectorAll('tbody tr');
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


function funcionCabeceraClicDer(tabla, f) {
  const cabecera = tabla.firstChild;
  const divs = cabecera.children; // Obtiene los divs hijos

  for (const div of divs) {

    const hijo = div.firstChild; // Obtiene el primer hijo (puede ser un nodo de texto o un elemento)

    if (hijo) {

      // si el hijo es texto plano
      if (hijo.nodeType === Node.TEXT_NODE) {
        div.addEventListener('contextmenu', function () {
          f(div);
        });

        // si el hijo es un elemento (como un icono, por ej)
      } else if (hijo.nodeType === Node.ELEMENT_NODE) {
        div.addEventListener('contextmenu', function () {
          f(div);
        });
      }
    }
  }


  // pongo a toda la cabecera que el cursor sea una mano
  document.querySelectorAll("thead th").forEach(th => {

  });
}


function funcionFilaClicDer(tabla, f) {
  // Eventos para cada fila del cuerpo de la tabla
  const rows = tabla.querySelectorAll('tbody tr');
  rows.forEach(f => f.classList.remove("fila-seleccionada"));
  rows.forEach((row, index) => {
    row.addEventListener('contextmenu', function (event) {
      event.preventDefault();
      const filas = document.querySelectorAll('tbody tr');
      filas.forEach(filas => filas.classList.remove("fila-seleccionada"));
      this.classList.add("fila-seleccionada");

      f(index, event);
    });
  });
}


/**
 * Se ordena la matriz 'matriz' en orden alfabetico 
 * segun la columna 'columna' en orden 'descendente'
 * 
 * @param {HTMLTableElement} tabla (html)
 * @param {int} columna 
 * @param {boolean} descendente 
 */
function ordenacionAlfabetica(tabla, columna, descendente = false) {
  let col = tabla.querySelector("tbody tr td:nth-child(" + columna + ")"); // Primera columna
  return new Tablesort(tabla, { descending: descendente }).sortTable(col);
}

/**
 * Se ordena la matriz 'matriz' en orden numerico 
 * segun la columna 'columna' en orden 'descendente'
 * 
 * @param {HTMLTableElement} tabla 
 * @param {int} columna 
 * @param {boolean} descendente
 */
function ordenacionNumerica(tabla, columna, descendente = false) {
  let col = tabla.querySelector("tbody tr td:nth-child(" + columna + ")"); // Segunda columna
  col.setAttribute("data-sort-method", "number");
  return new Tablesort(tabla, { descending: descendente }).sortTable(col);
}












function deseleccionarFilas() {
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach(f => f.classList.remove("fila-seleccionada"));
}


function sincronizarCabeceras() {


  let tablas = document.getElementsByClassName("table-container");
  Array.from(tablas).forEach((tabla, i) => {

    if (tabla === undefined || tabla === null) {
      return;
    }

    let cabecera = tabla.querySelector(".cabeceraTabla"); // Selecciona el div contenedor
    let columnas = tabla.querySelectorAll("colgroup col"); // Selecciona las columnas de la cabecera de la tabla
    let divs = cabecera.children; // Selecciona los divs dentro de cabeceraTabla

    if (columnas.length !== divs.length) {
      console.warn("Número de columnas y divs no coinciden. columnas.length: " + columnas.length + ", divs.length: " + divs.length + " en tabla [" + tabla.id + ", " + i + "]");
      return;
    }

    columnas.forEach((columna, index) => {
      divs[index].style.width = `${columna.offsetWidth}px`; // Copia el ancho de cada columna
    });
  });
}

window.addEventListener("load", sincronizarCabeceras);
window.addEventListener("resize", sincronizarCabeceras);














