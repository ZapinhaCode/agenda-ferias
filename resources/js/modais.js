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



document.addEventListener('DOMContentLoaded', function() {
    var table = $('#dataTable').DataTable();

    // Event delegation to handle click event on dynamically created buttons
    $('#dataTable').on('click', 'button.open-modal', function() {

        var id = $(this).data('id');

        // Fazer a requisição AJAX para buscar os dados do backend
        $.ajax({
            url: '/ferias/' + id,
            method: 'GET',
            success: function(data) {
                // Preencher o modal com os dados recebidos
                $('#modalLabel').text('Título: ' + data.titulo);
                $('#modalTitulo').val(data.titulo);
                $('#local').val(data.local_ferias);
                $('#modalDataInicio').val(data.data_inicio);
                $('#modalDataRetorno').val(data.data_retorno);
                $('#observacao').val(data.observacao);


            },
            error: function(error) {
                console.error('Erro ao buscar os dados:', error);
            }
        });
    });
});

