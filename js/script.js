$(function(){

    $('#js-form').submit(function(e) {
        event.preventDefault();
        var data = $(this).serialize();
        var res_div = $('#js-result');

        $.ajax({
            type: 'post',
            url: 'add',
            data: data,
            success: function(result){
                res_div.html(result);
                alert(result);
            }
        });

        return false;
    });

    $('.js-pagination').click(function() {
        var page = $(this).text();
        var res_div = $('#js-result');

        $.ajax({
            type: 'post',
            url: 'index',
            data: 'page=' + page,
            success: function(result){
                res_div.html(result);

            }
        });

        return false;
    });

});