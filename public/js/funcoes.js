function confirmDelete() {
    var confirmacao = confirm("Tem certeza que deseja excluir este registro?");
    return confirmacao;
}

document.addEventListener('DOMContentLoaded', function() {
    $('.loading-form').on('submit', function(e) {
        var $button = $(this).find('.loading-button');
        var $spinner = $(this).find('.spinner-border');

        // Desativa o botão e mostra o spinner
        $button.prop('disabled', true);
        $spinner.removeClass('d-none');

        // Mostrar o overlay
        $('.overlay').css('display', 'flex');
    });

    // Ocultar o overlay após o carregamento completo da página
    window.addEventListener('load', function() {
        $('.overlay').hide();
    });
});
