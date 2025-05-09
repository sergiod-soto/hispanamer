<?php

/**
 * 
 */

class PiePagina
{

    public static function createPiePagina()
    {
        $piePagina = Seccion::crear
        (
            "seccion_calc",
            "",
            true
        );

        $piePagina->add(
            [
                $piePagina1 = Seccion::crear(
                    "seccionCalculadora",
                    "",
                    true
                ),
                $piePagina2 = Seccion::crear(
                    "aaa",
                    "seccionNombre",
                    true
                )
            ]
        );

        $piePagina1->add(
            [
                TextBox::crear(
                    "calculadoraInput",
                    "",
                    "",
                    "Calculadora"
                ),
                Texto::crear(
                    "separadorCalculadora",
                    "",
                    " = "
                ),
                Texto::crear(
                    "calculadoraOutput",
                    "",
                    ""
                )
            ]
        );

        $piePagina2->add([
            Texto::crear(
                "piePaginaCosa",
                "",
                "(C)HISPANAMER S.A.  COMPAÑIA HISPANOAMERICANA DE PINTURAS S.A."
            )
        ]);

        return $piePagina;
    }
}
?>