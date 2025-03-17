let Peticion = class {
    data = null;
    constructor(body, destino) {
        fetch(destino, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: (body)
        })
            .then(response => response.json())
            .then(data => {
                this.data = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });

    }

}
