setFocos(["id_38", "id_39", "id_38"]);

document.getElementById("id_39").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        console.debug("debe guardar");
        document.activeElement.blur();
    }
});

