<?php

/*
   rutas de los iconos

   para usarlos, a parte del autoloader, cargar el script 'Iconos.php'
   se llaman escribiendo el nombre de la constante, sin $. 

   ej: $ej = favicon;

   - src: ruta relativa donde se encuentra el icono
   - alt: texto que aparecera junto al icono de imagen rota si no 
          se puede cargar correctamente la imagen
   - width: ancho en pixeles
   - heigth: alto en pixeles
*/






// el favicon es el iconito que aparece en la pestaña del navegador
define("favicon", "<link rel=\"icon\" href=\"ruta/al/favicon.ico\" type=\"image/x-icon\">");
//

define("iconoCalendario", "<img src= \"/multimedia/iconos/calendario.png\" alt=\"Calendario\" width=\"32\" height=\"32\">");
define("iconoCancelar", "<img src= \"/multimedia/iconos/cancelar.png\" alt=\"Cancelar\" width=\"32\" height=\"32\">");
define("iconoEditar", "<img src= \"/multimedia/iconos/editar.png\" alt=\"Editar\" width=\"32\" height=\"32\">");
define("iconoEliminar", "<img src= \"/multimedia/iconos/delete.png\" alt=\"Eliminar\" width=\"32\" height=\"32\">");
define("iconoFlechaAdelante", "<img src= \"/multimedia/iconos/adelante.png\" alt=\"Adelante\" width=\"32\" height=\"32\">");
define("iconoFlechaAtras", "<img src= \"/multimedia/iconos/atras.png\" alt=\"Atras\" width=\"32\" height=\"32\">");
define("iconoGuardar", "<img src= \"/multimedia/iconos/guardar.png\" alt=\"Guardar\" width=\"32\" height=\"32\">");
define("iconoImpresora", "<img src= \"/multimedia/iconos/impresora.png\" alt=\"Imprimir\" width=\"32\" height=\"32\">");
define("iconoLupa", "<img src= \"/multimedia/iconos/lupa.png\" alt=\"Lupa\" width=\"32\" height=\"32\">");
define("iconoNuevo", "<img src= \"/multimedia/iconos/nuevo.png\" alt=\"Nuevo\" width=\"32\" height=\"32\">");
define("iconoQR", "<img src= \"/multimedia/iconos/qr.png\" alt=\"QR\" width=\"32\" height=\"32\">");
define("iconoRecargar", "<img src= \"/multimedia/iconos/reload.png\" alt=\"Recargar\" width=\"32\" height=\"32\">");
define("iconoReloj", "<img src= \"/multimedia/iconos/reloj.png\" alt=\"Hora\" width=\"32\" height=\"32\">");

define("iconoEXCEL", "<img src= \"/multimedia/iconos/excel.png\" alt=\"Descargar EXCEL\" width=\"32\" height=\"32\">");
define("iconoPDF", "<img src= \"/multimedia/iconos/pdf.png\" alt=\"Descargar PDF\" width=\"32\" height=\"32\">");



// icono para ejecutar funciones de los desarrolladores
define("iconoTest", "<img src= \"/multimedia/iconos/test.png\" alt=\"Icono Test\" width=\"32\" height=\"32\">");
//
?>