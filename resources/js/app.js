import './bootstrap';
import '../sass/app.scss';
import '../css/app.css';
import $ from 'jquery';
import '../css/select2-custom.css';
import '../css/datatable-custom.css';
import '../js/funcoes.js';
import '../js/calendario.js';
import '../css/calendario-custom.css';
window.$ = window.jQuery = $;

$(function () {
    $('.select2').select2({
        theme: 'bootstrap-5',
    });
});