function funcionPasswordBox(container) {
    const passwordField = document.getElementById("input" + container.id);
    const toggleIcon = document.getElementById("toggleIcon" + container.id);

    toggleIcon.addEventListener("mousedown", function () {
        passwordField.type = "text"; // Muestra la contraseña
    });

    toggleIcon.addEventListener("mouseup", function () {
        passwordField.type = "password"; // Vuelve a ocultarla
    });

    toggleIcon.addEventListener("mouseleave", function () {
        passwordField.type = "password"; // Si suelta fuera, también la oculta
    });
}


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".password-container").forEach(function (container) {
        funcionPasswordBox(container);
    });
});