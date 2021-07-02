$(function() {
    $("#DataTableberlangganan").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: false,
        order: []
    });

    $("#DataTableberlanggananPartner").DataTable({
        autoWidth: false,
        searching: false,
        paging: false,
        info: false,
        order: [1, "asc"],
        columnDefs: [
            {
                orderable: false,
                targets: 0,
                className: "text-center"
            }
        ]
    });

    $("#DataTableberlanggananPartner tbody").on("click", "td", function() {
        var ckbox = $(this)
            .parents("tr")
            .find("td:first :input");

        ckbox.prop("checked", !ckbox.prop("checked"));
    });

    // DataTableModalberlanggananPelanggan -----------------------------------
    $("#DataTableModalberlanggananPelanggan").DataTable({
        paging: false,
        autoWidth: false
        // ordering: false
    });

    $("#DataTableModalberlanggananPelanggan_filter")
        .detach()
        .appendTo("#pelangganModal .modal-header");

    $("#DataTableModalberlanggananPelanggan_filter :input")
        .detach()
        .appendTo("#DataTableModalberlanggananPelanggan_filter");

    $("#DataTableModalberlanggananPelanggan_filter label").remove();
    $("#DataTableModalberlanggananPelanggan_filter :input").attr(
        "placeholder",
        "cari pelanggan..."
    );

    $("#DataTableModalberlanggananPelanggan_wrapper")
        .children(":first")
        .children(":first")
        .remove();

    $("#DataTableModalberlanggananPelanggan_wrapper")
        .children(":last")
        .children(":last")
        .remove();

    $("#DataTableModalberlanggananPelanggan_wrapper")
        .children(":last")
        .children(":first")
        .removeClass("col-md-5");
});
