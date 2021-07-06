$(function() {
  /*
    Bagian Perangkat --------
  */

  // Initialize DataTableberlanggananPerangkat -----------------------------------
  var dTblPerangkat = $("#DataTableberlanggananPerangkat");
  var tblPerangkat = dTblPerangkat.DataTable({
      autoWidth: false,
      searching: false,
      ordering: false,
      paging: false,
      info: false,
      order: [],
      columnDefs: [
          {
            targets: [0,2],
            width: 1,
          },
      ],
  });

  // Pilih Perangkat
  $("#device-table").children('tbody').on('click', function(e){
    let td = $(e.target).closest('tr').children('td');
    let dev_id       = td.eq(0).text();
    let dev_category = td.eq(1).text();
    let dev_desc     = td.eq(2).text();
    let dev_details  = td.eq(3).html();

    // Ini untuk nanti kalau aktivasi sudah bisa
    // if (dev_status == 'Inactive')
    // {
    //   alert('Perangkat ini masih belum diaktivasi!');
    //   return false;
    // }

    let PerangkatSudahTerpilih = tblPerangkat.column(0)
      .data()
      .toArray();

    if (PerangkatSudahTerpilih.includes(dev_id)) {
        alert(
            "Perangkat dengan ID: " +
            dev_id +
                " sudah ditambahkan!, \nSilahkan pilih perangkat lainnya"
        );
    } else if (dev_id != '' || dev_id != 'No data available in table') {
      tblPerangkat.row.add({
        0: dev_id,
        1: dev_desc+dev_details,
        2: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsPerangkat").modal("toggle");
    }
  });

  dTblPerangkat.children('tbody').on( 'click', '#del-icon', 
  function () {
    tblPerangkat
        .row( $(this).parents('tr') )
        .remove()
        .draw();
  });

  $("form").on('submit', function(){
    let data = tblPerangkat.rows().data();
    for (let i = 0; i < data.length; i++) {
      $("<input />").attr("type", "hidden")
          .attr("name", "device_id[]")
          .attr("value", 
          tblPerangkat.rows().data()[i][0])
          .appendTo("form");
      $("<input />").attr("type", "hidden")
          .attr("name", "device_details[]")
          .attr("value", 
          tblPerangkat.rows().data()[i][1])
          .appendTo("form");
    }
  })

});
