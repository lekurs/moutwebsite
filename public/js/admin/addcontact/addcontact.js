$(document).ready(function() {
    const addContact = $('button.addcontact');

    addContact.click(function() {
        let clientContainer = $(this).closest('.modal-body').find('.col-client');
        let contactContainer = $(this).closest('.modal-body').find('.col-contact');
        // console.log($(this).closest('.modal-body').find('.col-client'));
        clientContainer.removeClass('col-12').addClass('col-6');
        contactContainer.css('display', 'block');

        // contactContainer.append('<div class="form-group form-group-contact">');
        // let test = $('.form-group-contact');
        // test.append('<div class="testing">');
        // $('.form-group-contact')
        //     .append('<label for="contact-name" class="relative-label">Nom du contact</label>')
        //     .append('<div class="input-group input-group-contact">')
        //     .append('<input class="form-control" type="text" name="contact-name[]" id="contact-name" aria-label="Nom du contact" placeholder="Nom du contact">');
        // $('.input-group-contact')
    });

});
