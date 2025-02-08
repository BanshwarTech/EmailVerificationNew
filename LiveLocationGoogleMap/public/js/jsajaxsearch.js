
$(document).ready(function () {

    $("#district").click(function () {
        var distval = $("#district").val();
        $.post('http://127.0.0.1:8000/api/searchCity', { distval: distval }, function (match) {
            $("#city").html(match);
        });
    });

});