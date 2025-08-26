window.initDataTable = function (tableId, exportTitle = "Data Export") {
    if ($.fn.DataTable.isDataTable(tableId)) {
        $(tableId).DataTable().destroy();
    }

    $(tableId).DataTable({
        dom: "Bfrtip",
        buttons: [
            {
                extend: "copy",
                title: exportTitle,
            },
            {
                extend: "csv",
                title: exportTitle.toLowerCase().replace(/\s+/g, "_"),
            },
            {
                extend: "excel",
                title: exportTitle.toLowerCase().replace(/\s+/g, "_"),
            },
            {
                extend: "pdf",
                title: exportTitle.toLowerCase().replace(/\s+/g, "_"),
            },
            {
                extend: "print",
                title: exportTitle,
            },
        ],
    });
};
