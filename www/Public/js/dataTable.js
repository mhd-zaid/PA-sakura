
$(document).ready( function () {
    console.log("DataTable is ready !");
    var table = $('#table_users').DataTable({
        scrollY: 400,
        select: true
    });
    table.columns().flatten().each( function ( colIdx ) {
    // Create the select list and search operation<font></font>
    var select = $('<select />')
        .appendTo(
            table.column(colIdx).footer()
        )
        .on( 'change', function () {
            table
                .column( colIdx )
                .search( $(this).val() )
                .draw();
        } );
    // Get the search data for the first column and add to the select list<font></font>
    table
        .column( colIdx )
        .cache( 'search' )
        .sort()
        .unique()
        .each( function ( d ) {
            select.append( $('<option value="'+d+'">'+d+'</option>') );
        } );
    });
    // editor = new $.fn.dataTable.Editor({
    //     ajax : "userData.php",
    //     table : "table_users",
    //     fields : [
    //         {
    //             label: "Nom:",
    //             name: "nom"
    //         },
    //         {
    //             label: "Email:",
    //             name: "email"
    //         },
    //         {
    //             label: "Note:",
    //             name: "note"
    //         },
    //         {
    //             label: "Rôle:",
    //             name: "role"
    //         },
    //         {
    //             label: "Date de création:",
    //             name: "date_creat"
    //         },
    //         {
    //             label: "Date de modification:",
    //             name: "date_modif"
    //         }
    //     ]
    // });
    // $('#table_users').DataTable( {
    //     dom: "Bfrtip",
    //     ajax: {
    //         url: "userData.php",
    //         type: 'POST'
    //     },
    //     columns: [
    //         { data: "nom" },
    //         { data: "email" },
    //         { data: "note" },
    //         { data: "role" },
    //         { data: "date_creat" },
    //         { data: "date_modif" }
    //     ],
    //     select: true,
    //     buttons: [
    //         { extend: "create", editor: editor },
    //         { extend: "edit",   editor: editor },
    //         { extend: "remove", editor: editor }
    //     ]
    // } );
    // }
})