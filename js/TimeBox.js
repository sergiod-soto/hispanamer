document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".timeBox-Container ").forEach(function (container) {
        // Referencias a elementos
        const timeInput = container.querySelector(".timeInput");
        const overlay = container.querySelector(".overlay-timeBox");
        const modal = container.querySelector(".modal");
        const modalTitle = container.querySelector(".modalTitle");
        const dialContainer = container.querySelector(".dialContainer");
        const markersContainer = container.querySelector(".markers");
        const timeDisplay = container.querySelector(".timeDisplay");
        const adjustButtons = container.querySelector(".adjustButtons");
        const plusBtn = container.querySelector(".plusBtn");
        const minusBtn = container.querySelector(".minusBtn");
        const confirmBtn = container.querySelector(".confirmBtn");
        const cancelBtn = container.querySelector(".cancelBtn");

        let selectedHour = null;
        let selectedMinute = null;
        let ficha = ""; // Variable final (formato HH:MM)

        // Parámetros del dial
        const offsetAngleInternal = 0; // Rotación circunferencia interna
        const dialSize = 300;
        const markerSize = 25; // Tamaño reducido para los botones (círculos)
        const center = dialSize / 2;
        const outerRadius = center - markerSize; // Radio para el dial externo (horas 00-11)
        const innerRadius = outerRadius * 0.6;    // Radio aumentado para el dial interno (horas 12-23)

        // Modo: "hour" o "minute"
        let mode = "hour";

        // Actualiza el display central con la hora actual
        function updateTimeDisplay() {
            const hourStr = selectedHour !== null ? (selectedHour < 10 ? "0" + selectedHour : selectedHour) : "--";
            const minuteStr = selectedMinute !== null ? (selectedMinute < 10 ? "0" + selectedMinute : selectedMinute) : "--";
            timeDisplay.textContent = `${hourStr}:${minuteStr}`;
        }

        // Limpia únicamente el contenedor de marcadores
        function clearMarkers() {
            markersContainer.innerHTML = "";
        }

        // Genera los marcadores de hora en dos diales:
        // - Externo para horas 00-11.
        // - Interno para horas 12-23.
        function generateHourMarkers() {
            mode = "hour";
            modalTitle.textContent = "Selecciona la Hora";
            adjustButtons.style.display = "none";
            clearMarkers();

            // Dial externo: horas 0 a 11
            for (let i = 0; i < 12; i++) {
                const marker = document.createElement("div");
                marker.className = "clock-marker";
                marker.textContent = i < 10 ? "0" + i : i;
                // Cada marcador se posiciona cada 30° (360/12) con un offset de -90° para que "00" quede arriba
                const angleDeg = (i * 30) - 90 + offsetAngleInternal;
                const angleRad = angleDeg * (Math.PI / 180);
                const x = center + outerRadius * Math.cos(angleRad) - markerSize / 2;
                const y = center + outerRadius * Math.sin(angleRad) - markerSize / 2;
                marker.style.left = x + "px";
                marker.style.top = y + "px";

                marker.addEventListener("click", function () {
                    selectedHour = i;
                    updateTimeDisplay();
                    generateMinuteMarkers();
                });
                markersContainer.appendChild(marker);
            }

            // Dial interno: horas 12 a 23
            for (let i = 12; i < 24; i++) {
                const marker = document.createElement("div");
                marker.className = "clock-marker";
                marker.textContent = i < 10 ? "0" + i : i;
                // Para el dial interno, usamos el mismo espaciado angular pero basado en i-12 (0 a 11)
                const j = i - 12;
                const angleDeg = (j * 30) - 90;
                const angleRad = angleDeg * (Math.PI / 180);
                const x = center + innerRadius * Math.cos(angleRad) - markerSize / 2;
                const y = center + innerRadius * Math.sin(angleRad) - markerSize / 2;
                marker.style.left = x + "px";
                marker.style.top = y + "px";

                marker.addEventListener("click", function () {
                    selectedHour = i;
                    updateTimeDisplay();
                    generateMinuteMarkers();
                });
                markersContainer.appendChild(marker);
            }
            updateTimeDisplay();
        }

        // Genera los marcadores de minutos (mostrando solo múltiplos de 5)
        function generateMinuteMarkers() {
            mode = "minute";
            modalTitle.textContent = "Selecciona los Minutos";
            adjustButtons.style.display = "flex";
            clearMarkers();
            if (selectedMinute === null) {
                selectedMinute = 0;
            }
            // Calcula el valor redondeado (hacia abajo) al múltiplo de 5
            const rounded = Math.floor(selectedMinute / 5) * 5;
            for (let i = 0; i < 60; i += 5) {
                const marker = document.createElement("div");
                marker.className = "clock-marker";
                marker.textContent = i < 10 ? "0" + i : i;
                if (i === rounded) {
                    marker.classList.add("selected");
                }
                const angleDeg = (i * 6) - 90;
                const angleRad = angleDeg * (Math.PI / 180);
                const x = center + outerRadius * Math.cos(angleRad) - markerSize / 2;
                const y = center + outerRadius * Math.sin(angleRad) - markerSize / 2;
                marker.style.left = x + "px";
                marker.style.top = y + "px";

                marker.addEventListener("click", function () {
                    selectedMinute = i;
                    updateTimeDisplay();
                    generateMinuteMarkers(); // Actualiza para resaltar la selección
                });
                markersContainer.appendChild(marker);
            }
            updateTimeDisplay();
        }

        // Botón para incrementar un minuto (ajuste fino)
        plusBtn.addEventListener("click", function () {
            if (mode === "minute") {
                selectedMinute = (selectedMinute + 1) % 60;
                updateTimeDisplay();
                generateMinuteMarkers();
            }
        });

        // Botón para decrementar un minuto (ajuste fino)
        minusBtn.addEventListener("click", function () {
            if (mode === "minute") {
                selectedMinute = (selectedMinute - 1 + 60) % 60;
                updateTimeDisplay();
                generateMinuteMarkers();
            }
        });

        // Confirmar la selección
        confirmBtn.addEventListener("click", function () {
            if (selectedHour !== null && selectedMinute !== null) {
                const hourStr = selectedHour < 10 ? "0" + selectedHour : selectedHour;
                const minuteStr = selectedMinute < 10 ? "0" + selectedMinute : selectedMinute;
                ficha = `${hourStr}:${minuteStr}`;
                timeInput.value = ficha;

                /**
                 *  Aquí va qué debe hacer el boton Aceptar 
                 */
                tiempo = new Date();
                tiempo.setHours(selectedHour);
                tiempo.setMinutes(selectedMinute);

                const eventoHoraSeleccionada = new CustomEvent("horaSeleccionada" + container.id, {
                    detail: { hour: tiempo.getHours(), minute: tiempo.getMinutes(), time: hourStr + ":" + minuteStr }
                });
                document.dispatchEvent(eventoHoraSeleccionada);

                closeModal();
            } else {
                alert("Por favor, selecciona la hora y los minutos.");
            }
        });

        // Funciones para abrir y cerrar el modal
        function openModal() {
            overlay.style.display = "block";
            modal.style.display = "block";
            // Reiniciar selecciones
            selectedHour = null;
            selectedMinute = null;
            updateTimeDisplay();
            generateHourMarkers();
        }

        function closeModal() {
            modal.style.display = "none";
            overlay.style.display = "none";
        }

        // Eventos para abrir/cerrar el modal
        timeInput.addEventListener("click", openModal);
        cancelBtn.addEventListener("click", closeModal);
        overlay.addEventListener("click", closeModal);
    });
});