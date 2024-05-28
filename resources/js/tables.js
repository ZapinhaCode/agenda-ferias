import $ from 'jquery';
import 'datatables.net';
window.$ = window.jQuery = $;

$('#tabelaUsuarios').DataTable({
    responsive:true,
    language: { url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json', "lengthMenu": "_MENU_"},
});