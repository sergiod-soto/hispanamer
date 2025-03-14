let Peticion = class {
    constructor(body, destino) {
        console.debug("entra?");
        fetch(destino, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
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
}