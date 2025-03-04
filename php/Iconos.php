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


define("iconoNuevo", "<img src= \"/multimedia/iconos/nuevo.png\" alt=\"Nuevo\" width=\"32\" height=\"32\">");
define("iconoEditar", "<img src= \"/multimedia/iconos/editar.png\" alt=\"Editar\" width=\"32\" height=\"32\">");
define("iconoEliminar", "<img src= \"/multimedia/iconos/delete.png\" alt=\"Eliminar\" width=\"32\" height=\"32\">");
define("iconoLupa", "<img src= \"/multimedia/iconos/lupa.png\" alt=\"Lupa\" width=\"32\" height=\"32\">");
define("iconoImpresora", "<img src= \"/multimedia/iconos/impresora.png\" alt=\"Imprimir\" width=\"32\" height=\"32\">");
define("iconoFlechaAtras", "<img src= \"/multimedia/iconos/atras.png\" alt=\"Atras\" width=\"32\" height=\"32\">");
define("iconoFlechaAdelante", "<img src= \"/multimedia/iconos/adelante.png\" alt=\"Adelante\" width=\"32\" height=\"32\">");
define("iconoRecargar", "<img src= \"/multimedia/iconos/reload.png\" alt=\"Recargar\" width=\"32\" height=\"32\">");
define("iconoCalendario", "<img src= \"/multimedia/iconos/calendario.png\" alt=\"Calendario\" width=\"32\" height=\"32\">");
define("iconoReloj", "<img src= \"/multimedia/iconos/reloj.png\" alt=\"Hora\" width=\"32\" height=\"32\">");

define("EXCEL", "<img src= \"/multimedia/iconos/excel.png\" alt=\"Descargar EXCEL\" width=\"32\" height=\"32\">");
define("PDF", "<img src= \"/multimedia/iconos/pdf.png\" alt=\"Descargar PDF\" width=\"32\" height=\"32\">");


// icono para ejecutar funciones de los desarrolladores
define("iconoTest", "<img src= \"/multimedia/iconos/registro.png\" alt=\"Icono Test\" width=\"32\" height=\"32\">");
//
?>