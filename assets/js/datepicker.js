$(document).ready(function(){
    const $datePicker = $('#custom-date-picker');
    const $calendarDropdown = $('#calendar-dropdown');

    $('#custom-icon').on('click', function() {
        $calendarDropdown.toggleClass('d-none').toggleClass('d-flex'); // Toggle calendar visibility
        generateCalendar(); // Generate the calendar
    });

    $datePicker.on('input', function() {
        let value = $datePicker.val().replace(/\D/g, ''); // Remove non-numeric characters
        if (value.length > 0) {
            value = value.slice(0, 2) + (value.length > 2 ? '/' + value.slice(2, 4) : '') + (value.length > 4 ? '/' + value.slice(4, 8) : '');
        }
        $datePicker.val(value);

        const parts = value.split('/');
        if (parts.length === 3) {
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1], 10) - 1; // Months are 0-based
            const year = parseInt(parts[2], 10);
            if (day && month >= 0 && month < 12 && year) {
                const date = new Date(year, month, day);
                if (date.getDate() === day && date.getMonth() === month && date.getFullYear() === year) {
                    $datePicker.val(formatDate(date));
                }
            }
        }
    });

    function generateCalendar() {
        $calendarDropdown.empty();
        const now = new Date();
        let month = now.getMonth();
        let year = now.getFullYear();

        const dateParts = $datePicker.val().split('/');
        if (dateParts.length === 3) {
            const inputMonth = parseInt(dateParts[1], 10) - 1; // Months are 0-based
            const inputYear = parseInt(dateParts[2], 10);
            if (!isNaN(inputMonth) && !isNaN(inputYear)) {
                month = inputMonth;
                year = inputYear;
            }
        }

        const header = $('<div>').addClass('calendar-grid calendar-header');
        const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        weekdays.forEach(day => {
            header.append($('<div>').text(day));
        });
        $calendarDropdown.append(header);

        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();

        let day = 1;
        for (let i = 0; i < 6; i++) {
            const row = $('<div>').addClass('calendar-grid');
            
            for (let j = 0; j < 7; j++) {
                const cell = $('<div>').addClass('calendar-cell');
                
                if (i === 0 && j < firstDay) {
                    cell.html('');
                } else if (day > daysInMonth) {
                    cell.html('');
                } else {
                    cell.html(day);
                    cell.on('click', function() {
                        const selectedDate = new Date(year, month, day);
                        $datePicker.val(formatDate(selectedDate));
                        $calendarDropdown.hide();
                    });
                    day++;
                }
                row.append(cell);
            }
            $calendarDropdown.append(row);
        }
    }

    function formatDate(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }
});