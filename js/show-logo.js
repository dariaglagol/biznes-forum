'use strict';
(function () {
  var logo = document.querySelector('#logo');
  var logoSourceBottom = logo.getBoundingClientRect().bottom;
  
 window.onscroll = function () {
 if (logo.classList.contains('hidden') && window.pageYOffset <= logoSourceBottom) {
      logo.classList.add('hidden');
    } else if (window.pageYOffset > logoSourceBottom) {
      logo.classList.remove('hidden');
     }
   };
})();
