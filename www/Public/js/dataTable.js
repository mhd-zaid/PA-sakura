
$(document).ready( function () {
    console.log("DataTable is ready !");
    var table = $('#table_id').DataTable({
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
})