$(document).ready(function() {
    const addContact = $('button.addcontact');

    addContact.click(function() {
        let clientContainer = $(this).closest('.modal-body').find('.col-client');
        let contactContainer = $(this).closest('.modal-body').find('.col-contact');
        clientContainer.removeClass('col-12').addClass('col-6');
        contactContainer.css('display', 'block');
    });

});
