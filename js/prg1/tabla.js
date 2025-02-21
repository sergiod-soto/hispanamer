document.addEventListener("DOMContentLoaded", function () {
  // Selecciona todos los separadores
  const resizers = document.querySelectorAll(".resizer");

  resizers.forEach(resizer => {
    let startX, startLeftWidth, startRightWidth;

    // Obtiene el id de la columna de la izquierda y la de la derecha
    const leftColId = resizer.getAttribute("data-left-col");
    const rightColId = resizer.getAttribute("data-right-col");
    const leftCol = document.getElementById(leftColId);
    const rightCol = document.getElementById(rightColId);

    resizer.addEventListener("mousedown", function (e) {
      startX = e.pageX;
      startLeftWidth = leftCol.offsetWidth;
      startRightWidth = rightCol.offsetWidth;

      // Añade los event listeners para el movimiento y el fin del redimensionamiento
      document.addEventListener("mousemove", onMouseMove);
      document.addEventListener("mouseup", onMouseUp);

      e.preventDefault();
    });

    function onMouseMove(e) {
      const dx = e.pageX - startX;
      let newLeftWidth = startLeftWidth + dx;
      let newRightWidth = startRightWidth - dx;

      // Evita que alguna columna se haga demasiado pequeña
      const minWidth = 50;
      if (newLeftWidth < minWidth) {
        newLeftWidth = minWidth;
        newRightWidth = startLeftWidth + startRightWidth - minWidth;
        //console.debug("nrw: " + newRightWidth)
      } else if (newRightWidth < minWidth) {
        newRightWidth = minWidth;
        newLeftWidth = startLeftWidth + startRightWidth - minWidth;
      }

      // Actualiza el ancho de las columnas a través de los elementos <col>
      leftCol.style.width = newLeftWidth + "px";
      rightCol.style.width = newRightWidth + "px";
    }

    function onMouseUp() {
      // Remueve los event listeners cuando se suelta el botón del ratón
      document.removeEventListener("mousemove", onMouseMove);
      document.removeEventListener("mouseup", onMouseUp);
    }
  });
});
