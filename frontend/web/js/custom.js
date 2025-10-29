$(document).ready(function() {
    $('.qtySelector').on('click', '.increaseQty', function() {
        var input = $(this).closest('.qtySelector').find('.qtyValue');
        var currentValue = parseInt(input.val());
        input.val(currentValue + 1);
    });
    $('.qtySelector').on('click', '.decreaseQty', function() {
        var input = $(this).closest('.qtySelector').find('.qtyValue');
        var currentValue = parseInt(input.val());
        if (currentValue > 1) {
            input.val(currentValue - 1);
        }
    });

    //Korzinaga qoshish
    $(".add-to-cart").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        // let qty= $("#qty").val();
        $.ajax({
            method : 'GET',
            url : '/cart/add',
            data : {id:id,qty:qty},
            success : function (data) {
                showCart(data);
            },

            error : function () {
                alert('OSHIBICHKA');
            }
        })
    })
});