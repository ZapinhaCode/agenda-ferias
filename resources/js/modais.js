import './bootstrap';

// Modal das ferias
document.addEventListener('DOMContentLoaded', function() {
    $('#feriasModal').on('shown.bs.modal', function () {
        const elemento = document.querySelector('#feriasModal');
        if (elemento) {
            elemento.focus();
        }
    });
});

// Modal para sugerir alteração nas ferias
document.addEventListener('DOMContentLoaded', function() {
    $('#sugerirAlteracao').on('shown.bs.modal', function () {
        const elemento = document.querySelector('#sugerirAlteracao');
        if (elemento) {
            elemento.focus();
        }
    });
});