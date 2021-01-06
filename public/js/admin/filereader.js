$(document).ready(function (){
   let input = $('.file-reader-input');

   input.on('change', function () {
       let file = $(this)[0].files[0];
       var img = $(this).closest('.form-group').find('img');

       let reader = new FileReader();

       reader.onload = function () {
           img.attr('src', reader.result);
       }

       reader.readAsDataURL(file);
   })
});
