jQuery(document).ready(function ($) {
    $('button#button-cart').on('click', function () {
        var productID= $(this).attr('data-product-id');
        var data = {
            id: productID,
            action: 'catalog_action',
            nonce: catalog.nonce
        };
        $.ajax({
            url: catalog.url,
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