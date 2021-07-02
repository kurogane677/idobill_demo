$(function() {
    if ($("#DataTable" + module)) {
        var table = $("#DataTable" + module).DataTable();

        table.on("click", ".edit_modal", function() {
            $tr = $(this).closest("tr");
            if ($($tr).hasClass("child")) {
                $tr = $tr.prev(".parent");
            }
            var data = table.row($tr).data();

            if ((module = "collector")) {
                $("#edit_id").val(data[0]);
                $("#edit_id_" + module).val(data[1]);
                $("#edit_nama").val(data[2]);
            }

            $("#editForm").attr("action", "/" + module + "/" + data[0]);
            $("#editModal").modal("show");
        });

        table.on("click", ".delete_modal", function() {
            $tr = $(this).closest("tr");
            if ($($tr).hasClass("child")) {
                $tr = $tr.prev(".parent");
            }

            var data = table.row($tr).data();

            if ((module = "collector")) {
                $("#del_id").val(data[0]);
                $("#del_id_" + module).val(data[1]);
                $("#del_nama").val(data[2]);
            }

            $("#deleteForm").attr("action", "/" + module + "/" + data[0]);
            $("#deleteModal").modal("show");
        });
    }
});
