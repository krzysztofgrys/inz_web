function reverseGeocodeAddress(id) {
    $.ajax({
        type: "GET",
        url: './entity/' + id + '/rate',
        data: "",
        success: function () {
            $(".circle").load(" .circle");

        }
    })
};

var selected_hsn = '';

function autoload_success(response_data, response, request) {
    if (response_data.length === 0) {
        response_data = [ { value: "", label: "Not found: " + request.term } ];
    }

    response(response_data);
}


$(function() {
    user = $('#receiver').val() || '';
    $( ".autocomplete" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                type: "GET",
                url: '/user/search',
                data: {
                    search: request.term
                },
                success: function (data ) {
                    autoload_success(data, response, request);

                }
            })
        },
        select: function( event, ui ) {
            user = ui.item.value;
        }
    });

});