function guardarClases(clases) {

    //      PROGRAMACION DEFENSIVA
    //
    //      - array vacio
    //      - no se encuentras los id
    //
    if (clases === undefined || clases === null) {
        throw "clases null";
    }
    if (clases.length < 1) {
        throw "clases.length < 1";
    }

    for (let i = 0; i < arrayFocos.length - 1; i++) {
        if (mapa.get(arrayFocos[i]) != undefined) {
            throw "Indeterminación añadiendo focos: " + arrayFocos[i] + " añadido multiples veces.";
        }
        mapa.set(arrayFocos[i], arrayFocos[i + 1]);
        setFoco(arrayFocos[i], arrayFocos[i + 1]);
    }



    function guardarClase() {

    }
}