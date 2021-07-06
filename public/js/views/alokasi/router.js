$(function() {
  /*
    Bagian Router --------
  */

  // Initialize DataTableberlanggananRouter -----------------------------------
  var dTblRouter = $("#DataTableberlanggananRouter");
  var tblRouter = dTblRouter.DataTable({
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
            targets: [5],
            className: "text-center",
          },
      ],
  });

  // Pilih STB
  $("#subscriptionrouter-table").children('tbody').on('click', function(e){
    var td = $(e.target).closest('tr').children('td');
    var router_id     = td.eq(0).text();
    var router_desc   = td.eq(1).text();
    var router_sn     = td.eq(2).text();
    var router_mac    = td.eq(3).text();
    var router_ip     = td.eq(4).text();
    var router_status = td.eq(5).text();

    // Ini untuk nanti kalau aktivasi sudah bisa
    // if (router_status == 'Inactive')
    // {
    //   alert('Router ini masih belum diaktivasi!');
    //   return false;
    // }

    var RouterSudahTerpilih = tblRouter.column(0)
      .data()
      .toArray();

    if (RouterSudahTerpilih.includes(router_id)) {
        alert(
            "Router dengan ID: " +
            router_id +
                " sudah ditambahkan!, \nSilahkan pilih router lainnya"
        );
    } else if (router_id != '') {

      switch(router_status) {
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

      tblRouter.row.add({
        0: router_id,
        1: router_desc,
        2: router_sn,
        3: router_mac,
        4: router_ip,
        5: `<span class="badge badge-pill badge-${badge}">${router_status}</span>`,
        6: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsRouter").modal("toggle");
    }
  });

  dTblRouter.children('tbody').on( 'click', '#del-icon', function () {
    tblRouter
        .row( $(this).parents('tr') )
        .remove()
        .draw();
  });

  $("form").on('submit', function(){
    let data = tblRouter.rows().data();
    for (let i = 0; i < data.length; i++) {
      $("<input />").attr("type", "hidden")
          .attr("name", "router_id[]")
          .attr("value", 
          tblRouter.rows().data()[i][0])
          .appendTo("form");
    }
  })

});
