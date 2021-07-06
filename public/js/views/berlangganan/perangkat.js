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
            width: 10,
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

    var PerangkatSudahTerpilih = tblPerangkat.column(0)
      .data()
      .toArray();

    if (PerangkatSudahTerpilih.includes(stb_id)) {
        alert(
            "Router dengan ID: " +
            stb_id +
                " sudah ditambahkan!, \nSilahkan pilih router lainnya"
        );
    } else if (stb_id != '') {

      let details = `
      <li class="no-bullet">Deskripsi STB: ${stb_desc}</li>
      <li class="no-bullet">S/N: ${stb_sn}</li>
      <li class="no-bullet">Chip ID: ${stb_chip}</li>
      `
      // tblPerangkat.row(0).remove().draw(false)
      tblPerangkat.row.add({
        0: stb_id,
        1: details,
        2: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsSTB").modal("toggle");
    }
  });

  // Pilih ROUTER
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

    var PerangkatSudahTerpilih = tblPerangkat.column(0)
      .data()
      .toArray();

    if (PerangkatSudahTerpilih.includes(router_id)) {
        alert(
            "Router dengan ID: " +
            router_id +
                " sudah ditambahkan!, \nSilahkan pilih router lainnya"
        );
    } else if (router_id != '') {

      let details = `
      <li class="no-bullet">Deskripsi Router: ${router_desc}</li>
      <li class="no-bullet">S/N: ${router_sn}</li>
      <li class="no-bullet">MAC Address: ${router_mac}</li>
      <li class="no-bullet">IP Address: ${router_ip}</li>
      `
      // tblPerangkat.row(0).remove().draw(false)
      tblPerangkat.row.add({
        0: router_id,
        1: details,
        2: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsRouter").modal("toggle");
    }
  });

  dTblPerangkat.children('tbody').on( 'click', '#del-icon', function () {
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
