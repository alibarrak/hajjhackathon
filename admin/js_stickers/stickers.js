$(document).ready(function() {
    var table = $('#table').DataTable({
      ajax: "api/get_stickers",

      columns: [
        { data: "id" },
        { data: "cat_en" },
        { data: "up" },
        { data: "down" },
      ],

    });
} );
