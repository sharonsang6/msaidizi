  $(document).ready(function() {
    const table =$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print',
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        columnDefs: [ {
            targets: -1,
            visible: false
        } ]
    } );
} );