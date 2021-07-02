$(function() {

  // Initialize DataTableLoArea -----------------------------------
  var nama = "Area";
  var tblID = "#DataTableLoArea"
  var tblInduk = "#loarea-table"

  var dTable = $(tblID).DataTable({
      autoWidth: false,
      searching: true,
      paging: false,
      info: false,
      order: [],
      dom: '<"d-flex justify-content-center align-items-center"f>t',
      language: {
        "searchPlaceholder": "Search...",
        "sSearch": "",
      },

      columnDefs: [
          {
              searchable: false,
              orderable: false,

              targets: [2]
          },
      ],
  });

  var areasx = [];
  $(tblInduk).children('tbody').on('click', 
  function(e){
    var td = $(e.target).closest('tr').children('td');
    var id = td.eq(0).text();
    var desc = td.eq(1).text();

    var IDSudahTerpilih = dTable.column(0)
      .data()
      .toArray();

  if (IDSudahTerpilih.includes(id)) {
      alert(
        nama + " dengan ID: " +
              id +
              " sudah ditambahkan!, \nSilahkan pilih " + nama +" lainnya"
      );
  } else {
    dTable.row.add( {
      0: id,
      1: desc,
      2: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
    }).draw();
     $("#Modals"+nama).modal("toggle");
  }
});

$(tblID + ' tbody').on( 'click', '#del-icon', 
function () {
  dTable
      .row( $(this).parents('tr') )
      .remove()
      .draw();
} );

});
