let Peticion = class {
    constructor(body, destino) {
        fetch(destino, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: body
        })
            .then(response => response.json())
            .then(data => {

                //
                console.debug(data);
                //

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    peticion(body, destino) {
        // Enviar la hora seleccionada al servidor usando fetch

    };
}