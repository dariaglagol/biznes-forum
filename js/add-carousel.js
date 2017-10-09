function myFunction() {
  var speakersWrap = $('.speakers__wrap-inner');
  var speakerItem = $('.speakers__item')
    if($(window).width() < 1200)
    {
      speakersWrap.addClass('owl-carousel owl-theme');
      speakerItem.addClass('item');
    }
    else
    {
      speakersWrap.removeClass('owl-carousel owl-theme');
      speakerItem.removeClass('item');
    }
}

//вызываем
myFunction();

//ну и при ресайзе перепроверяем
$(window).resize(function() {
    myFunction();
});
