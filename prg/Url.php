<?php

/*
    clase para gestionar la direccion de elementos
*/

/*
    ICONOS
*/
$urlPDF = "";
$urlEXCEL = "";
$urlBotonNuevo = "";
$urlBotonEditar = "";
$urlBotonEliminar = "";
$urlBotonLupa = "";
$urlBotonImpresora = "";
$urlBotonFlechaAtras = "";
$urlBotonFlechaAdelante = "";
$urlBotonRecargar = "";
$urlBotonTest = "";



/*
    BASE DE DATOS
*/
//




enum Icono: string
{
    case PDF = $urlPDF;
    case EXCEL = $urlEXCEL;
    case botonNuevo = $urlBotonNuevo;
    case botonEditar = $urlBotonEditar;
    case botonEliminar = $urlBotonEliminar;
    case botonLupa = $urlBotonLupa;
    case botonImpresora = $urlBotonImpresora;
    case botonFlechaAtras = $urlBotonFlechaAtras;
    case botonFlechaAdelante = $urlBotonFlechaAdelante;
    case botonRecargar = $urlBotonRecargar;
    case botonTest = $urlBotonTest;
}
enum DB: string
{
    case a = "";
}
?>