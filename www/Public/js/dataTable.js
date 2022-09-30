// $(document).ready( function () {
//     console.log("DataTable is ready !");
//     var table = $('#table_users').DataTable({
//         scrollY: 400,
//         select: true,
//         search: {
//             return: true,
//         },
//         dom: "Bfrtip",
//         processing: true,
//         serverSide: true,
//         ajax: 'http://localhost/Vendor/DataTable/server_processing.php',
//     });
//     console.log(table);
//     table.columns().flatten().each( function ( colIdx ) {
//     // Create the select list and search operation<font></font>
//     var select = $('<select />')
//         .appendTo(
//             table.column(colIdx).footer()
//         )
//         .on( 'change', function () {
//             table
//                 .column( colIdx )
//                 .search( $(this).val() )
//                 .draw();
//         } );
//     // Get the search data for the first column and add to the select list<font></font>
//     table
//         .column( colIdx )
//         .cache( 'search' )
//         .sort()
//         .unique()
//         .each( function ( d ) {
//             select.append( $('<option value="'+d+'">'+d+'</option>') );
//         } );
//     });
// })

function format(d) {
    return (
        'Full name: ' +
        d.id +
        ' ' +
        d.firstname +
        '<br>' +
        'Salary: ' +
        d.lastname +
        '<br>' +
        'The child row can contain any data you wish, including links, images, inner tables etc.'
    );
}
 
$(document).ready(function () {
    var table = $('#table_users').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'http://localhost/Vendor/DataTable/server_processing.php',
        columns: [
            {
                class: 'details-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            { 
                data: 'id',
                class: 'user_id'
            },
            { 
                data: 'firstname',
                class: 'user_firstname' 
            },
            { 
                data: 'lastname',
                class: 'user_lastname' 
            },
        ],
        order: [[1, 'asc']],
    });
 
    // Array to track the ids of the details displayed rows
    var detailRows = [];
 
    $('#table_users tbody').on('click', 'tr td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var idx = detailRows.indexOf(tr.attr('id'));
        $('#user-name').html(row.data().firstname + " " + row.data().lastname);
        $('#user-age').html(row.data().id + "yo");
        // if (row.child.isShown()) {
        //     tr.removeClass('details');
        //     row.child.hide();
 
        //     // Remove from the 'open' array
        //     detailRows.splice(idx, 1);
        // } else {
        //     tr.addClass('details');
        //     row.child(format(row.data())).show();
 
        //     // Add to the 'open' array
        //     if (idx === -1) {
        //         detailRows.push(tr.attr('id'));
        //     }
        // }
    });
 
    // On each draw, loop over the `detailRows` array and show any child rows
    table.on('draw', function () {
        detailRows.forEach(function(id, i) {
            $('#' + id + ' td.details-control').trigger('click');
        });
    });
});
