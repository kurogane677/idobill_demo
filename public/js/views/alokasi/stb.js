$(function() {
  /*
    Bagian Stb --------
  */

  // Initialize DataTableberlanggananStb -----------------------------------
  var dTblStb = $("#DataTableberlanggananStb");
  var tblStb = dTblStb.DataTable({
      autoWidth: false,
      searching: false,
      ordering: false,
      paging: false,
      info: false,
      order: [],
      columnDefs: [
          {
            targets: [0,2],
            width: 10,
          },
          {
            targets: [4],
            className: "text-center",
          },
      ],
  });

  // Pilih STB
  $("#subscriptionstb-table").children('tbody').on('click', function(e){
    var td = $(e.target).closest('tr').children('td');
    var stb_id   = td.eq(0).text();
    var stb_desc = td.eq(1).text();
    var stb_sn   = td.eq(2).text();
    var stb_chip = td.eq(3).text();
    var stb_status = td.eq(4).text();

    // Ini untuk nanti kalau aktivasi sudah bisa
    // if (stb_status == 'Inactive')
    // {
    //   alert('Router ini masih belum diaktivasi!');
    //   return false;
    // }

    var StbSudahTerpilih = tblStb.column(0)
      .data()
      .toArray();

    if (StbSudahTerpilih.includes(stb_id)) {
        alert(
            "Router dengan ID: " +
            stb_id +
                " sudah ditambahkan!, \nSilahkan pilih router lainnya"
        );
    } else if (stb_id != '') {

      switch(stb_status) {
        case "Inactive":
          badge = 'warning';
          break;
        case "Activated":
          badge = 'success';
          break;
        case "Broken":
          badge = 'danger';
          break;
        default:
          badge = 'light';
      }

      tblStb.row.add({
        0: stb_id,
        1: stb_desc,
        2: stb_sn,
        3: stb_chip,
        4: `<span class="badge badge-pill badge-${badge}">${stb_status}</span>`,
        5: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsSTB").modal("toggle");
    }
  });

  dTblStb.children('tbody').on( 'click', '#del-icon', function () {
    tblStb
        .row( $(this).parents('tr') )
        .remove()
        .draw();
  });

  $("form").on('submit', function(){
    let data = tblStb.rows().data();
    for (let i = 0; i < data.length; i++) {
      $("<input />").attr("type", "hidden")
          .attr("name", "stb_id[]")
          .attr("value", 
          tblStb.rows().data()[i][0])
          .appendTo("form");
    }
  })

});
