$(document).ready(function() {
    var overlay = $('.overlay');
    var open_modal = $('.person-popup-link');
    var close = $('.person-popup__close, .overlay');
    var modal = $('.person-popup');

     open_modal.click( function(event){
         event.preventDefault();
         var div = $(this).attr('href');
         overlay.fadeIn(200,
             function(){
                 $(div)
                     .css('display', 'block')
                     .animate({opacity: 1}, 100);
         });
     });

     close.click( function(){
            modal
             .animate({opacity: 0}, 100,
                 function(){
                     $(this).css('display', 'none');
                     overlay.fadeOut(100);
                 }
             );
     });
});
