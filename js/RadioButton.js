let radioButtons = new Map();

// Seleccionar todos los divs con data-tipo="RadioButton"
document.querySelectorAll('[data-tipo="RadioButton"]').forEach(div => {
    // Obtener el id del div
    const divId = div.id;

    // Acceder a los radio buttons dentro del div
    const radios = div.querySelectorAll('input[type="radio"]');

    // Obtener los valores de los radio buttons
    const valores = [];
    radios.forEach(radio => {
        valores.push(radio); // Agregar el valor de cada radio button al array
    });

    // Añadir al mapa (clave: id del div, valor: array de valores de los radio buttons)
    radioButtons.set(divId, valores);
});

for (const element of radioButtons.keys()) {
    document.getElementById(element).addEventListener("change", function (event) {
        radioButtons.get(element).forEach(element => {
            element.checked = false;
        });
        event.target.checked = true;
    });
}


