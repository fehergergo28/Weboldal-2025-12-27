document.addEventListener('DOMContentLoaded', () => {
    const dateInput = document.getElementById('dateInput');
    if (!dateInput) return;

    const timeSlotsContainer = document.getElementById('timeSlots');
    const confirmBtn = document.getElementById('confirmBtn');
    const alertBox = document.getElementById('alertBox');

    let selectedTime = null;

    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
    dateInput.value = today;

    const availableSlots = generateTimeSlots();

    function generateTimeSlots() {
        const slots = [];
        for (let hour = 9; hour <= 17; hour++) {
            slots.push(`${hour.toString().padStart(2, '0')}:00`);
            if (hour < 17) slots.push(`${hour.toString().padStart(2, '0')}:30`);
        }
        return slots;
    }

    async function renderTimeSlots() {
        const selectedDate = dateInput.value;
        if (!selectedDate) return;

        // Foglalt időpontok lekérése az adatbázisból
        let bookedTimes = [];
        try {
            const response = await fetch('/beautynails/get_booked_times.php?date=' + selectedDate);
            bookedTimes = await response.json();
        } catch (e) {
            console.error(e);
        }

        const isToday = (selectedDate === today);
        const currentTime = new Date().toTimeString().slice(0, 5); // pl. "15:32"

        timeSlotsContainer.innerHTML = '';

        availableSlots.forEach(time => {
            let isBooked = bookedTimes.includes(time);

            // Ha MAI nap van és az időpont már elmúlt → foglaltnak jelöljük
            if (isToday && time < currentTime) {
                isBooked = true;
            }

            const slotDiv = document.createElement('div');
            slotDiv.className = `time-slot ${isBooked ? 'booked' : 'available'} ${selectedTime === time ? 'selected' : ''}`;
            slotDiv.textContent = time;

            if (!isBooked) {
                slotDiv.onclick = () => {
                    selectedTime = time;
                    renderTimeSlots();
                    confirmBtn.disabled = false;
                };
            } else {
                slotDiv.style.cursor = 'not-allowed';
                slotDiv.style.opacity = '0.6';
            }

            timeSlotsContainer.appendChild(slotDiv);
        });
    }

    // Foglalás
    confirmBtn.onclick = () => {
        const selectedDate = dateInput.value;
        if (!selectedDate || !selectedTime) return;

        fetch('/beautynails/foglalas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `date=${encodeURIComponent(selectedDate)}&time=${encodeURIComponent(selectedTime)}`
        })
        .then(r => r.text())
        .then(data => {
            alertBox.innerHTML = `<div class="alert alert-success">${data}</div>`;
            selectedTime = null;
            confirmBtn.disabled = true;
            renderTimeSlots();
        })
        .catch(() => {
            alertBox.innerHTML = `<div class="alert alert-warning">Hiba történt!</div>`;
        });
    };

    dateInput.addEventListener('change', renderTimeSlots);
    renderTimeSlots();
});