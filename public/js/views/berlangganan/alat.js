$(function() {
  /*
    Bagian Produk --------
  */

  // Initialize DataTableberlanggananAlat -----------------------------------
  var dTblProduk = $("#DataTableberlanggananAlat");
  var tblProduk = dTblProduk.DataTable({
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
              targets: [1,2],
              className: "text-right",
              width: 120,
          },
      ],
      initComplete: function() {
        sum_();
      }
  });

  $("#subscriptionalat-table").children('tbody').on('click', function(e){
    var td = $(e.target).closest('tr').children('td');
    var idProduk = td.eq(0).text();
    var namaProduk = td.eq(1).text();
    var hargaProduk = td.eq(3).text();
    var hargaProduk = hargaProduk.split('.').join('');
    var statusProduk = td.eq(4).text();

    if (statusProduk == 'Nonactive')
    {
      alert('Produk ini tidak dapat dipilih karena status nya Nonactive!');
      return false;
    }

    var ProdukSudahTerpilih = tblProduk.column(0)
      .data()
      .toArray();

      if (ProdukSudahTerpilih.includes(idProduk)) {
        alert(
            "Produk dengan ID: " +
            idProduk +
                " sudah ditambahkan!, \nSilahkan pilih produk lainnya"
        );
    } else {
      // tblProduk.row(0).remove().draw(false)
      tblProduk.row.add({
        0: idProduk,
        1: namaProduk,
        // 2: hargaProduk,
        2: `<input type="number" value="${hargaProduk}" name="prod_price[]" class="prod_price text-right w120px">`,
        3: '<div class="text-center"><img id="del-icon" src='+ deleteIcon +'></div>',
      }).draw();
      $("#ModalsProduk").modal("toggle");
      sum_();
    }
  });

  dTblProduk.children('tbody').on( 'click', '#del-icon', function () {
    tblProduk
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    
    sum_();
  });

  dTblProduk.children('tbody').on( 'change', 'input', function () {
    sum_();
  });

  $("form").on('submit', function(){
    let data = tblProduk.rows().data();
    for (let i = 0; i < data.length; i++) {
      $("<input />").attr("type", "hidden")
          .attr("name", "prod_id[]")
          .attr("value", data[i][0])
          .appendTo("form");
      $("<input />").attr("type", "hidden")
          .attr("name", "prod_desc[]")
          .attr("value", 
          data[i][0]+' - '+data[i][1])
          .appendTo("form");
    }
  })

});
