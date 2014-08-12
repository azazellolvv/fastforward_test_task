$('#authors_form').submit(function(e) {

    var url = $(this).attr("action");

    $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(),
        dataType: "html",
        success: function(msg){

            alert("Success!");

        }
    });

    return false;

});

function add() {
    $('#div_form').show();
}