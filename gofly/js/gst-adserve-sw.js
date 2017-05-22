$(document).ready(function () {
    var interval = 60000;
    var TopRefresh = function() {
        $.ajax({
            url: "//ads.gosearchtravel.com/www/delivery/afr.php?zoneid=1",
            cache: false,
            success: function(html) {
                $('#ad8c0731').html(html);
                setTimeout(function() {
                    TopRefresh();
                }, interval);
            }
        });
       //console.log('called');
    };
    TopRefresh();
});