<?php

/*
    Uso:

    echo Font::fontStyle()::Normal->value . PHP_EOL;  // "normal"
    echo Font::fontWeight()::Bold->value . PHP_EOL;   // "700"
    echo Font::fontVariant()::SmallCaps->value . PHP_EOL; // "small-caps"

*/


// Enum para font-style
enum FontStyle: string
{
    case Normal = 'normal' . PHP_EOL;
    case Italic = 'italic' . PHP_EOL;
    case Oblique = 'oblique' . PHP_EOL;
}

// Enum para font-weight
enum FontWeight: string
{
    case Light = '300' . PHP_EOL;
    case Normal = '400' . PHP_EOL;
    case Bold = '700' . PHP_EOL;
}

// Enum para font-variant
enum FontVariant: string
{
    case Normal = 'normal' . PHP_EOL;
    case SmallCaps = 'small-caps' . PHP_EOL;
}

// Clase abstracta Font
abstract class Font
{
    // Métodos estáticos que devuelven el nombre del Enum
    public static function fontStyle(): string
    {
        return FontStyle::class;
    }

    public static function fontWeight(): string
    {
        return FontWeight::class;
    }

    public static function fontVariant(): string
    {
        return FontVariant::class;
    }
}
?>