function showPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'flex'; // Muestra el popup
    
    setTimeout(
        function () {
            popup.style.display = 'none'; // Oculta el popup después de 2 segundos
        },
        2000);
}