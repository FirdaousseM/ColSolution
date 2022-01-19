(function($) {
    $('#form-add').on('submit', function(e) {
        e.preventDefault();
        var $form = $(this);
        $form.find('button').text('Chargement');
        $.post($form.attr('action'), $form.serializeArray())
            .done(function(data, text, jqxhr) {
                $tr = $(jqxhr.responseText);
                $form.find('textarea').val('');
                $('div').prepend($tr);
                $tr.hide().fadeIn();
            })
            .fail(function(jqxhr) {
                alert(jqxhr.responseText);
            })
            .always(function() {
                $form.find('button').text('Envoyer');
        });  
    })
    
})(jQuery);