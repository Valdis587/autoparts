jQuery(document).ready(function ($) {
    $('.item-time').each(function(){
        var mainID = $(this).attr('id');
        var owl = $('.main-action' + mainID);
        var IdMain = owl.data('id');
        var day = owl.data('day');
        var mon = owl.data('mon');
        var year = owl.data('year');
        var data = {
            id: mainID,
            days: day,
            mons: mon,
            years: year,
            action: 'action_count',
            nonce: count.nonce
        };
        $.ajax({
            url: count.url,
            data: data,
            type: 'POST',
            dataType: 'json',
            beforeSend:function(xhr){

            },
            success:function(data) {
                $('.defaultCountdown-'+ mainID).html(data.product);
                // console.log(data.product);
            }
        });
    })
});