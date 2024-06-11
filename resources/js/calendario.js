import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

import bootstrap5Plugin from '@fullcalendar/bootstrap5';


import 'bootstrap-icons/font/bootstrap-icons.css'; 


import $ from 'jquery';
window.$ = window.jQuery = $;

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (calendarEl) {
        var calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin, bootstrap5Plugin ],
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            timeZone: 'America/Sao_Paulo',
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

            events: ferias,
            selectable: true,
            editable: true,

            // dateClick: function(info) {
            //     console.log(ferias);
            //     alert('Clicked on: ' + info.dateStr);
            // },
            // select: function(info) {
            //     alert('Selected from ' + info.startStr + ' to ' + info.endStr);
            // }
        });

        calendar.render();
    }
});