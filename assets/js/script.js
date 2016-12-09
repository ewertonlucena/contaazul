$(function () {
    $('.tabitem').on('click', function () {
        $('.activetab').removeClass('activetab');
        $(this).addClass('activetab');

        var item = $('.activetab').index();
        $('.tabbody').hide();
        $('.tabbody').eq(item).show();
    });
});

$(function () {
    $('.loadAddGroup').on('click', function () {

        $('.activebody').removeClass('activebody');
        $('.addGroup').addClass('activebody');
        $('.tabbody').hide();
        $('.activebody').show();
    });
});

$(function () {
    $('.loadAdd').on('click', function () {

        $('.activebody').removeClass('activebody');
        $('.addPermission').addClass('activebody');
        $('.tabbody').hide();
        $('.activebody').show();
    });
});

$(function () {
    $('.loadPermissions').on('click', function () {

        $('.activebody').removeClass('activebody');
        $('.permissions').addClass('activebody');
        $('.tabbody').hide();
        $('.activebody').show();
    });
});

$(function () {
    $('.loadGroups').on('click', function () {

        $('.activebody').removeClass('activebody');
        $('.groups').addClass('activebody');
        $('.tabbody').hide();
        $('.activebody').show();
    });
});

$(function () {
    $('#chkAll').on('click', function () {
        var val = this.checked;
        $('input[type=checkbox]').each(function () {
            $(this).prop('checked', val);
        });
    });
});

$(function() {
    $('#formPermissions').on('submit', function(e) {
       e.preventDefault();
       
       var redirect = $('#url').val();
       var info = $(this).serialize();       
       
       $.ajax({
          type: 'POST',
          url: '/permissions/add',
          data: info,
          success: function(data) {
            alert(data);
            window.location = '/permissions/ptab';
          },
          error: function(data) {
            alert("Impossível Adicionar Permissão");
          }
       });
    });
});