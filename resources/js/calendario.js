import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import $ from 'jquery';
window.$ = window.jQuery = $;

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        locale: 'pt-br',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: {
            today:    'Hoje',
            month:    'Mês',
            week:     'Semana',
            day:      'Dia',
            list:     'Lista'
        },
        selectable: true,
        dateClick: function(info) {
            console.log(info);
            //     alert('Clicked on: ' + info.dateStr);
        },
        // select: function(info) {
        //     alert('Selected from ' + info.startStr + ' to ' + info.endStr);
        // }
    });

    calendar.render();
    // if (calendarEl) {
    // }
});