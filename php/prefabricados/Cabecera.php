<?php

use Dom\Text;

include_once "php/Includes.php";

/**
 * 
 */


class Cabecera
{
    public static function createCabecera($nombrePrograma, $nombre, $version, $ejercicioFiscal, $funciones)
    {
        $cabecera = Seccion::crear("cabeceraBase", "cabecera", false);

        $cabecera->add([
            $superior = Seccion::crear("cabeceraSup", "cabecera", true),
            $inferior = Seccion::crear("cabeceraInf", "cabecera", true)
        ]);


        $superior->add([
            Link::crear(
                "boton-cabecera",
                "",
                "https://www.hispanamer.es/",
                Target::Blank,
                iconoFlechaAtras,
                "Atrás"
            ),
            Link::crear(
                "",
                "",
                "http://localhost/corporativo/prg181.php",
                Target::Blank,
                Imagen::crear("imagenLogo", "", Imagenes::Hispanamer),
                ""
            ),
            $superior1 = Seccion::crear("superior1", "cabecera", false),
            $superior2 = Seccion::crear("superior2", "cabecera", false),
            $superior3 = Seccion::crear("superior3", "cabecera", true)
        ]);

        $superior1->add([
            Texto::crear("", "textoCabecera", "Sesion iniciada: {$nombre}"),
            Texto::crear("nombre_programa", "textoCabecera", "{$nombrePrograma}")
        ]);
        $superior2->add([
            Texto::crear("", "textoCabecera", Programa::fechaActual()),
        ]);
        $superior3->add([
            Texto::crear("textoVersion", "textoCabecera", "Versión: {$version}"),
            Texto::crear("textoEjercicioFiscal", "textoCabecera", "Ejercicio fiscal: {$ejercicioFiscal}")
        ]);

        $inferior->add([
            $inferior1 = Seccion::crear("cabeceraInf1", "", true),
            $inferior2 = Seccion::crear("cabeceraInf2", "", true)
        ]);

        $inferior1->add([
            Button::crear("botonNuevo", "", iconoNuevo, "Nuevo", $funciones["nuevo"]),
            Button::crear("botonEditar", "", iconoEditar, "Editar", $funciones["editar"]),
            Button::crear("botonEliminar", "", iconoEliminar, "Eliminar", $funciones["eliminar"]),
            Button::crear("botonPDF", "", iconoPDF, "PDF", $funciones["pdf"]),
            Button::crear("botonEXCEL", "", iconoEXCEL, "EXCEL", $funciones["excel"]),
        ]);

        $inferior2->add([
            Button::crear("botonImprimir", "", iconoImpresora, "Imprimir", $funciones["imprimir"])
        ]);

        return $cabecera;
    }
}
?>