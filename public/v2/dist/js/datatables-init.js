$(function () {
    // Initialize DataTable for all tables with class 'datatable'
    $("table.dataTable").each(function () {
        const table = $(this);
        const tableId = table.attr("id") || "datatable";
        const tableTitle = table.data("title") || document.title;

        const dt = table.DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: [
                {
                    extend: "copy",
                    title: tableTitle,
                },
                {
                    extend: "csv",
                    title: tableTitle,
                },
                {
                    extend: "excel",
                    title: tableTitle,
                },
                {
                    extend: "pdf",
                    title: tableTitle,
                },
                {
                    extend: "print",
                    title: tableTitle,
                },
                "colvis",
            ],
        });

        dt.buttons()
            .container()
            .appendTo(`#${tableId}_wrapper .col-md-6:eq(0)`);
    });
});
