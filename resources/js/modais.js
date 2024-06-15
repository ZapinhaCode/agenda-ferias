import './bootstrap';
export { abreModalFeriasCalendario };

// Modal para sugerir alteração nas ferias
document.addEventListener('DOMContentLoaded', function() {
    $('#sugerirAlteracao').on('shown.bs.modal', function () {
        const elemento = document.querySelector('#sugerirAlteracao');
        if (elemento) {
            elemento.focus();
        }
    });
});

// Modal férias
document.addEventListener('DOMContentLoaded', function() {
    $('#dataTable').on('click', 'button.open-modal', function() {
        var id = $(this).data('id');

        $.ajax({
            url: '/ferias/' + id,
            method: 'GET',
            success: function(data) {
                if (data.local_ferias == null) {
                    data.local_ferias = 'Campo não preenchido.';
                }

                if (data.observacao == null) {
                    data.observacao = 'Campo não preenchido.';
                }

                let dataInicioFormatada = moment(data.data_inicio).format('DD/MM/YYYY');
                let dataRetornoFormatada = moment(data.data_retorno).format('DD/MM/YYYY');

                $('#modalLabel').text('Título: ' + data.titulo);
                $('#modalTitulo').val(data.titulo);
                $('#local').val(data.local_ferias);
                $('#modalDataInicio').val(dataInicioFormatada);
                $('#modalDataRetorno').val(dataRetornoFormatada);
                $('#observacao').val(data.observacao);
            },

            error: function(error) {
                console.error('Erro ao buscar os dados:', error);
            }
        });
    });
});

// Monta o modal para exibir no calendário
function abreModalFeriasCalendario(tituloFerias, diaInicioFerias, diaRetornoFerias, observacaoFerias, localFerias) {
    $('#feriasModal').on('shown.bs.modal', function () {
        if (localFerias == null) {
            localFerias = 'Campo não preenchido.';
        }

        if (observacaoFerias == null) {
            observacaoFerias = 'Campo não preenchido.';
        }

        $('#modalTitulo').val(tituloFerias);
        $('#local').val(localFerias);
        $('#modalDataInicio').val(diaInicioFerias);
        $('#modalDataRetorno').val(diaRetornoFerias);
        $('#observacao').val(observacaoFerias);

        const elemento = document.querySelector('#feriasModal');

        if (elemento) {
            elemento.focus();
        }
    });

    $('#feriasModal').modal('show');
}