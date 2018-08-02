var lat, long;
var gps_on = 0;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        gps_on = 1;
    } else {
        alert("Geolocation is not supported by this device.");
    }
}
function showPosition(position) {
    lat =  position.coords.latitude;
    long = position.coords.longitude;
}

$(document).ready(function() {
  getLocation();


  if(gps_on){
    //  submit
    $(".voteUp").click(function(e) {
        $.ajax({
            url: "api/post_rating.php",
            type: "POST",
            cache: false,
            data: 'question_id='+question_id+'&answer=0&latitude='+lat+'&longitude='+long,
            success: function(data) {
                window.location.href = "thanks";
            }
        });
    });

    $(".voteDown").click(function(e) {
        $.ajax({
            url: "api/post_rating.php",
            type: "POST",
            cache: false,
            data: 'question_id='+question_id+'&answer=1&latitude='+lat+'&longitude='+long,
            success: function(data) {
                window.location.href = "thanks";
            }
        });
    });
  }

});
