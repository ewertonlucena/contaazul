$(function(){
    $('.tabitem').on('click', function(){
        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');
        
        var item = $('.activetab').index();
        $('.tabbody').hide();
        $('.tabbody').eq(item).show();
    });
});

$(function(){
    $('#chkAll').on('click', function () {
        var val = this.checked;
        $('input[type=checkbox]').each(function () {
            $(this).prop('checked', val);
        });
    });
});



