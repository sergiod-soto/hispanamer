var input = document.getElementById("calculadoraInput");
var output = document.getElementById("calculadoraOutput");

input.addEventListener("keydown", event => {
    if (event.key === "Enter") {
        input.blur();
        output.innerHTML = math.evaluate(event.originalTarget.value);
    }
});