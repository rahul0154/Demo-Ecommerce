function removeFromCart(url, id) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        async: true,

        success: function (data, status) {
            $('#cart_table').find('.product_row_' + id).remove();
            recalculateTotal()
        },
        error: function (xhr, textStatus, errorThrown) {
            alert('Error while removing product from cart.');
        }
    });
}

function updateCartQty(element, url, id) {
    var row = $('#cart_table').find('.product_row_' + id);
    var currentQty = $('#cart_table').find('.product_row_' + id).find('.product_qty').text();

    if ($(element).hasClass('dec_qty')) {
        var newQty = parseInt(currentQty) - 1;
    } else {
        var newQty = parseInt(currentQty) + 1;
    }

    if (parseInt(newQty) <= 0) {
        row.find('.remove_cart').trigger('click')
    } else {
        $.ajax({
            url: url + '/' + id + '/' + newQty,
            type: 'POST',
            dataType: 'json',
            async: true,

            success: function (data, status) {
                row.find('.product_qty').text(newQty);
                recalculateTotal()
            },
            error: function (xhr, textStatus, errorThrown) {
                alert('Error while updating product in cart.');
            }
        });
    }
}


function recalculateTotal() {
    var totalAmount = 0;
    $('#cart_table tbody').find('tr').each(function (index, element) {
        totalAmount += parseInt($(element).find('.product_qty').text()) * parseFloat($(element).find('.product_price').text());
    });

    $('.total_amount').text(totalAmount);
}
