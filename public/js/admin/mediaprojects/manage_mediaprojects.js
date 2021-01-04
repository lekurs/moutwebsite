$(document).ready(function () {
    let images = $('.project-media-img');

    $('.image-project-hover').on('mouseover', function () {
       $(this).find('.add-project-media').show();
    }).on('mouseout', function () {
        $(this).find('.add-project-media').hide();
    });

    $('.add-project-media').on('click', function () {
        arr = [];
        $.each(images, function (i, v) {
            arr.push($(this).attr('data-path'));
        });

        $('#media-project-list').val(arr.join(','));
        $('#media-project-order-new-img').val($(this).attr('data-img-parent'));
        $('#media-project-position').val($(this).attr('data-position'));
        $('#media-project-id').val($(this).attr('data-id'));
    });

    $('.store-new-media-img').on('click', function () {

       data = new FormData();
       data.append('media-project-list', $('#media-project-list').val());
       data.append('media-project-order-new-img', $('#media-project-order-new-img').val());
       data.append('project-media-img-id', $('#project-media-img-id').val());
       data.append('add-project-media-input', $('#add-project-media-input')[0].files[0]);
       data.append('project-media-position-input', $('#media-project-position').val());

       $.ajax({
           type: "POST",
           enctype: 'multipart/form-data',
           url: "/admin/projets/store/projectmediafile",
           data: data,
           processData: false,
           contentType: false,
           cache: false,
           timeout: 600000,
           success: function (data) {
               $('#add-media').modal('hide');
               $('.modal-backdrop').remove();

               newline = "<div class='row image-project-hover my-3'>";
               newline += "<div class='col-12'>";
               newline += "<div class='add-project-media' data-toggle='modal' data-position='before' data-target='#add-media' data-img-parent='' data-id=''>";
               newline += "<i class='fal fa-plus-circle'></i>";
               newline += "</div>";
               newline += "<img src='" + data.url_img + "' class='img-fluid project-media-img' alt=''>" ;
               newline += "<div class='add-project-media' data-toggle='modal' data-position='after' data-target='#add-media' data-img-parent='' data-id=''>";
               newline += "<i class='fal fa-plus-circle'></i>";
               newline += "</div>";
               newline += "</div>";
               newline += "</div>";

               console.log($('img#'+ $('#media-project-id').val()).closest('.image-project-hover'));
               if ($('#media-project-position').val() == "after") {

                $('img#'+ $('#media-project-id').val()).closest('.image-project-hover').after(newline);
               } else {

                   $('img#'+ $('#media-project-id').val()).closest('.image-project-hover').before(newline);
               }
           },
           error: function (e) {

               console.log("ERROR : ", e);

           }
       });
    });
});
