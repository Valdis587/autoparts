jQuery(document).ready(function ($) {

    $('a#IdModals').on('click', function () {
        var productID= $(this).attr('data-product-id');
        var data = {
            id: productID,
            action: 'quick_action',
            nonce: quick.nonce
        };
        $.ajax({
            url: quick.url,
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend:function(xhr){
                $('.modal-content ').text('Загрузка');
            },
            success:function(data) {
                $('.modal-content ').html(data.product);
            }
        });
    })
});