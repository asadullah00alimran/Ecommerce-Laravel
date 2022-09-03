jQuery(document).ready(function () {
    jQuery("#formimage").on("submit", function (e) {
        e.preventDefault();
        var alldata = new FormData(this);

        $.ajax({
            url: '/slider/multistore',
            type: 'POST',
            datatype: 'JSON',
            data: alldata,
            contentType: false,
            processData: false,
            success: function (data) {
                alert("OK");
            }
        })
    });
});