$(function() {
  /*
    Bagian Biaya --------
  */
  // Initialize DataTableberlanggananBiaya -----------------------------------
  var dTblBiaya = $("#DataTableberlanggananBiaya");
  var tblBiaya = dTblBiaya.DataTable({
      autoWidth: false,
      searching: false,
      paging: false,
      info: false,
      order: [],
      columnDefs: [
        {
            searchable: false,
            orderable: false,
            targets: [0,3],
            width: 10,
        },
        {
            targets: [1],
            width: 120,
        },
        {
            targets: [2],
            className: "text-right",
            width: 120,
        },
      ],
      initComplete: function() {
        sum_();
      }
  });

  $("#subscriptionbiaya-table").children('tbody').on('click', function(e){
    var td = $(e.target).closest('tr').children('td');
    var idBiaya = td.eq(0).text();
    var namaBiaya = td.eq(1).text();
    var hargaBiaya = td.eq(2).text();
    var hargaBiaya = hargaBiaya.split('.').join('');

    var BiayaSudahTerpilih = tblBiaya.column(0)
      .data()
      .toArray();

    if (BiayaSudahTerpilih.includes(idBiaya)) {
        alert(
            "Biaya dengan ID: " +
                idBiaya +
                " sudah ditambahkan!, \nSilahkan pilih Biaya lainnya"
        );
    } else if (idBiaya != '') {
      tblBiaya.row.add({
        0: idBiaya,
        1: namaBiaya,
        // 2: hargaBiaya,
        2: `<input type="number" value="${hargaBiaya}" name="biaya_price[]" class="biaya_price text-right w120px">`,
        3: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsBiaya").modal("toggle");
      sum_();
    }
  });

  dTblBiaya.children('tbody').on( 'click', '#del-icon', function () {
    tblBiaya
        .row($(this).parents('tr'))
        .remove()
        .draw();

    sum_();
  });

  dTblBiaya.children('tbody').on( 'change', 'input', function () {
    sum_();
  });

  $("form").on('submit', function(){
    let data = tblBiaya.rows().data();
    for (let i = 0; i < data.length; i++) {
      $("<input />").attr("type", "hidden")
          .attr("name", "biaya_id[]")
          .attr("value", data[i][0])
          .appendTo("form");
    }
  })

});