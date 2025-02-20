<?php

/*
    Clase abstracta para gestionar la paleta de colores
*/
abstract class Color
{
    static private function agregarCeroSiNecesario($hex)
    {
        // Verificar si la longitud de la cadena es menor que 2
        if (strlen($hex) < 2) {
            // Añadir un 0 a la izquierda
            $hex = '0' . $hex;
        }
        return $hex;
    }
    static private function decimalToHex($decimal)
    {
        // Asegurarse de que el valor esté en el rango de 0 a 1
        if ($decimal < 0 || $decimal > 1) {
            return null; // Retorna null si el valor no es válido
        }

        // Convertir el número decimal a un valor entre 0 y 255
        $value = round($decimal * 255);

        // Convertir el número a formato hexadecimal y asegurarse de que tenga 2 dígitos
        return Color::agregarCeroSiNecesario(strtoupper(dechex($value)));
    }
    static private function intToHex($decimal)
    {
        // Verificar si el número es entero
        if (!is_int($decimal)) {
            return null; // Si no es un número entero, retornar null
        }

        // Convertir el número decimal a hexadecimal
        return Color::agregarCeroSiNecesario(strtoupper(dechex($decimal))); // Devolver el valor hexadecimal en mayúsculas
    }

    static public function rgb($r, $g, $b)
    {
        return '#' .
            Color::intToHex($r) .
            Color::intToHex($g) .
            Color::intToHex($b);
    }
    static public function rgba($r, $g, $b, $a)
    {
        return '#' .
            Color::intToHex($r) .
            Color::intToHex($g) .
            Color::intToHex($b) .
            Color::decimalToHex($a);
    }

}
?>