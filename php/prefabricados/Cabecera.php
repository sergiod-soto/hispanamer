<?php

use Dom\Text;

include_once "php/Includes.php";

/**
 * 
 */


class Cabecera
{

    public static function createFunctions($fAtras, $fNuevo, $fEditar, $fBorrar, $fPDF, $fExcel, $fGuardar, $fCancelar)
    {
        return [
            "atras" => $fAtras,
            "nuevo" => $fNuevo,
            "editar" => $fEditar,
            "borrar" => $fBorrar,
            "pdf" => $fPDF,
            "excel" => $fExcel,
            "guardar" => $fGuardar,
            "cancelar" => $fCancelar,
        ];
    }
    public static function createCabecera($nombre, $version, $ejercicioFiscal, $functions)
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
            Texto::crear("", "textoCabecera", "Sesion iniciada: {\$nombre}"),
            Texto::crear("nombre_programa", "textoCabecera", "{\$nombrePrograma}")
        ]);
        $superior2->add([
            Texto::crear("", "textoCabecera", Programa::fechaActual()),
        ]);
        $superior3->add([
            Texto::crear("textoVersion", "textoCabecera", "Versión: 250305-000107"),
            Texto::crear("textoEjercicioFiscal", "textoCabecera", "Ejercicio fiscal: {\$año}")
        ]);

        $inferior->add([
            $inferior1 = Seccion::crear("cabeceraInf1", "", true),
            $inferior2 = Seccion::crear("cabeceraInf2", "", true)
        ]);

        $inferior1->add([
            Button::crear("botonNuevo", "", iconoNuevo, "Nuevo", ""),
            Button::crear("botonEditar", "", iconoEditar, "Editar", ""),
            Button::crear("botonEliminar", "", iconoEliminar, "Eliminar", ""),
            Button::crear("botonPDF", "", iconoPDF, "PDF", ""),
            Button::crear("botonEXCEL", "", iconoEXCEL, "EXCEL", ""),
        ]);

        $inferior2->add([
            Button::crear("botonImprimir", "", iconoImpresora, "Imprimir", "")
        ]);

        return $cabecera;
    }
}
?>