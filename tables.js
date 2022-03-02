$(document).ready( function () {
    $('table').DataTable( {

        "columnDefs": [
            { "orderable":false, "targets":-1 }
        ],

        "language": {
            "search": "Căutare",
            "info": "Afișare de la _START_ la _END_ din _TOTAL_ înregistrări totale",
            "infoEmpty": "0 înregistrări găsite",
            "infoFiltered":   "(filtrate din _MAX_ înregistrări)",
            "emptyTable":     "Nu există date în tabel",
            "zeroRecords":    "Nu au fost găsite înregistrari",
            "lengthMenu":     "Afișează _MENU_ înregistrări",
            "paginate": {
                "first":      "Prima",
                "last":       "Ultima",
                "next":       "Pag. Următoare",
                "previous":   "Pag. Anterioară"
            },
        }

    } );
} );