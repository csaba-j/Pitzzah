import jQuery from 'jquery';

window.$ = jQuery;


$(function() {
    var total = 0;
    $.get({
        url: "/cart/get-cart",
        success: function(result){
            console.log(result);
            $.each(result, function(i, item) {
                console.log(item);
                total += item['subtotal'];
            })
            $(" #total ").text(total);
            console.log(total);
        },
        error: function(result) {
            console.log('Error: Something happened.');
        }
    });
})