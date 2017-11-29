var user = '';

function autoload_success(response_data, response, request) {
    if (response_data.length === 0) {
        response_data = [ { value: "", label: "Not found: " + request.term } ];
    }
    response(response_data);
}

$(function() {
    selected_hsn = $('#HSN').val() || '';
    $( "#HSN" ).autocomplete({
        source: function( request, response ) {
            $.ajax( {
                    url: app.api_url + "/v1/autocomplete_hsn",
                    data: {
                        api_token: app.api_token,
                        search: request.term
                    },
                    success: function( response_data ) {
                        autoload_success(response_data, response, request);
                    }
                }
            );
        },
        select: function( event, ui ) {
            selected_hsn = ui.item.value;
        }
    });

    $( "#TSN" ).autocomplete({
        source: function( request, response ) {
            $.ajax( {
                    url: app.api_url + "/v1/autocomplete_tsn",
                    data: {
                        api_token: app.api_token,
                        search: request.term,
                        hsn: selected_hsn
                    },
                    success: function( response_data ) {
                        autoload_success(response_data, response, request);
                    }
                }
            );
        }
    });
});