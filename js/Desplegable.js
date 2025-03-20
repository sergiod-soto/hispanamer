function mostrarMenu(menuID, event) {
    //mostramos el menu desplegable
    let menu = document.getElementById(menuID);
    menu.style.top = `${event.pageY}px`;
    menu.style.left = `${event.pageX}px`;
    menu.style.display = "block";
    document.addEventListener("click", function (event) {
        if (!menu.contains(event.target)) {
            menu.style.display = "none";
        }
    });
}







