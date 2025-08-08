document.addEventListener('DOMContentLoaded', () => {
    const displayDateElement = document.getElementById("display_date");

    let dateNow = new Date();

    const prevDayBtn = document.getElementById("prev_arrow");
    const nextDayBtn = document.getElementById("next_arrow");
    const slotsList = document.querySelector(".slots_display ul");

    // formatage de la date
    const options = {
        weekday: 'short',
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    };


    // tableau de creneaux horaires
    const timeSlots = [
        "9h-10h",
        "10h-11h",
        "11h-12h",
        "13h-14h",
        "14h-15h",
        "15h-16h",
        "16h-17h",
        "17h-18h"
    ];

    //créneaux réservés par date (clé: date en yyyy-mm-dd)
    const bookedSlots = {
        "2025-06-30": ["10h-11h", "14h-15h"],
        "2025-07-01": ["9h-10h", "17h-18h"]
    };

    // formatage de la date en clés
    function formatDateKey(date) {
        return date.toISOString().split("T")[0];
    }
    
    
    // Mise à jour de l' affichage date et créneaux
    function updateDateDisplay() {
        const formattedDate = dateNow.toLocaleDateString('fr-FR', options);
        displayDateElement.textContent = formattedDate;
        updateTimeSlots();
    }
    
    // Mise à jour des créneaux
    function updateTimeSlots() {
        const dateKey = formatDateKey(dateNow);
        const reserved = bookedSlots[dateKey] || [];

        // Vider la liste
        slotsList.innerText = "";

        // Recréer les <li>
        timeSlots.forEach(slot => {
            const li = document.createElement("li");
            li.textContent = slot;

            // Griser si réservé
            if (reserved.includes(slot)) {
                li.classList.add("reserved");
            }

            slotsList.appendChild(li);
        });
    }

    nextDayBtn.addEventListener("click", (event) => {
        event.preventDefault();
        dateNow.setDate(dateNow.getDate() + 1);
        updateDateDisplay();
    });

    prevDayBtn.addEventListener("click", (event) => {
        event.preventDefault();
        dateNow.setDate(dateNow.getDate() - 1);
        updateDateDisplay();
    });

    updateDateDisplay();
});

