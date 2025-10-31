$(document).ready(function() {

    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "2000",
    };
    
    //Korzinaga qoshish
    $(".add-to-cart").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let qty= $("#qty").val();
        if(!qty){
            qty = 1;
        }
        $.ajax({
            method : 'GET',
            url : '/cart/add',
            data : {id:id,qty:qty},
            success : function (data) {
                if(data.status){
                    toastr.success(data.message);
                    $('#cart-modal').html(data.result);
                    $('#qty').val(1);
                }else{
                    toastr.error(data.message);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })

    // Korzinkani ochish
    $("#cart-icon").on('click',function (e) {
        e.preventDefault();
        $.ajax({
            method : 'GET',
            url : '/cart/show',
            success : function (data) {
                if(data.status){
                    $('#cart-modal').html(data.result);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })

    // Korzinkadan tovarni o'chirish
    $(document).on('click','.delete-from-cart',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method : 'GET',
            url : '/cart/remove',
            data : {id:id},
            success : function (data) {
                if(data.status){
                    toastr.success(data.message);
                    $('#cart-modal').html(data.result);
                }else{
                    toastr.error(data.message);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })

    // Korzinkanini sonini o'zgartirish
    $(document).on('click','.qty-plus',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method : 'GET',
            url : '/cart/add',
            data : {id:id,qty:1},
            success : function (data) {
                if(data.status){
                    $('#cart-modal').html(data.result);
                }else{
                    toastr.error(data.message);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })

    // Korzinkanini sonini o'zgartirish
    $(document).on('click','.qty-minus',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method : 'GET',
            url : '/cart/add',
            data : {id:id,qty:-1},
            success : function (data) {
                if(data.status){
                    $('#cart-modal').html(data.result);
                }else{
                    toastr.error(data.message);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })
    
    setInterval(function () {
        $.ajax({
            url: '/cart/count',
            type: 'GET',
            success: function (data) {
                if(data.status){
                    $('.cart-count').text(data.result);
                }
            }
        });
    }, 1000);


    //Wishlistga qo'shish
    $(".add-to-wishlist").on('click',function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method : 'GET',
            url : '/cart/add-to-wishlist',
            data : {id:id},
            success : function (data) {
                if(data.status){
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },

            error : function () {
                toastr.error('Error');
            }
        })
    })

    setInterval(function () {
        $.ajax({
            url: '/cart/wishlist-count',
            type: 'GET',
            success: function (data) {
                if(data.status){
                    $('.wishlist-count').text(data.result);
                }
            }
        });
    }, 1000);
});