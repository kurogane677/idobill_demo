$(function() {
  /*
    Bagian Perangkat --------
  */

  // Initialize DataTableAlokasiPerangkat -----------------------------------
  var dTblPerangkat = $("#DataTableAlokasiPerangkat");
  var tblPerangkat = dTblPerangkat.DataTable({
      autoWidth: false,
      searching: false,
      ordering: false,
      paging: false,
      info: false,
      order: [],
      columnDefs: [
        {
          targets: [0],
          data: null,
          sortable: false,
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          },
        },
          {
            targets: [0,5,6],
            width: 10,
            className: "text-center",
          },
          // {
          //   targets: [4],
          //   className: "text-center",
          // },
      ],
  });

  // Pilih STB
  $("#device-table").children('tbody').on('click', function(e){
    var td = $(e.target).closest('tr').children('td');
    var dev_id   = td.eq(0).text();
    var dev_category = td.eq(1).text();
    var dev_desc   = td.eq(2).text();
    var dev_details = td.eq(3).html();
    var dev_uom = td.eq(4).text();
    var dev_status = td.eq(5).text();

    // Ini untuk nanti kalau aktivasi sudah bisa
    // if (dev_status == 'Inactive')
    // {
    //   alert('Perangkat ini masih belum diaktivasi!');
    //   return false;
    // }

    let PerangkatSudahTerpilih = tblPerangkat.column(1)
      .data()
      .toArray();

    if (PerangkatSudahTerpilih.includes(dev_id)) {
        alert(
            "Perangkat dengan ID: " +
            dev_id +
                " sudah ditambahkan!, \nSilahkan pilih perangkat lainnya"
        );
    } else if (dev_id != '' || dev_id != 'No data available in table') {

      switch(dev_status) {
        case "Inactive":
          badge = 'warning';
          break;
        case "Activated":
          badge = 'success';
          break;
        case "Rusak":
          badge = 'danger';
          break;
        default:
          badge = 'dark';
      }

      tblPerangkat.row.add({
        0: '',
        1: dev_id,
        2: dev_category,
        3: dev_desc,
        4: dev_details,
        5: dev_uom,
        6: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsDevice").modal("toggle");
    }
  });

  dTblPerangkat.children('tbody').on( 'click', '#del-icon', function () {
    tblPerangkat
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    
    // update nomor/index row
    tblPerangkat.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    });
    tblPerangkat.draw();

  });

  $("form").on('submit', function(){
    let data = tblPerangkat.rows().data();
    for (let i = 0; i < data.length; i++) {

      // $("<input />").attr("type", "hidden")
      // .attr("name", "dev_no[]")
      // .attr("value", 
      // tblPerangkat.rows().data()[i][0])
      // .appendTo("form");

      $("<input />").attr("type", "hidden")
          .attr("name", "dev_id[]")
          .attr("value", 
          tblPerangkat.rows().data()[i][1])
          .appendTo("form");

      $("<input />").attr("type", "hidden")
          .attr("name", "dev_category[]")
          .attr("value", 
          tblPerangkat.rows().data()[i][2])
          .appendTo("form");
    }
  })

});
