$('#addr_zipcode').on('blur', function () {
    var cep = $(this).val();
    if (!$(this).val().length) {
        $('#addr_zipcode').removeClass('zipok');
        $('#addr_zipcode').removeClass('zipwarn');
        $('#addr_number').val('');
        $('#addr_compl').val('');
        $('#addr_country').val('');
        $('#addr_state').val('');
        $('#addr_city').val('');
        $('#addr_neighbor').val('');
        $('#addr').val('');
    } else {
        $('#addr_zipcode').removeClass('zipok');
        $('#addr_zipcode').addClass('zipwarn');
        $('#addr_number').val('');
        $('#addr_compl').val('');
        $('#addr_country').val('');
        $('#addr_state').val('');
        $('#addr_city').val('');
        $('#addr_neighbor').val('');
        $('#addr').val('');        

        $.ajax({
            url: 'http://api.postmon.com.br/v1/cep/' + cep,
            type: 'GET',
            dataType: 'json',
            success: function (json) {
                if (json.logradouro !== 'undefined') {
                    $('#addr_zipcode').removeClass('zipwarn');
                    $('#addr_zipcode').addClass('zipok');
                    $('#addr_country').val('Brasil');
                    $('#addr_state').val(json.estado);
                    $('#addr_city').val(json.cidade);
                    $('#addr_neighbor').val(json.bairro);
                    $('#addr').val(json.logradouro);
                    $('#addr_number').val('');
                    $('#addr_compl').val('');
                    $('#addr_number').focus();
                }
            }
        });
    }
});


