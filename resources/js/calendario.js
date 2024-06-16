import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import bootstrap5Plugin from '@fullcalendar/bootstrap5';
import 'bootstrap-icons/font/bootstrap-icons.css';
import { abreModalFeriasCalendario } from './modais';
import $ from 'jquery';
import 'bootstrap';
import * as XLSX from 'xlsx';

window.$ = window.jQuery = $;
var eventoSelecionado = null;

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
                right: 'dayGridMonth'
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
            editable: false,

            eventClick: function(info) {
                eventoSelecionado = info.event;
                var tituloFerias = eventoSelecionado.title                
                var diaInicioFerias = moment(eventoSelecionado.startStr).format('DD/MM/YYYY');
                var diaRetornoFerias = moment(eventoSelecionado.endStr).format('DD/MM/YYYY');
                var observacaoFerias = eventoSelecionado._def.extendedProps.observacao;
                var localFerias = eventoSelecionado._def.extendedProps.localizacao;
                abreModalFeriasCalendario(tituloFerias, diaInicioFerias, diaRetornoFerias, observacaoFerias, localFerias)
            }
        });

        calendar.render();

        document.getElementById('exportButton').addEventListener('click', function() {
            var events = calendar.getEvents().map(function(event) {
                return {
                    Título: event.title,
                    Início: moment(event.start).format('DD/MM/YYYY'),
                    Retorno: moment(event.end).format('DD/MM/YYYY'),
                    Observacao: event.extendedProps.observacao,
                    Localizacao: event.extendedProps.localizacao
                };
            });

            var worksheet = XLSX.utils.json_to_sheet(events);
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Events');
            XLSX.writeFile(workbook, 'Ferias_Aprovadas.xlsx');
        });
    }
});
