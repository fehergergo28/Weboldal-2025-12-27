function toggleMenu() {
    const menu = document.getElementById('menu');
    if (menu) {
        menu.classList.toggle('active');
    }
}


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

    let bookings = JSON.parse(localStorage.getItem('beautyNailsBookings')) || {};

    function saveBookings() {
        localStorage.setItem('beautyNailsBookings', JSON.stringify(bookings));
    }

    function generateTimeSlots() {
        const slots = [];
        for (let hour = 9; hour <= 17; hour++) {
            slots.push(`${hour.toString().padStart(2, '0')}:00`);
            if (hour < 17) slots.push(`${hour.toString().padStart(2, '0')}:30`);
        }
        return slots;
    }

    const availableSlots = generateTimeSlots();

    function renderTimeSlots() {
        const selectedDate = dateInput.value;
        if (!selectedDate) {
            timeSlotsContainer.innerHTML = '<p style="text-align:center; grid-column:1/-1;">Kérlek válassz egy dátumot!</p>';
            return;
        }

        const bookedTimes = bookings[selectedDate] || [];
        timeSlotsContainer.innerHTML = '';

        availableSlots.forEach(time => {
            const isBooked = bookedTimes.includes(time);
            const slotDiv = document.createElement('div');
            slotDiv.className = `time-slot ${isBooked ? 'booked' : 'available'} ${selectedTime === time ? 'selected' : ''}`;
            slotDiv.textContent = time;

            if (!isBooked) {
                slotDiv.onclick = () => {
                    selectedTime = time;
                    renderTimeSlots();
                    confirmBtn.disabled = false;
                };
            }

            timeSlotsContainer.appendChild(slotDiv);
        });
    }

    confirmBtn.onclick = () => {
        const selectedDate = dateInput.value;
        if (!selectedDate || !selectedTime) return;

        const isLoggedIn = localStorage.getItem('beautyNailsLoggedIn') === 'true';

        if (!isLoggedIn) {
            alertBox.innerHTML = '<div class="alert alert-warning">Kérlek előbb jelentkezz be a foglaláshoz!</div>';
            setTimeout(() => { window.location.href = 'bejelent.html'; }, 2000);
            return;
        }

        let ending = 're';
        if (selectedTime.endsWith(':30')) {
            ending = 'ra';
        } else if (selectedTime === '13:00' || selectedTime === '16:00') {
            ending = 'ra';
        }

        if (!bookings[selectedDate]) bookings[selectedDate] = [];
        bookings[selectedDate].push(selectedTime);
        saveBookings();

        alertBox.innerHTML = `
            <div class="alert alert-success">
                Sikeresen lefoglaltad: ${selectedDate} ${selectedTime}-${ending}!<br>
                2 órás kezelés.
            </div>
        `;

        selectedTime = null;
        confirmBtn.disabled = true;
        renderTimeSlots();
    };

    dateInput.addEventListener('change', renderTimeSlots);
    renderTimeSlots();
});