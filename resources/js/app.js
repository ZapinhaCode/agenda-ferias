import './bootstrap';
import '../sass/app.scss';
import '../css/app.css';
import $ from 'jquery';
window.$ = window.jQuery = $;

// Aqui que pode ser alterado as coisas dos select2
$(function () {
    $('.select2').select2({
        theme: 'bootstrap-5',

    });
});

