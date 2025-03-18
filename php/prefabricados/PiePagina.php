<?php

/**
 * 
 */

class PiePagina
{

    public static function getPiePagina($fila, $columna)
    {
        $piePagina = Seccion::crear
        (
            "seccion_calc",
            "",
            $fila,
            $columna
        );

        $piePagina->add(
            [
                $piePagina1 = Seccion::crear(
                    "seccionCalculadora",
                    "",
                    0,
                    0
                ),
                $piePagina2 = Seccion::crear(
                    "",
                    "seccionNombre",
                    0,
                    1
                )
            ]
        );

        $piePagina1->add(
            [
                TextBox::crear(
                    "calculadoraInput",
                    "",
                    "",
                    "Calculadora",
                    0,
                    0
                ),
                Texto::crear(
                    "separadorCalculadora",
                    "",
                    " = ",
                    0,
                    1
                ),
                Texto::crear(
                    "calculadoraOutput",
                    "",
                    "",
                    0,
                    2
                )
            ]
        );

        $piePagina2->add([
            Texto::crear(
                "piePaginaCosa",
                "",
                "(C)HISPANAMER S.A.  COMPAÑIA HISPANOAMERICANA DE PINTURAS S.A.",
                0,
                0
            )
        ]);

        return $piePagina;
    }
}
?>