<?php

/*
    Uso:

    echo Font::fontStyle()::Normal->value;      // "normal"
    echo Font::fontWeight()::Bold->value;       // "700"
    echo Font::fontVariant()::SmallCaps->value; // "small-caps"
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

// Clase Font
class Font
{

    public $style = FontStyle::Normal->value;
    public $weigth = FontWeight::Normal->value;
    public $variant = FontVariant::Normal->value;

    /*
        otras propiedades
    */
    public $size = 12;
    public $lineHeigth = 1.5;
    public $fontFamily = "Arial";
    public $letterSpacing = "2px";
    public $wordSpacing = "5px";

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

    /*
        convierte el objeto a texto CSS
    */
    public function toString()
    {
        return
            "
            font-style: $this->style;
            font-variant: $this->variant;
            font-weigth: $this->weigth;
            font-size: $this->size;
            line-height: $this->lineHeigth; 
            font-family: $this->fontFamily; 
            letter-spacing: $this->letterSpacing;
            word-spacing: $this->wordSpacing;
            ";
    }
}
?>