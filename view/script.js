$(document).ready(function () {
  $("#driveData").DataTable({
    dom: "Bfrtip",
    buttons: [
      {
        extend: "csv",
        text: "CSV Export",
      },
      {
        extend: "excel",
        text: "Excel Export",
      },
    ],
    language: {
      decimal: ",",
      thousands: ".",
      search: "Suche:",
      lengthMenu: "Zeige _MENU_ Einträge",
      info: "Zeige _START_ bis _END_ von _TOTAL_ Einträgen",
      infoEmpty: "Keine Einträge verfügbar",
      infoFiltered: "(gefiltert von _MAX_ Einträgen)",
      loadingRecords: "Lade...",
      processing: "Verarbeite...",
      paginate: {
        first: "Erste",
        last: "Letzte",
        next: "Nächste",
        previous: "Vorherige",
      },
      emptyTable: "Keine Daten verfügbar",
      zeroRecords: "Keine passenden Einträge gefunden",
      aria: {
        sortAscending: ": aktivieren, um Spalte aufsteigend zu sortieren",
        sortDescending: ": aktivieren, um Spalte absteigend zu sortieren",
      },
    },
    searching: false,
  });
});