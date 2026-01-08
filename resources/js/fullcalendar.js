import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

let calendarEl = document.querySelector(".fullcalendar");
let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin],
    initialView: "dayGridMonth",
    locale: "fr",
});

calendar.render();
