import $ from 'jquery';
import 'datatables.net';
import "datatables.net-dt";
import "datatables.net-bs5";
import '../css/datatable-custom.css';


window.$ = window.jQuery = $;

$('#dataTable').DataTable({
    responsive: true,
    language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
    }
});