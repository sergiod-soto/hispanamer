document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".datepicker-container").forEach(function (container) {
        const input = container.querySelector(".fechaInput");
        const calendar = container.querySelector(".calendar");
        const monthSelect = container.querySelector(".monthSelect");
        const yearSelect = container.querySelector(".yearSelect");
        const daysContainer = container.querySelector(".days-container");
        const btnHoy = container.querySelector(".btnHoy");

        let currentDate = new Date();

        input.addEventListener("click", () => {
            document.querySelectorAll(".calendar").forEach(cal => cal.style.display = "none");
            calendar.style.display = "block";
            renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
        });

        document.addEventListener("click", (event) => {
            if (!container.contains(event.target)) {
                calendar.style.display = "none";
            }
        });

        function renderCalendar(year, month) {
            daysContainer.innerHTML = "";
            monthSelect.innerHTML = "";
            yearSelect.innerHTML = "";

            const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            meses.forEach((mes, i) => {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = mes;
                if (i === month) option.selected = true;
                monthSelect.appendChild(option);
            });

            for (let i = currentDate.getFullYear() - 50; i <= currentDate.getFullYear() + 10; i++) {
                let option = document.createElement("option");
                option.value = i;
                option.textContent = i;
                if (i === year) option.selected = true;
                yearSelect.appendChild(option);
            }

            const firstDay = new Date(year, month, 1).getDay();
            const totalDays = new Date(year, month + 1, 0).getDate();
            const startDay = (firstDay === 0) ? 6 : firstDay - 1;

            for (let i = 0; i < startDay; i++) {
                let emptyDiv = document.createElement("div");
                daysContainer.appendChild(emptyDiv);
            }

            for (let i = 1; i <= totalDays; i++) {
                let dayDiv = document.createElement("div");
                dayDiv.classList.add("day");
                dayDiv.textContent = i;
                dayDiv.addEventListener("click", () => {
                    input.value = `${i.toString().padStart(2, '0')}/${(month + 1).toString().padStart(2, '0')}/${year}`;
                    calendar.style.display = "none";

                    // Disparar evento personalizado
                    const eventoFechaSeleccionada = new CustomEvent("fechaSeleccionada" + container.id, {
                        detail: { day: i, month: month, year: year, date: input.value }
                    });
                    document.dispatchEvent(eventoFechaSeleccionada);
                });
                daysContainer.appendChild(dayDiv);
            }
        }

        monthSelect.addEventListener("change", () => renderCalendar(parseInt(yearSelect.value), parseInt(monthSelect.value)));
        yearSelect.addEventListener("change", () => renderCalendar(parseInt(yearSelect.value), parseInt(monthSelect.value)));

        btnHoy.addEventListener("click", () => {
            const hoy = new Date();
            input.value = `${hoy.getDate().toString().padStart(2, '0')}/${(hoy.getMonth() + 1).
                toString().padStart(2, '0')}/${hoy.getFullYear()}`;
            calendar.style.display = "none";

            // Disparar evento personalizado
            const eventoFechaSeleccionada = new CustomEvent("fechaSeleccionada" + container.id, {
                detail: { day: hoy.getDate(), month: hoy.getMonth(), year: hoy.getFullYear(), date: input.value }
            });

            document.dispatchEvent(eventoFechaSeleccionada);
        });
    });
});




function readOnlyDateBox(dateBoxID) {
    var dateBox = document.getElementById(dateBoxID).querySelector(".fechaInput");
    dateBox.addEventListener('click', function (e) { e.stopImmediatePropagation() });
    dateBox.style.cursor = "default";
}

function setFechaDateBox(dateBoxID, date) {
    document.getElementById(dateBoxID).querySelector(".fechaInput").value =
        `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).
            toString().padStart(2, '0')}/${date.getFullYear()}`;
}


var fecha1 = null;
var fecha2 = null;
function setIntervaloFechas(dateBoxID1, dateBoxID2, mensaje) {
    var dateBox1 = document.getElementById(dateBoxID1).querySelector(".fechaInput");
    var dateBox2 = document.getElementById(dateBoxID2).querySelector(".fechaInput");

    var comprobarFechas = function () {
        if (fecha1 == null || fecha2 == null) {
            return true;
        }
        if (fecha1 > fecha2) {
            return false;
        }
        return true;
    };

    dateBox1.addEventListener('click', function () {
        fecha1 = dateBox1.value;
        if (comprobarFechas()) {
            return;
        } else {
            window.alert(mensaje);
        }

    });
    dateBox2.addEventListener('click', function () {
        fecha2 = dateBox2.value;
        if (comprobarFechas()) {
            return;
        } else {
            window.alert(mensaje);
        }
    });
}