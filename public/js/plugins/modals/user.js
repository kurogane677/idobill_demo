$(function() {
    // console.log("{{$user->nama}}");
    var DatabaseDataTable = $("#DataTableuser").DataTable();

    DatabaseDataTable.on("click", ".edit_modal", function() {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }

        var data = DatabaseDataTable.row($tr).data();

        $("#edit_id").val(data[0]);
        $("#edit_id_collector").val(data[1]);
        $("#edit_nama").val(data[2]);

        $("#editForm").attr("action", "/user/" + data[0]);
        $("#editModal").modal("show");
    });

    DatabaseDataTable.on("click", ".delete_modal", function() {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }

        var data = DatabaseDataTable.row($tr).data();

        $("#del_id").val(data[0]);
        $("#del_id_collector").val(data[1]);
        $("#del_nama").val(data[2]);

        $("#deleteForm").attr("action", "/user/" + data[0]);
        $("#deleteModal").modal("show");
    });
});
