function dataTable(id,url,data = {},pageLength = 25){

    $('#' + id).DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true, "lengthChange": false, "autoWidth": false,
        dom: 'Bfrtip',
        "buttons": [
            "excel"
        ],
        "data": data,
        "ajax": {
            "url": url, // URL del archivo PHP del servidor
            "type": "GET" // Método de solicitud
        },
        "pageLength": pageLength, // Cantidad fija de datos por página
        "language": {
            "zeroRecords": "No se encontraron resultados", // Texto para cuando no se encuentran registros
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros", // Texto informativo del paginado
            "infoEmpty": "Mostrando 0 a 0 de 0 registros", // Texto informativo cuando no hay registros para mostrar
            "infoFiltered": "(filtrado de _MAX_ registros totales)", // Texto informativo para registros filtrados
            "search": "Buscar:", // Texto del campo de búsqueda
            "paginate": {
                "first": "Primero", // Texto del botón "Primero"
                "previous": "Anterior", // Texto del botón "Anterior"
                "next": "Siguiente", // Texto del botón "Siguiente"
                "last": "Último" // Texto del botón "Último"
            }
        }
    });
}