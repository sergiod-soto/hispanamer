<?php

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
        $cabecera = Seccion::crear("cabeceraBase", "cabecera", true);

        $cabecera->add([
            $seccion1 = Seccion::crear("", "", true),
            $seccion2 = Seccion::crear("", "", true)
        ]);


        $seccion1->add([
            Link::crear(
                "",
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
                Imagen::crear("", "", Imagenes::Hispanamer),
                ""
            )

        ]);


        $seccion2->add([

        ]);

        return $cabecera;
    }
}
?>