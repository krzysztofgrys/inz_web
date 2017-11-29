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