$(function () {
  $(".js-basic-example").DataTable({
    responsive: true,
  });

  //Exportable table
  $(".js-exportable").DataTable({
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json",
    },
    dom: "Bfrtip",
    responsive: true,
    buttons: ["copy", "csv", "excel", "pdf", "print"],
  });
});
