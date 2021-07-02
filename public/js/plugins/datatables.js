/*
 * untuk lebih jelasnya mengenai datatables:
 * https://datatables.net/extensions/index
 */

var DataTable_lengthMenu = [
    [10, 25, 50, 100, -1],
    [10, 25, 50, 100, "All"]
];

$(function() {
    $("#DataTable1").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        // columnDefs: [{ width: "5px", targets: 5 }],
        autoWidth: true
    });
    $("#DataTableListTeam").DataTable({
        paging: false,
        searching: false,
        autoWidth: true,
        responsive: true,
        info: false
    });

    $("#DataTablepelanggan").DataTable({
        lengthMenu: DataTable_lengthMenu,
        pagingType: "full_numbers",
        autoWidth: true,
        order: [[0, "desc"]]
    });

    $("#DataTableProdukpelanggan").DataTable({
        lengthMenu: DataTable_lengthMenu,
        pagingType: "full_numbers",
        autoWidth: true,
        order: [[0, "desc"]]
    });
    $("#DataTableDaftarPembayaran").DataTable({
        lengthMenu: DataTable_lengthMenu,
        pagingType: "full_numbers",
        autoWidth: true,
        order: [[2, "asc"]]
    });
    $("#DataTableParallel").DataTable({
        lengthMenu: DataTable_lengthMenu,
        pagingType: "full_numbers",
        autoWidth: true,
        order: [[1, "asc"]]
    });
    $("#DataTablecustomer").DataTable({
        lengthMenu: DataTable_lengthMenu,
        pagingType: "full_numbers",
        autoWidth: true,
        order: [[0, "desc"]]
    });
    $("#DataTablewilayah").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: true
    });
    $("#DataTablearea").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: true
    });

    $("#DataTablepartner").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: true
    });
    $("#DataTableproduct").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: true
    });
    $("#DataTablelogroup").DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        pagingType: "full_numbers",
        autoWidth: true
    });
});
