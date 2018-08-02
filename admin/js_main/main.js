$(document).ready(function() {
    var table = $('#table').DataTable({
      ajax: "api/get_lot",

      columns: [
        { data: "id" },
        { data: "cat_en" },
        { data: "qty" },
        { data: "expiry" },
        { data: "created_on" },
        { data: null, render: function ( data, type, row ){
            return '<div class="btn btn-outline-secondary btn-sm"><a href="print?id='+data.id+'" target="pdf"><i class="fa fa-print"></i></a></div>';
          }
        }
      ],

    });


    //  submit
    $("#save").click(function(e) {
        e.preventDefault();

        var data = $('#form').serialize();
        $.ajax({
            url: "api/post_lot.php",
            type: "POST",
            cache: false,
            data: data,
            success: function(data) {
                location.reload();
            }
        });
    });
} );
