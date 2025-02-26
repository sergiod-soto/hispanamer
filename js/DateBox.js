const inputFecha = document.getElementById("fechaInput");
const calendar = document.getElementById("calendar");
const daysContainer = document.getElementById("daysContainer");
const monthSelect = document.getElementById("monthSelect");
const yearSelect = document.getElementById("yearSelect");
const diasSemana = ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"];

const header = document.createElement("div");
header.style.display = "grid";
header.style.gridTemplateColumns = "repeat(7, 1fr)";
diasSemana.forEach(dia => {
    const diaElement = document.createElement("div");
    diaElement.textContent = dia;
    diaElement.style.fontWeight = "bold";
    daysContainer.appendChild(diaElement);
});




// Generar opciones de meses y años
const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
const añoActual = new Date().getFullYear();

for (let i = 0; i < 12; i++) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = meses[i];
    monthSelect.appendChild(option);
}

for (let i = añoActual - 50; i <= añoActual + 10; i++) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = i;
    yearSelect.appendChild(option);
}

// Función para mostrar el calendario
inputFecha.addEventListener("click", () => {
    calendar.style.display = "block";
    const hoy = new Date();
    monthSelect.value = hoy.getMonth();
    yearSelect.value = hoy.getFullYear();
    generarCalendario(hoy.getMonth(), hoy.getFullYear());
});

// Generar los días del mes
function generarCalendario(mes, año) {
    daysContainer.innerHTML = ""; // Limpiar días previos

    const diasSemana = ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"];

    // Crear encabezado con nombres de días
    daysContainer.innerHTML = "";
    const header = document.createElement("div");
    header.style.display = "grid";
    header.style.gridTemplateColumns = "repeat(7, 1fr)";

    diasSemana.forEach(dia => {
        const diaElement = document.createElement("div");
        diaElement.textContent = dia;
        diaElement.style.fontWeight = "bold";
        daysContainer.appendChild(diaElement);
    });

    // Obtener el primer día del mes (ajustado para que lunes sea el primer día)
    let primerDia = new Date(año, mes, 1).getDay(); // 0 = Domingo, 6 = Sábado
    primerDia = (primerDia === 0) ? 6 : primerDia - 1; // Ajustar para que lunes sea 0

    const totalDias = new Date(año, mes + 1, 0).getDate();

    // Espacios vacíos antes del primer día
    for (let i = 0; i < primerDia; i++) {
        const emptyDiv = document.createElement("div");
        daysContainer.appendChild(emptyDiv);
    }

    // Agregar los días del mes
    for (let dia = 1; dia <= totalDias; dia++) {
        const dayDiv = document.createElement("div");
        dayDiv.textContent = dia;
        dayDiv.classList.add("day");
        dayDiv.addEventListener("click", () => seleccionarFecha(dia, mes, año));
        daysContainer.appendChild(dayDiv);
    }
}

// Función para seleccionar una fecha
function seleccionarFecha(dia, mes, año) {
    inputFecha.value = `${dia.toString().padStart(2, "0")}/${(mes + 1).toString().padStart(2, "0")}/${año}`;
    calendar.style.display = "none"; // Ocultar calendario
}

// Actualizar el calendario cuando se cambia mes o año
monthSelect.addEventListener("change", () => {
    generarCalendario(parseInt(monthSelect.value), parseInt(yearSelect.value));
});

yearSelect.addEventListener("change", () => {
    generarCalendario(parseInt(monthSelect.value), parseInt(yearSelect.value));
});

// Ocultar calendario si se hace clic fuera de él
document.addEventListener("click", (event) => {
    if (!document.querySelector(".datepicker-container").contains(event.target)) {
        calendar.style.display = "none";
    }
});